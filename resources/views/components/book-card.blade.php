@props(['book'])

<a href="{{ route('books.show', $book->slug) }}" class="card group block">
    @if($book->hasMedia('cover'))
        <div class="aspect-[3/4] overflow-hidden bg-neutral-100">
            <img src="{{ $book->getFirstMediaUrl('cover') }}"
                 alt="{{ $book->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        </div>
    @else
        <div class="aspect-[3/4] bg-neutral-100 flex items-center justify-center">
            <span class="text-neutral-300 text-4xl">📖</span>
        </div>
    @endif
    <div class="p-4">
        <h3 class="font-semibold text-neutral-900 group-hover:underline">{{ $book->title }}</h3>
        @if($book->year)
            <p class="text-sm text-neutral-400 mt-1">{{ $book->year }}</p>
        @endif
    </div>
</a>
