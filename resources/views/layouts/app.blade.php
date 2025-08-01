<!DOCTYPE html>
<html lang="fr" class="h-full" theme="{{ session('theme', 'light') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Laravel App')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js" defer></script>
    
    <!-- Prism.js pour la coloration syntaxique -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    
    <!-- Thèmes CSS -->
    <link rel="stylesheet" href="{{ asset('css/themes-complete.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themes-extended.css') }}">
    
    <!-- Thèmes JavaScript -->
    <script src="{{ asset('js/themes-manager.js') }}"></script>
    
    <!-- Styles personnalisés -->
    <style>
        /* Classes utilitaires pour les thèmes */
        .btn {
            @apply px-4 py-2 rounded-lg font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2;
        }
        
        .btn-primary {
            @apply bg-primary text-white hover:bg-primary-hover;
        }
        
        .btn-secondary {
            @apply bg-secondary text-white hover:bg-secondary-hover;
        }
        
        .btn-success {
            @apply bg-success text-white hover:bg-success-hover;
        }
        
        .btn-danger {
            @apply bg-danger text-white hover:bg-danger-hover;
        }
        
        .btn-warning {
            @apply bg-warning text-white hover:bg-warning-hover;
        }
        
        .btn-info {
            @apply bg-info text-white hover:bg-info-hover;
        }
        
        .form-input {
            @apply w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent;
        }
        
        .card {
            @apply bg-white rounded-lg shadow-sm border p-6;
        }
        
        /* Variables CSS pour les thèmes */
        :root {
            --color-primary: #3b82f6;
            --color-primary-hover: #2563eb;
            --color-secondary: #6b7280;
            --color-secondary-hover: #4b5563;
            --color-success: #10b981;
            --color-success-hover: #059669;
            --color-warning: #f59e0b;
            --color-warning-hover: #d97706;
            --color-danger: #ef4444;
            --color-danger-hover: #dc2626;
            --color-info: #06b6d4;
            --color-info-hover: #0891b2;
            --color-background: #ffffff;
            --color-surface: #f9fafb;
            --color-text: #111827;
            --color-text-secondary: #6b7280;
            --color-border: #e5e7eb;
            --color-accent: #f59e42;
        }
    </style>
    
    @stack('styles')
</head>
<body class="h-full bg-background text-text" x-data="{ 
    sidebarOpen: false,
    currentTheme: localStorage.getItem('theme') || 'light',
    searchQuery: '',
    activeTab: 'preview',
    customTheme: {
        primary: '#3b82f6',
        secondary: '#6b7280',
        success: '#10b981',
        warning: '#f59e0b',
        danger: '#ef4444',
        info: '#06b6d4',
        background: '#ffffff',
        surface: '#f9fafb',
        text: '#111827',
        textSecondary: '#6b7280',
        border: '#e5e7eb',
        accent: '#f59e42',
    },
    components: [
        { name: 'Button', category: 'Basic', icon: '🔘', path: 'button' },
        { name: 'Input', category: 'Form', icon: '📝', path: 'form/input' },
        { name: 'Select', category: 'Form', icon: '📋', path: 'form/select' },
        { name: 'Checkbox', category: 'Form', icon: '☑️', path: 'form/checkbox' },
        { name: 'Switch', category: 'Form', icon: '🔀', path: 'form/switch' },
        { name: 'Textarea', category: 'Form', icon: '📄', path: 'form/textarea' },
        { name: 'Dropdown', category: 'Navigation', icon: '📂', path: 'dropdown' },
        { name: 'Pagination', category: 'Data', icon: '📊', path: 'data/pagination' },
        { name: 'Timeline', category: 'Data', icon: '⏱️', path: 'data/timeline' },
        { name: 'Calendar', category: 'Basic', icon: '📅', path: 'calendar' },
        { name: 'Tag', category: 'Basic', icon: '🏷️', path: 'tag' },
        { name: 'Statistic', category: 'Data', icon: '📈', path: 'data/statistic' }
    ],
    themes: [
        { key: 'light', name: 'Light', class: 'theme-light', description: 'Thème clair par défaut avec des couleurs modernes' },
        { key: 'dark', name: 'Dark', class: 'theme-dark', description: 'Thème sombre élégant pour une expérience nocturne' },
        { key: 'pro', name: 'Pro (FrappeUI)', class: 'theme-pro', description: 'Thème professionnel inspiré de FrappeUI' },
        { key: 'enterprise', name: 'Enterprise', class: 'theme-enterprise', description: 'Thème entreprise avec des couleurs sobres et professionnelles' },
        { key: 'glass', name: 'Glass', class: 'theme-glass', description: 'Effet de verre avec transparence et flou' },
        { key: 'neon', name: 'Neon', class: 'theme-neon', description: 'Thème néon avec des couleurs vives et lumineuses' },
        { key: 'forest', name: 'Forest', class: 'theme-forest', description: 'Thème forestier avec des tons verts naturels' },
        { key: 'sea', name: 'Sea', class: 'theme-sea', description: 'Thème marin avec des bleus océaniques' },
        { key: 'sunset', name: 'Sunset', class: 'theme-sunset', description: 'Thème coucher de soleil avec des oranges chaleureux' },
        { key: 'modern', name: 'Modern', class: 'theme-modern', description: 'Thème moderne avec des couleurs vibrantes' },
        { key: 'minimal', name: 'Minimal', class: 'theme-minimal', description: 'Thème minimaliste en noir et blanc' },
        { key: '2d', name: '2D', class: 'theme-2d', description: 'Thème 2D avec des couleurs vives et géométriques' },
        { key: 'retro', name: 'Retro', class: 'theme-retro', description: 'Thème rétro avec des couleurs des années 80' },
        { key: 'cyberpunk', name: 'Cyberpunk', class: 'theme-cyberpunk', description: 'Thème cyberpunk futuriste' },
        { key: 'pastel', name: 'Pastel', class: 'theme-pastel', description: 'Thème pastel doux et apaisant' }
    ]
}" x-init="
    // Initialiser le thème au chargement
    const savedTheme = localStorage.getItem('theme') || 'light';
    currentTheme = savedTheme;
    
    // Appliquer le thème immédiatement
    if (window.ThemeManager) {
        window.ThemeManager.applyTheme(savedTheme);
    }
    
    // Écouter les changements de thème
    document.addEventListener('themeChanged', (event) => {
        currentTheme = event.detail.theme;
    });
">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300"
         :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b">
            <h1 class="text-xl font-bold text-gray-900">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">
                    🎨 Component Library
                </a>
            </h1>
            <button @click="sidebarOpen = false" class="lg:hidden p-2 rounded-md hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Search (pour les composants) -->
        <div x-show="$store.route.current.includes('components-docs')" class="p-4 border-b">
            <div class="relative">
                <input type="text" 
                       x-model="searchQuery"
                       placeholder="Rechercher un composant..."
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Theme Selector -->
        <div class="p-4 border-b">
            <label class="block text-sm font-medium text-gray-700 mb-2">Thème</label>
            <select x-model="currentTheme" 
                    @change="
                        if (window.ThemeManager) {
                            window.ThemeManager.applyTheme(currentTheme);
                        }
                    "
                    data-theme-selector
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <template x-for="theme in themes" :key="theme.key">
                    <option :value="theme.key" x-text="theme.name"></option>
                </template>
            </select>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto p-4">
            <div class="mb-6">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Navigation</h3>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('home') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 hover:text-gray-900 transition-colors">
                            <span class="mr-3">🏠</span>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('components-docs') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 hover:text-gray-900 transition-colors">
                            <span class="mr-3">📚</span>
                            <span>Documentation</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('themes-manager') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 hover:text-gray-900 transition-colors">
                            <span class="mr-3">🎨</span>
                            <span>Gestionnaire de Thèmes</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('themes-showcase') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 hover:text-gray-900 transition-colors">
                            <span class="mr-3">🌈</span>
                            <span>Showcase des Thèmes</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Components Navigation (pour la page components-docs) -->
            <div x-show="$store.route.current.includes('components-docs')" class="mb-6">
                <template x-for="category in ['Basic', 'Form', 'Navigation', 'Data']" :key="category">
                    <div class="mb-6">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3" x-text="category"></h3>
                        <ul class="space-y-1">
                            <template x-for="component in components.filter(c => c.category === category && c.name.toLowerCase().includes(searchQuery.toLowerCase()))" :key="component.name">
                                <li>
                                    <a :href="'/components-docs/' + component.path" 
                                       class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 hover:text-gray-900 transition-colors">
                                        <span class="mr-3" x-text="component.icon"></span>
                                        <span x-text="component.name"></span>
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </div>
                </template>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:pl-64">
        <!-- Mobile Header -->
        <div class="lg:hidden bg-white shadow-sm border-b">
            <div class="flex items-center justify-between px-4 py-3">
                <h1 class="text-lg font-semibold text-gray-900">🎨 Component Library</h1>
                <button @click="sidebarOpen = true" class="p-2 rounded-md hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <div class="max-w-7xl mx-auto">
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

    <!-- Scripts -->
    @stack('scripts')
</body>
</html> 