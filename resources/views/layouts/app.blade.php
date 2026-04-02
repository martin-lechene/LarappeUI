<!DOCTYPE html>
<html lang="fr" class="h-full" theme="{{ session('theme', 'light') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LarappeUI')</title>

    <!-- Tailwind CSS (CDN) — couleurs alignées sur themes.css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: 'var(--color-primary)',
                        surface: 'var(--color-surface)',
                        success: 'var(--color-success)',
                    },
                },
            },
        };
    </script>

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Prism.js pour la coloration syntaxique -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>

    <!-- Thèmes CSS (compilé) -->
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}">

    <!-- Thèmes JavaScript -->
    <script src="{{ asset('js/themes-manager.js') }}" defer></script>

    <style>[x-cloak]{display:none!important}</style>
    <style>
        .skip-to-content {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }
        .skip-to-content:focus {
            position: fixed;
            left: 0.75rem;
            top: 0.75rem;
            z-index: 100;
            width: auto;
            height: auto;
            margin: 0;
            padding: 0.5rem 1rem;
            overflow: visible;
            clip: auto;
            white-space: normal;
            border-radius: 0.375rem;
            background: var(--color-primary);
            color: #fff;
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
        }
    </style>
    @stack('styles')
</head>
<body class="h-full theme-{{ session('theme', 'light') }}" x-data="{
    sidebarOpen: false,
    currentTheme: (localStorage.getItem('theme') || 'pro').replace(/-dark$/,'').replace(/-light$/,''),
    isDark: (localStorage.getItem('theme') || '').endsWith('-dark'),
    get themeOptions(){
        const list = window.ThemeManager ? window.ThemeManager.getAllThemes() : ['pro','dark','light'];
        const bases = [...new Set(list.map(k => k.replace(/-dark$/,'').replace(/-light$/,'')))];
        // Limiter aux thèmes demandés si présents
        const wanted = ['pro','2d','oldschool','ocean','summer','winter','glass'];
        return wanted.filter(w => bases.includes(w));
    },
    applyCurrent(){
        const name = this.isDark ? `${this.currentTheme}-dark` : this.currentTheme;
        localStorage.setItem('theme', name);
        localStorage.setItem('themeMode', this.isDark ? 'dark' : 'light');
        if (window.ThemeManager) { window.ThemeManager.applyTheme(name); }
    }
}" x-init="
    this.applyCurrent();
    document.addEventListener('themeChanged', (event) => {
        const t = (event.detail && event.detail.theme) || '';
        const d = typeof Alpine !== 'undefined' ? Alpine.$data(document.body) : null;
        if (d) {
            d.currentTheme = t.replace(/-dark$/,'').replace(/-light$/,'');
            d.isDark = /-dark$/.test(t);
        }
    });
    const sync = () => {
        if (!window.ThemeManager) return;
        const d = typeof Alpine !== 'undefined' ? Alpine.$data(document.body) : null;
        if (!d) return;
        document.querySelectorAll('[data-theme-selector]').forEach(s => { s.value = d.currentTheme; });
    };
    document.addEventListener('DOMContentLoaded', sync);
    setTimeout(sync, 0);
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
            <label for="theme-base-select" class="block mb-2 text-sm font-medium text-[var(--color-textSecondary)]">Thème</label>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <select id="theme-base-select"
                        x-model="currentTheme"
                        @change="applyCurrent()"
                        data-theme-selector
                        class="px-3 py-2 w-full rounded-lg border border-[var(--color-border)] bg-[var(--color-background)] text-[var(--color-text)] focus:ring-2 focus:ring-primary focus:border-transparent">
                    <template x-for="key in themeOptions" :key="key">
                        <option :value="key" x-text="key.charAt(0).toUpperCase() + key.slice(1)"></option>
                    </template>
                </select>
                <div class="flex flex-shrink-0 items-center gap-2">
                    <span class="text-xs text-[var(--color-textSecondary)]">Light</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" x-model="isDark" @change="applyCurrent()" :aria-label="isDark ? 'Mode sombre activé' : 'Activer le mode sombre'">
                        <div class="w-10 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:bg-gray-700 transition-all"></div>
                        <div class="absolute left-0.5 top-0.5 w-4 h-4 bg-white rounded-full transition-all peer-checked:translate-x-5"></div>
                    </label>
                    <span class="text-xs text-[var(--color-text)]">Dark</span>
                </div>
            </div>
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
