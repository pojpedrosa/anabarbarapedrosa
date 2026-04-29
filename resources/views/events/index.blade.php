<x-app-layout title="Agenda">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="section-title mb-10">Agenda</h1>

        @if($upcoming->isNotEmpty())
            <div class="mb-14">
                <h2 class="text-xs font-medium uppercase tracking-widest text-neutral-400 mb-6">Próximos eventos</h2>
                <div class="divide-y divide-neutral-100">
                    @foreach($upcoming as $event)
                        <div class="py-6 flex flex-col sm:flex-row gap-5">
                            <div class="sm:w-28 shrink-0">
                                <p class="text-sm font-medium text-neutral-900">{{ $event->starts_at->format('d M Y') }}</p>
                                <p class="text-xs text-neutral-400">{{ $event->starts_at->format('H:i') }}</p>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-neutral-900">{{ $event->title }}</h3>
                                @if($event->location)
                                    <p class="text-sm text-neutral-500 mt-1 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        @if($event->maps_url)
                                            <a href="{{ $event->maps_url }}" target="_blank" rel="noopener" class="hover:underline">{{ $event->location }}</a>
                                        @else
                                            {{ $event->location }}
                                        @endif
                                    </p>
                                @endif
                                @if($event->description)
                                    <p class="text-sm text-neutral-500 mt-2">{{ $event->description }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($past->isNotEmpty())
            <div>
                <h2 class="text-xs font-medium uppercase tracking-widest text-neutral-400 mb-6">Eventos passados</h2>
                <div class="divide-y divide-neutral-100 opacity-60">
                    @foreach($past as $event)
                        <div class="py-5 flex flex-col sm:flex-row gap-5">
                            <div class="sm:w-28 shrink-0">
                                <p class="text-sm text-neutral-600">{{ $event->starts_at->format('d M Y') }}</p>
                            </div>
                            <div>
                                <h3 class="font-medium text-neutral-700">{{ $event->title }}</h3>
                                @if($event->location)
                                    <p class="text-sm text-neutral-400 mt-0.5">{{ $event->location }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">{{ $past->links() }}</div>
            </div>
        @endif

        @if($upcoming->isEmpty() && $past->isEmpty())
            <p class="text-neutral-400">Sem eventos de momento.</p>
        @endif
    </div>
</x-app-layout>
