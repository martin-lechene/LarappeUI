<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select - Documentation des Composants</title>
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
    selectConfig: {
        placeholder: 'Sélectionnez une option...',
        disabled: false,
        size: 'md',
        color: 'primary',
        multiple: false,
        searchable: false,
        clearable: false
    },
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
                        <a href="/components-docs/button" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 hover:text-gray-900 transition-colors">
                            <span class="mr-3">🔘</span>
                            <span>Button</span>
                        </a>
                    </li>
                    <li>
                        <a href="/components-docs/form/input" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 hover:text-gray-900 transition-colors">
                            <span class="mr-3">📝</span>
                            <span>Input</span>
                        </a>
                    </li>
                    <li>
                        <a href="/components-docs/form/select" class="flex items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-md">
                            <span class="mr-3">📋</span>
                            <span>Select</span>
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
                <h1 class="text-lg font-semibold text-gray-900">📋 Select</h1>
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
                <h1 class="text-3xl font-bold text-gray-900 mb-2">📋 Select</h1>
                <p class="text-gray-600">Composant de sélection avec support des options multiples, recherche et thèmes</p>
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
                <!-- Controls -->
                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Configuration</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Placeholder</label>
                            <input type="text" x-model="selectConfig.placeholder" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Taille</label>
                            <select x-model="selectConfig.size" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="sm">Small</option>
                                <option value="md">Medium</option>
                                <option value="lg">Large</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Couleur</label>
                            <select x-model="selectConfig.color" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="primary">Primary</option>
                                <option value="secondary">Secondary</option>
                                <option value="success">Success</option>
                                <option value="warning">Warning</option>
                                <option value="danger">Danger</option>
                            </select>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" x-model="selectConfig.disabled" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Désactivé</span>
                            </label>
                            
                            <label class="flex items-center">
                                <input type="checkbox" x-model="selectConfig.multiple" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Multiple</span>
                            </label>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" x-model="selectConfig.searchable" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Recherche</span>
                            </label>
                            
                            <label class="flex items-center">
                                <input type="checkbox" x-model="selectConfig.clearable" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Effaçable</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Preview -->
                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Aperçu</h3>
                    
                    <div class="space-y-4">
                        <!-- Basic Select -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sélection de base</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    :class="{
                                        'text-sm': selectConfig.size === 'sm',
                                        'text-lg': selectConfig.size === 'lg',
                                        'border-blue-500': selectConfig.color === 'primary',
                                        'border-green-500': selectConfig.color === 'success',
                                        'border-yellow-500': selectConfig.color === 'warning',
                                        'border-red-500': selectConfig.color === 'danger',
                                        'border-gray-500': selectConfig.color === 'secondary',
                                        'bg-gray-100 cursor-not-allowed': selectConfig.disabled
                                    }"
                                    :disabled="selectConfig.disabled">
                                <option value="" disabled selected x-text="selectConfig.placeholder"></option>
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                                <option value="option4">Option 4</option>
                            </select>
                        </div>

                        <!-- Examples -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Avec icône</label>
                                <div class="relative">
                                    <select class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none">
                                        <option value="" disabled selected>Sélectionnez un pays</option>
                                        <option value="fr">France</option>
                                        <option value="us">États-Unis</option>
                                        <option value="uk">Royaume-Uni</option>
                                        <option value="de">Allemagne</option>
                                    </select>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5a2 2 0 002 2h1a2 2 0 002 2 2 2 0 012 2v1.945M8 3.935V5a2 2 0 002 2h1a2 2 0 002 2 2 2 0 012 2v1.945M8 3.935V5a2 2 0 002 2h1a2 2 0 002 2 2 2 0 012 2v1.945"></path>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Multiple</label>
                                <select multiple class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="tag1">Tag 1</option>
                                    <option value="tag2">Tag 2</option>
                                    <option value="tag3">Tag 3</option>
                                    <option value="tag4">Tag 4</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Désactivé</label>
                                <select disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
                                    <option value="" disabled selected>Option désactivée</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Avec validation</label>
                                <select class="w-full px-4 py-2 border border-green-500 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent bg-green-50">
                                    <option value="" disabled selected>Validation réussie</option>
                                    <option value="valid">Option valide</option>
                                </select>
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
    &lt;select {{ $attributes->merge(['class' => $classes]) }}&gt;
        @if($placeholder)
            &lt;option value="" disabled selected&gt;{{ $placeholder }}&lt;/option&gt;
        @endif
        {{ $slot }}
    &lt;/select&gt;
    @if($icon)
        &lt;div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"&gt;
            {!! $icon !!}
        &lt;/div&gt;
    @endif
    &lt;div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none"&gt;
        &lt;svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"&gt;
            &lt;path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"&gt;&lt;/path&gt;
        &lt;/svg&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>

                        <!-- Usage Examples -->
                        <div>
                            <h4 class="font-medium text-gray-900 mb-3">Exemples d'utilisation</h4>
                            <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;!-- Select simple --&gt;
&lt;x-select placeholder="Sélectionnez une option..."&gt;
    &lt;option value="option1"&gt;Option 1&lt;/option&gt;
    &lt;option value="option2"&gt;Option 2&lt;/option&gt;
&lt;/x-select&gt;

&lt;!-- Select avec icône --&gt;
&lt;x-select placeholder="Sélectionnez un pays" icon="&lt;svg&gt;...&lt;/svg&gt;"&gt;
    &lt;option value="fr"&gt;France&lt;/option&gt;
    &lt;option value="us"&gt;États-Unis&lt;/option&gt;
&lt;/x-select&gt;

&lt;!-- Select multiple --&gt;
&lt;x-select multiple placeholder="Sélectionnez des tags"&gt;
    &lt;option value="tag1"&gt;Tag 1&lt;/option&gt;
    &lt;option value="tag2"&gt;Tag 2&lt;/option&gt;
&lt;/x-select&gt;

&lt;!-- Select désactivé --&gt;
&lt;x-select placeholder="Option désactivée" disabled="true"&gt;
    &lt;option value="option1"&gt;Option 1&lt;/option&gt;
&lt;/x-select&gt;</code></pre>
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">placeholder</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">null</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Texte affiché par défaut</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">size</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">md</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Taille du select (sm, md, lg)</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">color</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">primary</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Couleur du select (primary, success, warning, danger)</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">icon</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">null</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Icône HTML à afficher</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">disabled</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Désactive le select</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">multiple</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Permet la sélection multiple</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">searchable</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Permet la recherche dans les options</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">clearable</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Permet d'effacer la sélection</td>
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