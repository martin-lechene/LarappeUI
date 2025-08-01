<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Laravel App')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
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
    currentTheme: 'light'
}" x-init="
    // Charger le thème depuis localStorage
    const savedTheme = localStorage.getItem('selected-theme') || 'light';
    currentTheme = savedTheme;
    if (window.ThemeManager) {
        window.ThemeManager.applyTheme(currentTheme);
    }
">
    <!-- Navigation -->
    <nav class="bg-surface border-b border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-text">
                        <a href="{{ route('home') }}" class="hover:text-primary transition-colors">
                            🎨 Component Library
                        </a>
                    </h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Sélecteur de thème -->
                    <select x-model="currentTheme" 
                            @change="
                                if (window.ThemeManager) {
                                    window.ThemeManager.applyTheme(currentTheme);
                                }
                            "
                            class="px-3 py-2 border border-border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent bg-surface text-text">
                        <option value="light">Light</option>
                        <option value="dark">Dark</option>
                        <option value="pro">Pro</option>
                        <option value="enterprise">Enterprise</option>
                        <option value="glass">Glass</option>
                        <option value="neon">Neon</option>
                        <option value="forest">Forest</option>
                        <option value="sea">Sea</option>
                        <option value="sunset">Sunset</option>
                        <option value="modern">Modern</option>
                        <option value="minimal">Minimal</option>
                        <option value="2d">2D</option>
                        <option value="retro">Retro</option>
                        <option value="cyberpunk">Cyberpunk</option>
                        <option value="pastel">Pastel</option>
                        <option value="midnight">Midnight</option>
                        <option value="aurora">Aurora</option>
                        <option value="cosmic">Cosmic</option>
                        <option value="ocean">Ocean</option>
                        <option value="fire">Fire</option>
                        <option value="earth">Earth</option>
                        <option value="lavender">Lavender</option>
                        <option value="mint">Mint</option>
                    </select>
                    
                    <!-- Menu mobile -->
                    <button @click="sidebarOpen = !sidebarOpen" class="md:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="flex h-full">
        <!-- Sidebar -->
        <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
            <div class="flex-1 flex flex-col min-h-0 bg-surface border-r border-border">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <nav class="mt-5 flex-1 px-2 space-y-1">
                        <a href="{{ route('home') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-text hover:bg-primary hover:text-white transition-colors">
                            🏠 Accueil
                        </a>
                        <a href="{{ route('components-docs') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-text hover:bg-primary hover:text-white transition-colors">
                            📚 Documentation
                        </a>
                        <a href="{{ route('themes-manager') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-text hover:bg-primary hover:text-white transition-colors">
                            🎨 Gestionnaire de Thèmes
                        </a>
                        <a href="{{ route('themes-showcase') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-text hover:bg-primary hover:text-white transition-colors">
                            🌈 Showcase des Thèmes
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="md:pl-64 flex flex-col flex-1">
            <main class="flex-1">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    @stack('scripts')
</body>
</html> 