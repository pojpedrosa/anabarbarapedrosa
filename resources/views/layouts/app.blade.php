<!DOCTYPE html>
<html lang="pt" x-data="{ mobileMenu: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Ana Bárbara Pedrosa' }} — escritora</title>
    <meta name="description" content="{{ $description ?? 'Ana Bárbara Pedrosa — escritora portuguesa' }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('head')
</head>
<body class="bg-white text-neutral-900 antialiased">

    <header class="sticky top-0 z-50 bg-white border-b border-neutral-100">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <a href="{{ route('home') }}" class="font-semibold text-lg tracking-wide text-neutral-900">
                    Ana Bárbara Pedrosa
                </a>

                <nav class="hidden md:flex items-center gap-7 text-sm">
                    <a href="{{ route('books.index') }}" class="nav-link {{ request()->routeIs('books.*') ? 'nav-active' : '' }}">Livros</a>
                    <a href="{{ route('reviews.index') }}" class="nav-link {{ request()->routeIs('reviews.*') ? 'nav-active' : '' }}">Críticas</a>
                    <a href="{{ route('events.index') }}" class="nav-link {{ request()->routeIs('events.*') ? 'nav-active' : '' }}">Agenda</a>
                    <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'nav-active' : '' }}">Blog</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'nav-active' : '' }}">Sobre</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'nav-active' : '' }}">Contacto</a>
                </nav>

                <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 text-neutral-600">
                    <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="mobileMenu" x-transition class="md:hidden border-t border-neutral-100 bg-white">
            <nav class="flex flex-col px-4 py-4 gap-4 text-sm">
                <a href="{{ route('books.index') }}" class="nav-link">Livros</a>
                <a href="{{ route('reviews.index') }}" class="nav-link">Críticas</a>
                <a href="{{ route('events.index') }}" class="nav-link">Agenda</a>
                <a href="{{ route('blog.index') }}" class="nav-link">Blog</a>
                <a href="{{ route('about') }}" class="nav-link">Sobre</a>
                <a href="{{ route('contact') }}" class="nav-link">Contacto</a>
            </nav>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="border-t border-neutral-100 mt-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <span class="font-semibold text-neutral-900">Ana Bárbara Pedrosa</span>
                <div class="flex items-center gap-5 text-neutral-400">
                    @php $instagram = \App\Models\SiteSetting::get('instagram_url'); @endphp
                    @if($instagram)
                        <a href="{{ $instagram }}" target="_blank" rel="noopener" class="hover:text-neutral-700 transition-colors">Instagram</a>
                    @endif
                    @php $facebook = \App\Models\SiteSetting::get('facebook_url'); @endphp
                    @if($facebook)
                        <a href="{{ $facebook }}" target="_blank" rel="noopener" class="hover:text-neutral-700 transition-colors">Facebook</a>
                    @endif
                    @php $linkedin = \App\Models\SiteSetting::get('linkedin_url'); @endphp
                    @if($linkedin)
                        <a href="{{ $linkedin }}" target="_blank" rel="noopener" class="hover:text-neutral-700 transition-colors">LinkedIn</a>
                    @endif
                </div>
                <p class="text-sm text-neutral-400">
                    <a href="{{ route('privacy') }}" class="hover:underline">Privacidade</a>
                    &nbsp;·&nbsp;
                    © {{ date('Y') }}
                </p>
            </div>
        </div>
    </footer>

    @livewireScripts
    @stack('scripts')
</body>
</html>
