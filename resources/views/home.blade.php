<x-app-layout>
    <x-slot name="title">Ana Bárbara Pedrosa</x-slot>

    {{-- Hero --}}
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16">
        <div class="max-w-2xl">
            <h1 class="text-4xl sm:text-5xl font-semibold text-neutral-900 tracking-tight leading-tight">
                Ana Bárbara Pedrosa
            </h1>
            @php $bio = \App\Models\SiteSetting::get('bio'); @endphp
            @if($bio)
                <p class="mt-4 text-lg text-neutral-500 leading-relaxed">{{ $bio }}</p>
            @endif
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('books.index') }}" class="btn-primary">Ver livros</a>
                <a href="{{ route('about') }}" class="btn-outline">Sobre mim</a>
            </div>
        </div>
    </section>

    {{-- Featured Books --}}
    @if($featuredBooks->isNotEmpty())
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="section-title mb-8">Livros em destaque</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featuredBooks as $book)
                <x-book-card :book="$book" />
            @endforeach
        </div>
    </section>
    @endif

    {{-- Reviews --}}
    @if($reviews->isNotEmpty())
    <section class="bg-neutral-50 py-16 mt-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="section-title mb-10">Críticas</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($reviews as $review)
                    <blockquote class="bg-white rounded-xl border border-neutral-100 p-6">
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
                                <a href="{{ $review->external_url }}" target="_blank" rel="noopener" class="text-xs text-neutral-400 hover:text-neutral-700 transition-colors shrink-0">Ler →</a>
                            @endif
                        </footer>
                    </blockquote>
                @endforeach
            </div>
            <div class="mt-8 text-center">
                <a href="{{ route('reviews.index') }}" class="btn-outline">Ver todas as críticas</a>
            </div>
        </div>
    </section>
    @endif

    {{-- Upcoming Events --}}
    @if($upcomingEvents->isNotEmpty())
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h2 class="section-title mb-8">Próximos eventos</h2>
        <div class="divide-y divide-neutral-100">
            @foreach($upcomingEvents as $event)
                <div class="py-5 flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-8">
                    <div class="text-sm text-neutral-400 whitespace-nowrap">
                        {{ $event->starts_at->format('d M Y') }}
                    </div>
                    <div>
                        <p class="font-medium text-neutral-900">{{ $event->title }}</p>
                        @if($event->location)
                            <p class="text-sm text-neutral-500 mt-0.5">{{ $event->location }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            <a href="{{ route('events.index') }}" class="btn-outline">Ver agenda completa</a>
        </div>
    </section>
    @endif

    {{-- Latest Blog Posts --}}
    @if($latestPosts->isNotEmpty())
    <section class="bg-neutral-50 py-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="section-title mb-8">Blog</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($latestPosts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
            <div class="mt-8 text-center">
                <a href="{{ route('blog.index') }}" class="btn-outline">Ver todos os posts</a>
            </div>
        </div>
    </section>
    @endif

</x-app-layout>
