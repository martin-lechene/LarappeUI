<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline - Documentation des Composants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</head>
<body class="h-full bg-gray-50" x-data="{ 
    currentTheme: 'light',
    sidebarOpen: false,
    activeTab: 'preview',
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
                        <a href="/components-docs/data/timeline" class="flex items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-md">
                            <span class="mr-3">📅</span>
                            <span>Timeline</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Theme Selector -->
            <div class="mb-6">
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Thème</h3>
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
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:pl-64">
        <!-- Mobile Header -->
        <div class="lg:hidden bg-white shadow-sm border-b">
            <div class="flex items-center justify-between px-4 py-3">
                <h1 class="text-lg font-semibold text-gray-900">📅 Timeline</h1>
                <button @click="sidebarOpen = true" class="p-2 rounded-md hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">📅 Timeline</h1>
                <p class="text-gray-600">Composant de chronologie avec support des thèmes et animations</p>
            </div>

            <!-- Tabs -->
            <div class="mb-6">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button @click="activeTab = 'preview'" 
                                :class="activeTab === 'preview' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                            Aperçu
                        </button>
                        <button @click="activeTab = 'code'" 
                                :class="activeTab === 'code' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                            Code
                        </button>
                        <button @click="activeTab = 'props'" 
                                :class="activeTab === 'props' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                            Propriétés
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Preview Tab -->
            <div x-show="activeTab === 'preview'" class="space-y-8">
                <!-- Preview -->
                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Aperçu</h3>
                    
                    <div class="space-y-4">
                        <!-- Basic Timeline -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Timeline de base</label>
                            <div class="relative">
                                <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200"></div>
                                
                                <div class="space-y-6">
                                    <div class="relative flex items-start">
                                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="text-sm font-medium text-gray-900">Étape 1</h4>
                                            <p class="text-sm text-gray-500 mt-1">Description de l'étape 1</p>
                                            <p class="text-xs text-gray-400 mt-1">Il y a 2 heures</p>
                                        </div>
                                    </div>
                                    
                                    <div class="relative flex items-start">
                                        <div class="flex-shrink-0 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="text-sm font-medium text-gray-900">Étape 2</h4>
                                            <p class="text-sm text-gray-500 mt-1">Description de l'étape 2</p>
                                            <p class="text-xs text-gray-400 mt-1">Il y a 1 heure</p>
                                        </div>
                                    </div>
                                    
                                    <div class="relative flex items-start">
                                        <div class="flex-shrink-0 w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <h4 class="text-sm font-medium text-gray-900">Étape 3</h4>
                                            <p class="text-sm text-gray-500 mt-1">Description de l'étape 3</p>
                                            <p class="text-xs text-gray-400 mt-1">En cours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Code Tab -->
            <div x-show="activeTab === 'code'" class="space-y-8">
                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Code</h3>
                    
                    <div class="space-y-6">
                        <!-- Component Code -->
                        <div>
                            <h4 class="font-medium text-gray-900 mb-3">Composant</h4>
                            <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;div class="relative"&gt;
    &lt;div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200"&gt;&lt;/div&gt;
    &lt;div class="space-y-6"&gt;
        @foreach($items as $item)
            &lt;div class="relative flex items-start"&gt;
                &lt;div class="flex-shrink-0 w-8 h-8 {{ $item['color'] }} rounded-full flex items-center justify-center"&gt;
                    {!! $item['icon'] !!}
                &lt;/div&gt;
                &lt;div class="ml-4 flex-1"&gt;
                    &lt;h4 class="text-sm font-medium text-gray-900"&gt;{{ $item['title'] }}&lt;/h4&gt;
                    &lt;p class="text-sm text-gray-500 mt-1"&gt;{{ $item['description'] }}&lt;/p&gt;
                    &lt;p class="text-xs text-gray-400 mt-1"&gt;{{ $item['time'] }}&lt;/p&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        @endforeach
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>

                        <!-- Usage Examples -->
                        <div>
                            <h4 class="font-medium text-gray-900 mb-3">Exemples d'utilisation</h4>
                            <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;!-- Timeline simple --&gt;
&lt;x-timeline :items="$timelineItems" /&gt;

&lt;!-- Timeline avec couleurs personnalisées --&gt;
&lt;x-timeline :items="$timelineItems" color="blue" /&gt;

&lt;!-- Timeline avec icônes personnalisées --&gt;
&lt;x-timeline :items="$timelineItems" icon="custom" /&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Props Tab -->
            <div x-show="activeTab === 'props'" class="space-y-8">
                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Propriétés</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Propriété</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Défaut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">items</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">array</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">[]</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Liste des éléments de la timeline</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">color</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">blue</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Couleur par défaut des points</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">size</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">md</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Taille des points (sm, md, lg)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
