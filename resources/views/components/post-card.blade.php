@props(['post'])

<a href="{{ route('blog.show', $post->slug) }}" class="card group block">
    @if($post->hasMedia('cover'))
        <div class="aspect-video overflow-hidden bg-neutral-100">
            <img src="{{ $post->getFirstMediaUrl('cover') }}"
                 alt="{{ $post->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        </div>
    @endif
    <div class="p-5">
        @if($post->published_at)
            <p class="text-xs text-neutral-400 mb-2">{{ $post->published_at->format('d M Y') }}</p>
        @endif
        <h3 class="font-semibold text-neutral-900 group-hover:underline leading-snug">{{ $post->title }}</h3>
        @if($post->excerpt)
            <p class="text-sm text-neutral-500 mt-2 line-clamp-2">{{ $post->excerpt }}</p>
        @endif
    </div>
</a>
