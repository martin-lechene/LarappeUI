@php
    // `currentTheme` est partagé par ThemeMiddleware ; le fallback couvre les
    // vues rendues hors du groupe de routes concerné.
    $theme = $currentTheme ?? \App\Support\ThemeRegistry::sanitize(session('theme'));
    $themes = \App\Support\ThemeRegistry::available();
@endphp
<!DOCTYPE html>
<html lang="fr" class="h-full" theme="{{ $theme }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LarappeUI')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- app.css puis themes.css : les variables de thème doivent gagner sur les valeurs par défaut. --}}
    @vite(['resources/css/app.css', 'resources/css/themes.css', 'resources/js/app.js'])
</head>
<body class="h-full theme-{{ $theme }}" x-data="{
    sidebarOpen: false,
    themeOptions: @js($themes),
    currentTheme: @js($theme),
    applyCurrent(){
        if (window.ThemeManager) { window.ThemeManager.applyTheme(this.currentTheme); }
    },
    label(key){
        return key.replace(/-/g, ' ').replace(/\b\w/g, (c) => c.toUpperCase());
    }
}" x-init="
    document.addEventListener('themeChanged', (event) => {
        currentTheme = (event.detail && event.detail.theme) || currentTheme;
    });
">
    <a href="#main-content" class="skip-to-content">Aller au contenu</a>
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 border-r border-[var(--color-border)] bg-[var(--color-surface)] shadow-lg transition-transform duration-300 transform text-[var(--color-text)]"
         :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        <!-- Header -->
        <div class="flex flex-shrink-0 justify-between items-center p-4 border-b border-[var(--color-border)]">
            <h1 class="text-xl font-bold">
                <a href="{{ route('components') }}" class="transition-colors hover:text-primary">
                    🎨 LarappeUI
                </a>
            </h1>
            <button type="button" @click="sidebarOpen = false" aria-label="Fermer le menu" class="p-2 rounded-md lg:hidden hover:bg-black/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Theme Selector -->
        <div class="flex-shrink-0 p-4 border-b border-[var(--color-border)]">
            <label for="theme-select" class="block mb-2 text-sm font-medium text-[var(--color-textSecondary)]">Thème</label>
            <select id="theme-select"
                    x-model="currentTheme"
                    @change="applyCurrent()"
                    data-theme-selector
                    class="px-3 py-2 w-full rounded-lg border border-[var(--color-border)] bg-[var(--color-background)] text-[var(--color-text)] focus:ring-2 focus:ring-primary focus:border-transparent">
                <template x-for="key in themeOptions" :key="key">
                    <option :value="key" x-text="label(key)"></option>
                </template>
            </select>
        </div>

        <!-- Navigation -->
        <nav class="overflow-y-auto flex-1 min-h-0 p-4" aria-label="Principale">
            <div class="mb-6">
                <h3 class="mb-3 text-xs font-semibold tracking-wider text-[var(--color-textSecondary)] uppercase">Navigation</h3>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('components') }}"
                           @click="sidebarOpen = false"
                           @if(request()->routeIs('home', 'components')) aria-current="page" @endif
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors border-l-4 {{ request()->routeIs('home', 'components') ? 'border-primary text-primary' : 'border-transparent hover:bg-black/5 text-[var(--color-text)]' }}">
                            <span class="mr-3" aria-hidden="true">🧩</span>
                            <span>Components</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('examples') }}"
                           @click="sidebarOpen = false"
                           @if(request()->routeIs('examples')) aria-current="page" @endif
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors border-l-4 {{ request()->routeIs('examples') ? 'border-primary text-primary' : 'border-transparent hover:bg-black/5 text-[var(--color-text)]' }}">
                            <span class="mr-3" aria-hidden="true">📦</span>
                            <span>Examples</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:pl-64 min-h-screen bg-[var(--color-background)]">
        <!-- Mobile Header -->
        <div class="sticky top-0 z-30 border-b border-[var(--color-border)] bg-[var(--color-surface)] shadow-sm lg:hidden">
            <div class="flex justify-between items-center px-4 py-3">
                <h1 class="text-lg font-semibold text-[var(--color-text)]">🎨 LarappeUI</h1>
                <button type="button" @click="sidebarOpen = true" aria-label="Ouvrir le menu" class="p-2 rounded-md hover:bg-black/5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Content -->
        <main id="main-content" class="p-6 outline-none" tabindex="-1">
            <div class="mx-auto max-w-7xl">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Overlay for mobile -->
    <div x-show="sidebarOpen"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-40 bg-black/50 lg:hidden"
         @click="sidebarOpen = false"
         x-cloak></div>

    @stack('scripts')
</body>
</html>
