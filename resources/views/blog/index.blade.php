<x-app-layout title="Blog">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="section-title mb-10">Blog</h1>

        @if($posts->isEmpty())
            <p class="text-neutral-400">Nenhum post publicado ainda.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
            <div class="mt-12">{{ $posts->links() }}</div>
        @endif
    </div>
</x-app-layout>
