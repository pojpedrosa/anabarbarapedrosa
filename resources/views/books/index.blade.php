<x-app-layout title="Livros">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="section-title mb-10">Livros</h1>

        @if($books->isEmpty())
            <p class="text-neutral-400">Sem livros publicados de momento.</p>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($books as $book)
                    <x-book-card :book="$book" />
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
