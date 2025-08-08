<!DOCTYPE html>
<html lang="fr" class="h-full" theme="{{ session('theme', 'light') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'LarappeUI')</title>

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

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

    @stack('styles')
</head>
<body class="h-full theme-{{ session('theme', 'light') }}" x-data="{
    sidebarOpen: false,
    currentTheme: localStorage.getItem('theme') || 'light',
}" x-init="
    const savedTheme = localStorage.getItem('theme') || 'light';
    if (window.ThemeManager) { window.ThemeManager.applyTheme(savedTheme); }
    document.addEventListener('themeChanged', (event) => { currentTheme = event.detail.theme; });
">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transition-transform duration-300 transform"
         :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        <!-- Header -->
        <div class="flex justify-between items-center p-4 border-b">
            <h1 class="text-xl font-bold text-gray-900">
                <a href="{{ route('components') }}" class="transition-colors hover:text-primary">
                    🎨 LarappeUI
                </a>
            </h1>
            <button @click="sidebarOpen = false" class="p-2 rounded-md lg:hidden hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Theme Selector -->
        <div class="p-4 border-b">
            <label class="block mb-2 text-sm font-medium text-gray-700">Thème</label>
            <select x-model="currentTheme"
                    @change="if (window.ThemeManager) { window.ThemeManager.applyTheme(currentTheme); }"
                    data-theme-selector
                    class="px-3 py-2 w-full rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <template x-for="theme in (window.ThemeManager?.themes || [])" :key="theme.key">
                    <option :value="theme.key" x-text="theme.name"></option>
                </template>
            </select>
        </div>

        <!-- Navigation -->
        <nav class="overflow-y-auto flex-1 p-4">
            <div class="mb-6">
                <h3 class="mb-3 text-xs font-semibold tracking-wider text-gray-500 uppercase">Navigation</h3>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('components') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md transition-colors hover:bg-gray-100 hover:text-gray-900">
                            <span class="mr-3">🧩</span>
                            <span>Components</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('examples') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md transition-colors hover:bg-gray-100 hover:text-gray-900">
                            <span class="mr-3">📦</span>
                            <span>Examples</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:pl-64">
        <!-- Mobile Header -->
        <div class="bg-white border-b shadow-sm lg:hidden">
            <div class="flex justify-between items-center px-4 py-3">
                <h1 class="text-lg font-semibold text-gray-900">🎨 LarappeUI</h1>
                <button @click="sidebarOpen = true" class="p-2 rounded-md hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <div class="mx-auto max-w-7xl">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div x-show="sidebarOpen"
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden"
         @click="sidebarOpen = false"></div>

    @stack('scripts')
</body>
</html>
