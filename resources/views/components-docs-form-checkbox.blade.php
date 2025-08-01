<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox - Documentation des Composants</title>
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
    checkboxConfig: {
        label: 'Accepter les conditions',
        checked: false,
        disabled: false,
        size: 'md',
        color: 'primary'
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
                        <a href="/components-docs/form/select" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100 hover:text-gray-900 transition-colors">
                            <span class="mr-3">📋</span>
                            <span>Select</span>
                        </a>
                    </li>
                    <li>
                        <a href="/components-docs/form/checkbox" class="flex items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-md">
                            <span class="mr-3">☑️</span>
                            <span>Checkbox</span>
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
                <h1 class="text-lg font-semibold text-gray-900">☑️ Checkbox</h1>
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
                <h1 class="text-3xl font-bold text-gray-900 mb-2">☑️ Checkbox</h1>
                <p class="text-gray-600">Composant de case à cocher avec support des thèmes et validation</p>
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
                            <label class="block text-sm font-medium text-gray-700 mb-2">Label</label>
                            <input type="text" x-model="checkboxConfig.label" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Taille</label>
                            <select x-model="checkboxConfig.size" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="sm">Small</option>
                                <option value="md">Medium</option>
                                <option value="lg">Large</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Couleur</label>
                            <select x-model="checkboxConfig.color" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="primary">Primary</option>
                                <option value="secondary">Secondary</option>
                                <option value="success">Success</option>
                                <option value="warning">Warning</option>
                                <option value="danger">Danger</option>
                            </select>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" x-model="checkboxConfig.checked" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Coché</span>
                            </label>
                            
                            <label class="flex items-center">
                                <input type="checkbox" x-model="checkboxConfig.disabled" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Désactivé</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Preview -->
                <div class="bg-white rounded-lg shadow-sm border p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Aperçu</h3>
                    
                    <div class="space-y-4">
                        <!-- Basic Checkbox -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Checkbox de base</label>
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       x-model="checkboxConfig.checked"
                                       :disabled="checkboxConfig.disabled"
                                       class="rounded border-gray-300 focus:ring-2 focus:ring-blue-500"
                                       :class="{
                                           'w-4 h-4': checkboxConfig.size === 'md',
                                           'w-3 h-3': checkboxConfig.size === 'sm',
                                           'w-5 h-5': checkboxConfig.size === 'lg',
                                           'text-blue-600': checkboxConfig.color === 'primary',
                                           'text-green-600': checkboxConfig.color === 'success',
                                           'text-yellow-600': checkboxConfig.color === 'warning',
                                           'text-red-600': checkboxConfig.color === 'danger',
                                           'text-gray-600': checkboxConfig.color === 'secondary',
                                           'opacity-50 cursor-not-allowed': checkboxConfig.disabled
                                       }">
                                <span class="ml-2 text-sm text-gray-700" x-text="checkboxConfig.label"></span>
                            </label>
                        </div>

                        <!-- Examples -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Avec description</label>
                                <label class="flex items-start">
                                    <input type="checkbox" class="mt-1 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <div class="ml-2">
                                        <span class="text-sm font-medium text-gray-700">Notifications par email</span>
                                        <p class="text-xs text-gray-500">Recevez des notifications par email</p>
                                    </div>
                                </label>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Désactivé</label>
                                <label class="flex items-center opacity-50 cursor-not-allowed">
                                    <input type="checkbox" disabled class="rounded border-gray-300 text-gray-400">
                                    <span class="ml-2 text-sm text-gray-500">Option désactivée</span>
                                </label>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Groupe de checkboxes</label>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Option 1</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Option 2</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Option 3</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Avec validation</label>
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-green-500 text-green-600 focus:ring-green-500">
                                    <span class="ml-2 text-sm text-gray-700">Validation réussie</span>
                                </label>
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
                            <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;label class="flex items-center"&gt;
    &lt;input type="checkbox" 
           {{ $attributes->merge(['class' => $classes]) }}&gt;
    &lt;span class="ml-2 text-sm text-gray-700"&gt;{{ $label }}&lt;/span&gt;
&lt;/label&gt;</code></pre>
                        </div>

                        <!-- Usage Examples -->
                        <div>
                            <h4 class="font-medium text-gray-900 mb-3">Exemples d'utilisation</h4>
                            <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;!-- Checkbox simple --&gt;
&lt;x-checkbox label="Accepter les conditions" /&gt;

&lt;!-- Checkbox avec description --&gt;
&lt;x-checkbox label="Notifications par email" description="Recevez des notifications" /&gt;

&lt;!-- Checkbox désactivé --&gt;
&lt;x-checkbox label="Option désactivée" disabled="true" /&gt;

&lt;!-- Checkbox avec validation --&gt;
&lt;x-checkbox label="Validation réussie" color="success" /&gt;

&lt;!-- Groupe de checkboxes --&gt;
&lt;x-checkbox-group&gt;
    &lt;x-checkbox label="Option 1" /&gt;
    &lt;x-checkbox label="Option 2" /&gt;
    &lt;x-checkbox label="Option 3" /&gt;
&lt;/x-checkbox-group&gt;</code></pre>
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
                                    <td class="px-6 py-4 text-sm text-gray-500">Texte affiché à côté de la checkbox</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">description</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">null</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Description optionnelle sous le label</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">size</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">md</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Taille de la checkbox (sm, md, lg)</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">color</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">primary</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Couleur de la checkbox (primary, success, warning, danger)</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">checked</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">État coché de la checkbox</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">disabled</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">Désactive la checkbox</td>
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