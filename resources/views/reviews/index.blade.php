<x-app-layout title="Críticas">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="section-title mb-10">Críticas</h1>

        @if($reviews->isEmpty())
            <p class="text-neutral-400">Nenhuma crítica disponível.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($reviews as $review)
                    <article class="bg-neutral-50 rounded-xl p-6 flex flex-col">
                        <blockquote class="flex-1">
                            @if($review->quote)
                                <p class="text-neutral-700 italic leading-relaxed">"{{ $review->quote }}"</p>
                            @endif
                        </blockquote>
                        <footer class="mt-5 pt-4 border-t border-neutral-200 flex items-center justify-between gap-4">
                            <div>
                                <cite class="text-sm font-medium text-neutral-900 not-italic">{{ $review->critic }}</cite>
                                @if($review->source)
                                    <span class="text-sm text-neutral-500">, {{ $review->source }}</span>
                                @endif
                                @if($review->book)
                                    <p class="text-xs text-neutral-400 mt-0.5">
                                        <a href="{{ route('books.show', $review->book->slug) }}" class="hover:underline">{{ $review->book->title }}</a>
                                    </p>
                                @endif
                            </div>
                            @if($review->external_url)
                                <a href="{{ $review->external_url }}" target="_blank" rel="noopener" class="text-xs text-neutral-400 hover:text-neutral-700 shrink-0">Ler →</a>
                            @endif
                        </footer>
                    </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
