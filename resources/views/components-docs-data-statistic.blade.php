<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistic - Documentation des Composants</title>
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
                        <a href="/components-docs/data/statistic" class="flex items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-md">
                            <span class="mr-3">📊</span>
                            <span>Statistic</span>
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
                <h1 class="text-lg font-semibold text-gray-900">📊 Statistic</h1>
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
                <h1 class="text-3xl font-bold text-gray-900 mb-2">📊 Statistic</h1>
                <p class="text-gray-600">Composant de statistiques avec support des thèmes et animations</p>
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
                        <!-- Basic Statistics -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Statistiques de base</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="p-5">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-5 w-0 flex-1">
                                                <dl>
                                                    <dt class="text-sm font-medium text-gray-500 truncate">Total utilisateurs</dt>
                                                    <dd class="text-lg font-medium text-gray-900">12,345</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="p-5">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-5 w-0 flex-1">
                                                <dl>
                                                    <dt class="text-sm font-medium text-gray-500 truncate">Revenus</dt>
                                                    <dd class="text-lg font-medium text-gray-900">€45,678</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="p-5">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-5 w-0 flex-1">
                                                <dl>
                                                    <dt class="text-sm font-medium text-gray-500 truncate">Ventes</dt>
                                                    <dd class="text-lg font-medium text-gray-900">2,345</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="p-5">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="ml-5 w-0 flex-1">
                                                <dl>
                                                    <dt class="text-sm font-medium text-gray-500 truncate">Temps moyen</dt>
                                                    <dd class="text-lg font-medium text-gray-900">2.5h</dd>
                                                </dl>
                                            </div>
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
                            <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;div class="bg-white overflow-hidden shadow rounded-lg"&gt;
    &lt;div class="p-5"&gt;
        &lt;div class="flex items-center"&gt;
            &lt;div class="flex-shrink-0"&gt;
                {!! $icon !!}
            &lt;/div&gt;
            &lt;div class="ml-5 w-0 flex-1"&gt;
                &lt;dl&gt;
                    &lt;dt class="text-sm font-medium text-gray-500 truncate"&gt;{{ $label }}&lt;/dt&gt;
                    &lt;dd class="text-lg font-medium text-gray-900"&gt;{{ $value }}&lt;/dd&gt;
                &lt;/dl&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>

                        <!-- Usage Examples -->
                        <div>
                            <h4 class="font-medium text-gray-900 mb-3">Exemples d'utilisation</h4>
                            <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;!-- Statistic simple --&gt;
&lt;x-statistic label="Total utilisateurs" value="12,345" icon="&lt;svg&gt;...&lt;/svg&gt;" /&gt;

&lt;!-- Statistic avec couleur personnalisée --&gt;
&lt;x-statistic label="Revenus" value="€45,678" color="green" /&gt;

&lt;!-- Statistic avec formatage --&gt;
&lt;x-statistic label="Taux de conversion" value="2.5%" format="percentage" /&gt;</code></pre>
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">label</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">null</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Label de la statistique</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">value</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">null</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Valeur de la statistique</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">icon</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">null</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Icône HTML à afficher</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">color</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">gray</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Couleur de l'icône (gray, green, blue, yellow, red)</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">format</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">text</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Format de la valeur (text, number, currency, percentage)</td>
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
