<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchNewPosts extends Command
{
    protected $signature = 'posts:fetch-new {--dry-run : Show what would be added without saving}';
    protected $description = 'Fetch new articles by Ana Bárbara Pedrosa via Google News and add to blog';

    private array $allowedSources = [
        'Observador'          => 'Observador',
        'OBSERVADOR'          => 'Observador',
        'SÁBADO'              => 'Sábado',
        'Sábado'              => 'Sábado',
        'Expresso'            => 'Expresso',
        'EXPRESSO'            => 'Expresso',
        'Mensagem de Lisboa'  => 'Mensagem de Lisboa',
        'Público'             => 'Público',
        'PÚBLICO'             => 'Público',
    ];

    public function handle(): int
    {
        $dryRun = $this->option('dry-run');

        $xml = $this->fetchGoogleNewsRss();
        if (!$xml) {
            $this->error('Failed to fetch Google News RSS.');
            return self::FAILURE;
        }

        $items = $this->parseRss($xml);
        $this->info('Found ' . count($items) . ' items in feed.');

        $added = 0;
        foreach ($items as $item) {
            $sourceName = $this->normalizeSource($item['source']);
            if (!$sourceName) continue;

            $realUrl = $this->resolveUrl($item['url']);
            if (!$realUrl) continue;

            if (Post::where('external_url', $realUrl)->exists()) continue;

            $excerpt = $this->generateExcerpt($realUrl, $item['title']);

            if ($dryRun) {
                $this->line("[DRY RUN] {$sourceName}: {$item['title']}");
                $this->line("          {$realUrl}");
                continue;
            }

            Post::create([
                'title'        => $item['title'],
                'type'         => 'article',
                'source_name'  => $sourceName,
                'external_url' => $realUrl,
                'excerpt'      => $excerpt,
                'published_at' => $item['date'] ?? now(),
                'is_active'    => true,
            ]);

            $this->line("Added [{$sourceName}]: {$item['title']}");
            $added++;
        }

        if (!$dryRun) {
            $this->info("{$added} new article(s) added.");
        }

        return self::SUCCESS;
    }

    private function fetchGoogleNewsRss(): ?string
    {
        $url = 'https://news.google.com/rss/search?q=%22ana+barbara+pedrosa%22&hl=pt-PT&gl=PT&ceid=PT:pt';
        $response = Http::timeout(30)->withHeaders([
            'User-Agent' => 'Mozilla/5.0 (compatible; RSS reader)',
        ])->get($url);

        return $response->successful() ? $response->body() : null;
    }

    private function parseRss(string $xml): array
    {
        libxml_use_internal_errors(true);
        $feed = simplexml_load_string($xml);
        if (!$feed) return [];

        $items = [];
        foreach ($feed->channel->item ?? [] as $item) {
            $source = (string) ($item->source ?? '');
            $title  = (string) $item->title;
            $url    = (string) $item->link;
            $date   = $item->pubDate ? date('Y-m-d', strtotime((string) $item->pubDate)) : null;

            $items[] = compact('title', 'url', 'source', 'date');
        }

        return $items;
    }

    private function normalizeSource(string $source): ?string
    {
        foreach ($this->allowedSources as $key => $normalized) {
            if (stripos($source, $key) !== false) {
                return $normalized;
            }
        }
        return null;
    }

    private function resolveUrl(string $googleNewsUrl): ?string
    {
        try {
            $response = Http::timeout(15)->withHeaders([
                'User-Agent' => 'Mozilla/5.0 (compatible; RSS reader)',
            ])->get($googleNewsUrl);

            return $response->effectiveUri()?->__toString() ?? $googleNewsUrl;
        } catch (\Exception $e) {
            return $googleNewsUrl;
        }
    }

    private function generateExcerpt(string $url, string $title): string
    {
        try {
            $html = Http::timeout(30)->withHeaders([
                'User-Agent' => 'Mozilla/5.0 (compatible; RSS reader)',
            ])->get($url)->body();

            return $this->callClaude(
                "Write a 1-2 sentence summary IN PORTUGUESE of the article titled \"{$title}\".\n" .
                "Extract the main idea from the article body in the HTML below.\n" .
                "Return ONLY the summary text, nothing else. No quotes, no prefixes.\n\n" .
                "HTML:\n" . mb_substr($html, 0, 40000)
            );
        } catch (\Exception $e) {
            Log::warning("FetchNewPosts: could not generate excerpt for {$url}", ['error' => $e->getMessage()]);
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
            'max_tokens' => 300,
            'messages'   => [['role' => 'user', 'content' => $prompt]],
        ]);

        return trim($response->json('content.0.text', ''));
    }
}
