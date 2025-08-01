<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Thèmes - Documentation des Composants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    <script src="{{ asset('js/themes-manager.js') }}"></script>
</head>
<body class="h-full bg-gray-50" x-data="{
    currentTheme: 'light',
    sidebarOpen: false,
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
    // Load theme from localStorage
    let savedTheme = localStorage.getItem('theme') || 'light';
    currentTheme = savedTheme;
    if (window.ThemeManager) {
        window.ThemeManager.applyTheme(currentTheme);
    }
">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300"
         :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b">
            <h1 class="text-xl font-bold text-gray-900">🎨 Thèmes</h1>
            <button @click="sidebarOpen = false" class="lg:hidden p-2 rounded-md hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto p-4">
            <div class="mb-6">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Navigation</h3>
                <ul class="space-y-1">
                    <li>
                        <a href="/components-docs" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 hover:text-gray-900 transition-colors">
                            <span class="mr-3">🏠</span>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="/themes-manager" class="flex items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-md">
                            <span class="mr-3">🎨</span>
                            <span>Gestionnaire de Thèmes</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Current Theme -->
            <div class="mb-6">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Thème Actuel</h3>
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
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:pl-64">
        <!-- Mobile Header -->
        <div class="lg:hidden bg-white shadow-sm border-b">
            <div class="flex items-center justify-between px-4 py-3">
                <h1 class="text-lg font-semibold text-gray-900">🎨 Gestionnaire de Thèmes</h1>
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
                <!-- Header -->
                <div class="mb-8">
                    <div class="flex items-center mb-4">
                        <span class="text-3xl mr-4">🎨</span>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Gestionnaire de Thèmes</h1>
                            <p class="text-gray-600">Personnalisez l'apparence de vos composants avec nos thèmes prédéfinis</p>
                        </div>
                    </div>

                    <!-- Tabs -->
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8">
                            <button @click="activeTab = 'preview'"
                                    :class="activeTab === 'preview' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                                Preview
                            </button>
                            <button @click="activeTab = 'themes'"
                                    :class="activeTab === 'themes' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                                Thèmes
                            </button>
                            <button @click="activeTab = 'custom'"
                                    :class="activeTab === 'custom' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                                Personnalisé
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Preview Tab -->
                <div x-show="activeTab === 'preview'" class="space-y-8">
                    <!-- Theme Preview -->
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Preview du Thème</h3>

                        <!-- Component Showcase -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Buttons -->
                            <div>
                                <h4 class="font-medium text-gray-900 mb-4">Boutons</h4>
                                <div class="space-y-3">
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                                        Primary
                                    </button>
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-400 px-4 py-2 text-sm rounded-md">
                                        Secondary
                                    </button>
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 px-4 py-2 text-sm rounded-md">
                                        Danger
                                    </button>
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-green-600 text-white hover:bg-green-700 focus:ring-green-500 px-4 py-2 text-sm rounded-md">
                                        Success
                                    </button>
                                </div>
                            </div>

                            <!-- Form Elements -->
                            <div>
                                <h4 class="font-medium text-gray-900 mb-4">Éléments de Formulaire</h4>
                                <div class="space-y-3">
                                    <input type="text" placeholder="Input field" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        <option>Select option</option>
                                    </select>
                                    <div class="flex items-center">
                                        <input type="checkbox" class="mr-2">
                                        <span class="text-sm">Checkbox</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Color Palette -->
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Palette de Couleurs</h3>

                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                            <div class="text-center">
                                <div class="w-16 h-16 rounded-lg bg-blue-600 mx-auto mb-2"></div>
                                <p class="text-xs font-medium text-gray-900">Primary</p>
                                <p class="text-xs text-gray-500">#3b82f6</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 rounded-lg bg-gray-600 mx-auto mb-2"></div>
                                <p class="text-xs font-medium text-gray-900">Secondary</p>
                                <p class="text-xs text-gray-500">#6b7280</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 rounded-lg bg-green-600 mx-auto mb-2"></div>
                                <p class="text-xs font-medium text-gray-900">Success</p>
                                <p class="text-xs text-gray-500">#10b981</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 rounded-lg bg-yellow-500 mx-auto mb-2"></div>
                                <p class="text-xs font-medium text-gray-900">Warning</p>
                                <p class="text-xs text-gray-500">#f59e0b</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 rounded-lg bg-red-500 mx-auto mb-2"></div>
                                <p class="text-xs font-medium text-gray-900">Danger</p>
                                <p class="text-xs text-gray-500">#ef4444</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 rounded-lg bg-cyan-500 mx-auto mb-2"></div>
                                <p class="text-xs font-medium text-gray-900">Info</p>
                                <p class="text-xs text-gray-500">#06b6d4</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Themes Tab -->
                <div x-show="activeTab === 'themes'" class="space-y-8">
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Thèmes Disponibles</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <template x-for="theme in themes" :key="theme.key">
                                <div class="border rounded-lg p-4 cursor-pointer hover:shadow-md transition-shadow"
                                     :class="currentTheme === theme.key ? 'ring-2 ring-blue-500 bg-blue-50' : 'bg-white'"
                                     @click="
                                         currentTheme = theme.key;
                                         if (window.ThemeManager) {
                                             window.ThemeManager.applyTheme(theme.key);
                                         }
                                     ">
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="font-medium text-gray-900" x-text="theme.name"></h4>
                                        <div x-show="currentTheme === theme.key" class="text-blue-600">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-3" x-text="theme.description"></p>

                                    <!-- Color Preview -->
                                    <div class="flex space-x-2">
                                        <div class="w-4 h-4 rounded-full bg-blue-600"></div>
                                        <div class="w-4 h-4 rounded-full bg-gray-600"></div>
                                        <div class="w-4 h-4 rounded-full bg-green-600"></div>
                                        <div class="w-4 h-4 rounded-full bg-red-500"></div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Custom Tab -->
                <div x-show="activeTab === 'custom'" class="space-y-8">
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Thème Personnalisé</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Color Controls -->
                            <div>
                                <h4 class="font-medium text-gray-900 mb-4">Couleurs</h4>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.primary" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.primary" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.secondary" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.secondary" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Success</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.success" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.success" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Warning</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.warning" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.warning" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Danger</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.danger" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.danger" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Info</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.info" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.info" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Background Controls -->
                            <div>
                                <h4 class="font-medium text-gray-900 mb-4">Arrière-plans</h4>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Background</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.background" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.background" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Surface</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.surface" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.surface" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Text</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.text" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Text Secondary</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.textSecondary" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.textSecondary" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Border</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.border" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.border" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Accent</label>
                                        <div class="flex items-center space-x-2">
                                            <input type="color" x-model="customTheme.accent" class="w-12 h-8 border border-gray-300 rounded">
                                            <input type="text" x-model="customTheme.accent" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="mt-8 flex space-x-4">
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Appliquer le Thème
                            </button>
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Exporter
                            </button>
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Réinitialiser
                            </button>
                        </div>
                    </div>
                </div>
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
</body>
</html>
