<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchNewPosts extends Command
{
    protected $signature = 'posts:fetch-new {--dry-run : Show what would be added without saving}';
    protected $description = 'Fetch new articles from author pages and add to blog using AI';

    private array $sources = [
        ['url' => 'https://observador.pt/perfil/abpedrosa/', 'name' => 'Observador'],
        ['url' => 'https://www.sabado.pt/autores/detalhe/ana-barbara-pedrosa', 'name' => 'Sábado'],
        ['url' => 'https://amensagem.pt/author/ana-barbara-pedrosa/', 'name' => 'Mensagem de Lisboa'],
    ];

    public function handle(): int
    {
        $dryRun = $this->option('dry-run');

        foreach ($this->sources as $source) {
            $this->info("Checking {$source['name']}...");
            try {
                $this->processSource($source['url'], $source['name'], $dryRun);
            } catch (\Exception $e) {
                $this->error("Failed {$source['name']}: {$e->getMessage()}");
                Log::error("FetchNewPosts failed for {$source['name']}", ['error' => $e->getMessage()]);
            }
        }

        return self::SUCCESS;
    }

    private function processSource(string $pageUrl, string $sourceName, bool $dryRun): void
    {
        $html = Http::timeout(30)->get($pageUrl)->body();

        $articles = $this->extractArticlesWithAI($html, $sourceName, $pageUrl);

        if (empty($articles)) {
            $this->line("  No articles found.");
            return;
        }

        $added = 0;
        foreach ($articles as $article) {
            if (empty($article['url']) || empty($article['title'])) continue;

            if (Post::where('external_url', $article['url'])->exists()) continue;

            $excerpt = $this->generateExcerpt($article['url'], $article['title']);

            if ($dryRun) {
                $this->line("  [DRY RUN] Would add: {$article['title']}");
                continue;
            }

            Post::create([
                'title'        => $article['title'],
                'type'         => 'article',
                'source_name'  => $sourceName,
                'external_url' => $article['url'],
                'excerpt'      => $excerpt,
                'published_at' => $article['date'] ?? now(),
                'is_active'    => true,
            ]);

            $this->line("  Added: {$article['title']}");
            $added++;
        }

        if (!$dryRun) {
            $this->info("  {$added} new article(s) added from {$sourceName}.");
        }
    }

    private function extractArticlesWithAI(string $html, string $sourceName, string $pageUrl): array
    {
        $response = $this->callClaude(
            "You are parsing an author page for Portuguese writer Ana Bárbara Pedrosa on {$sourceName}.\n" .
            "Page URL: {$pageUrl}\n\n" .
            "Extract ALL article links from this HTML. Return ONLY a valid JSON array, no other text.\n" .
            "Each object must have: \"title\" (string), \"url\" (full absolute URL string), \"date\" (YYYY-MM-DD or null).\n" .
            "Only include articles authored by Ana Bárbara Pedrosa. If a URL is relative, make it absolute using the page URL domain.\n\n" .
            "HTML:\n" . mb_substr($html, 0, 60000)
        );

        preg_match('/\[.*\]/s', $response, $matches);
        if (empty($matches[0])) return [];

        return json_decode($matches[0], true) ?? [];
    }

    private function generateExcerpt(string $articleUrl, string $title): string
    {
        try {
            $html = Http::timeout(30)->get($articleUrl)->body();

            return $this->callClaude(
                "Write a 1-2 sentence summary IN PORTUGUESE of the article titled \"{$title}\".\n" .
                "Extract the main idea from the article body in the HTML below.\n" .
                "Return ONLY the summary text, nothing else. No quotes, no prefixes.\n\n" .
                "HTML:\n" . mb_substr($html, 0, 40000)
            );
        } catch (\Exception $e) {
            return '';
        }
    }

    private function callClaude(string $prompt): string
    {
        $response = Http::withHeaders([
            'x-api-key'         => config('services.anthropic.key'),
            'anthropic-version' => '2023-06-01',
            'content-type'      => 'application/json',
        ])->timeout(60)->post('https://api.anthropic.com/v1/messages', [
            'model'      => 'claude-haiku-4-5-20251001',
            'max_tokens' => 2048,
            'messages'   => [['role' => 'user', 'content' => $prompt]],
        ]);

        return $response->json('content.0.text', '');
    }
}
