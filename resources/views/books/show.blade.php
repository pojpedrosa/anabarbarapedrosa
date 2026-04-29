<x-app-layout :title="$book->title">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            {{-- Cover --}}
            <div class="md:col-span-1">
                @if($book->hasMedia('cover'))
                    <img src="{{ $book->getFirstMediaUrl('cover') }}"
                         alt="{{ $book->title }}"
                         class="w-full rounded-xl shadow-sm">
                @else
                    <div class="aspect-[3/4] bg-neutral-100 rounded-xl flex items-center justify-center">
                        <span class="text-neutral-300 text-5xl">📖</span>
                    </div>
                @endif
            </div>

            {{-- Details --}}
            <div class="md:col-span-2">
                @if($book->type)
                    <p class="text-xs font-medium uppercase tracking-widest text-neutral-400 mb-2">{{ $book->type }}</p>
                @endif
                <h1 class="text-3xl font-semibold text-neutral-900 tracking-tight">{{ $book->title }}</h1>

                <dl class="mt-6 grid grid-cols-2 gap-x-6 gap-y-3 text-sm">
                    @if($book->year)
                        <div>
                            <dt class="text-neutral-400">Ano</dt>
                            <dd class="text-neutral-900 mt-0.5">{{ $book->year }}</dd>
                        </div>
                    @endif
                    @if($book->publisher)
                        <div>
                            <dt class="text-neutral-400">Editora</dt>
                            <dd class="text-neutral-900 mt-0.5">{{ $book->publisher }}</dd>
                        </div>
                    @endif
                    @if($book->isbn)
                        <div>
                            <dt class="text-neutral-400">ISBN</dt>
                            <dd class="text-neutral-900 mt-0.5">{{ $book->isbn }}</dd>
                        </div>
                    @endif
                    @if($book->pages)
                        <div>
                            <dt class="text-neutral-400">Páginas</dt>
                            <dd class="text-neutral-900 mt-0.5">{{ $book->pages }}</dd>
                        </div>
                    @endif
                </dl>

                @if($book->synopsis)
                    <div class="mt-8 prose prose-neutral max-w-none">
                        {!! nl2br(e($book->synopsis)) !!}
                    </div>
                @endif

                @if($book->buy_links && count($book->buy_links) > 0)
                    <div class="mt-8">
                        <p class="text-sm text-neutral-500 mb-3">Onde comprar</p>
                        <div class="flex flex-wrap gap-3">
                            @foreach($book->buy_links as $link)
                                <a href="{{ $link['url'] }}" target="_blank" rel="noopener" class="btn-primary">
                                    {{ $link['label'] }} →
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Reviews for this book --}}
        @if($reviews->isNotEmpty())
            <div class="mt-16 pt-10 border-t border-neutral-100">
                <h2 class="section-title mb-8">O que disseram</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($reviews as $review)
                        <blockquote class="bg-neutral-50 rounded-xl p-6">
                            @if($review->quote)
                                <p class="text-neutral-700 italic leading-relaxed">"{{ $review->quote }}"</p>
                            @endif
                            <footer class="mt-4 flex items-center justify-between gap-4">
                                <div>
                                    <cite class="text-sm text-neutral-900 not-italic font-medium">{{ $review->critic }}</cite>
                                    @if($review->source)
                                        <span class="text-sm text-neutral-500">, {{ $review->source }}</span>
                                    @endif
                                </div>
                                @if($review->external_url)
                                    <a href="{{ $review->external_url }}" target="_blank" rel="noopener" class="text-xs text-neutral-400 hover:text-neutral-700 shrink-0">Ler →</a>
                                @endif
                            </footer>
                        </blockquote>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mt-10">
            <a href="{{ route('books.index') }}" class="text-sm text-neutral-400 hover:text-neutral-700 transition-colors">← Todos os livros</a>
        </div>
    </div>
</x-app-layout>
