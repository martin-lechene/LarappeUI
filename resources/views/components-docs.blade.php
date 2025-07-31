<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation des Composants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</head>
<body class="h-full bg-gray-50" x-data="{ 
    currentTheme: 'light',
    sidebarOpen: false,
    searchQuery: '',
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
        { key: 'light', name: 'Light', class: 'theme-light' },
        { key: 'dark', name: 'Dark', class: 'theme-dark' },
        { key: 'pro', name: 'Pro', class: 'theme-pro' },
        { key: 'glass', name: 'Glass', class: 'theme-glass' },
        { key: 'forest', name: 'Forest', class: 'theme-forest' },
        { key: 'sea', name: 'Sea', class: 'theme-sea' },
        { key: 'summer', name: 'Summer', class: 'theme-summer' },
        { key: '2d', name: '2D', class: 'theme-2d' }
    ]
}" x-init="
    // Load theme from localStorage
    const savedTheme = localStorage.getItem('theme') || 'light';
    currentTheme = savedTheme;
    document.documentElement.className = themes.find(t => t.key === currentTheme)?.class || 'theme-light';
">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300"
         :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
        
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b">
            <h1 class="text-xl font-bold text-gray-900">🎨 Composants</h1>
            <button @click="sidebarOpen = false" class="lg:hidden p-2 rounded-md hover:bg-gray-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Search -->
        <div class="p-4 border-b">
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
                        document.documentElement.className = themes.find(t => t.key === currentTheme)?.class || 'theme-light';
                        localStorage.setItem('theme', currentTheme);
                    "
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <template x-for="theme in themes" :key="theme.key">
                    <option :value="theme.key" x-text="theme.name"></option>
                </template>
            </select>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto p-4">
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
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:pl-64">
        <!-- Mobile Header -->
        <div class="lg:hidden bg-white shadow-sm border-b">
            <div class="flex items-center justify-between px-4 py-3">
                <h1 class="text-lg font-semibold text-gray-900">🎨 Composants</h1>
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
                <!-- Hero Section -->
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">Bibliothèque de Composants</h1>
                    <p class="text-xl text-gray-600 mb-8">Découvrez tous nos composants réutilisables avec leurs options et thèmes</p>
                    
                    <!-- Quick Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                        <div class="bg-white p-6 rounded-lg shadow-sm border">
                            <div class="text-2xl font-bold text-blue-600" x-text="components.length"></div>
                            <div class="text-sm text-gray-600">Composants</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm border">
                            <div class="text-2xl font-bold text-green-600" x-text="themes.length"></div>
                            <div class="text-sm text-gray-600">Thèmes</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm border">
                            <div class="text-2xl font-bold text-purple-600">4</div>
                            <div class="text-sm text-gray-600">Catégories</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm border">
                            <div class="text-2xl font-bold text-orange-600">100%</div>
                            <div class="text-sm text-gray-600">Responsive</div>
                        </div>
                    </div>
                </div>

                <!-- Components Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="component in components" :key="component.name">
                        <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow">
                            <a :href="'/components-docs/' + component.path" class="block p-6">
                                <div class="flex items-center mb-4">
                                    <span class="text-2xl mr-3" x-text="component.icon"></span>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900" x-text="component.name"></h3>
                                        <p class="text-sm text-gray-500" x-text="component.category"></p>
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm">Composant réutilisable avec options configurables et support multi-thèmes.</p>
                            </a>
                        </div>
                    </template>
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