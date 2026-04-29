<x-app-layout :title="$post->title">
    <article class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        @if($post->published_at)
            <p class="text-sm text-neutral-400 mb-4">{{ $post->published_at->format('d M Y') }}</p>
        @endif

        <h1 class="text-3xl sm:text-4xl font-semibold text-neutral-900 tracking-tight leading-tight">
            {{ $post->title }}
        </h1>

        @if($post->excerpt)
            <p class="mt-5 text-lg text-neutral-500 leading-relaxed">{{ $post->excerpt }}</p>
        @endif

        @if($post->hasMedia('cover'))
            <img src="{{ $post->getFirstMediaUrl('cover') }}"
                 alt="{{ $post->title }}"
                 class="mt-8 w-full rounded-xl">
        @endif

        @if($post->body)
            <div class="mt-10 prose prose-neutral max-w-none">
                {!! $post->body !!}
            </div>
        @endif

        <div class="mt-14 pt-8 border-t border-neutral-100">
            <a href="{{ route('blog.index') }}" class="text-sm text-neutral-400 hover:text-neutral-700 transition-colors">← Todos os posts</a>
        </div>
    </article>

    @if($related->isNotEmpty())
        <section class="bg-neutral-50 py-14">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="section-title mb-8">Mais posts</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($related as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-app-layout>
