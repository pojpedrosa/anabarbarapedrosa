@props(['post'])

@php $isArticle = $post->isArticle(); $href = $isArticle ? $post->external_url : route('blog.show', $post->slug); @endphp

<a href="{{ $href }}" @if($isArticle) target="_blank" rel="noopener" @endif class="card group block">
    @if($post->hasMedia('cover'))
        <div class="aspect-video overflow-hidden bg-neutral-100">
            <img src="{{ $post->getFirstMediaUrl('cover') }}"
                 alt="{{ $post->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        </div>
    @endif
    <div class="p-5">
        <div class="flex items-center gap-2 mb-2">
            @if($post->source_name)
                <span class="text-xs font-medium text-neutral-400 uppercase tracking-wide">{{ $post->source_name }}</span>
                <span class="text-neutral-200">·</span>
            @endif
            @if($post->published_at)
                <span class="text-xs text-neutral-400">{{ $post->published_at->format('d M Y') }}</span>
            @endif
            @if($isArticle)
                <span class="ml-auto text-neutral-300">↗</span>
            @endif
        </div>
        <h3 class="font-semibold text-neutral-900 group-hover:underline leading-snug">{{ $post->title }}</h3>
        @if($post->excerpt)
            <p class="text-sm text-neutral-500 mt-2 line-clamp-3">{{ $post->excerpt }}</p>
        @endif
    </div>
</a>
