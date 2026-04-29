<x-app-layout title="Contacto">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="section-title mb-10">Contacto</h1>

        @if($page && $page->body)
            <div class="prose prose-neutral max-w-none">
                {!! $page->body !!}
            </div>
        @else
            <p class="text-neutral-400">Informações de contacto em breve.</p>
        @endif
    </div>
</x-app-layout>
