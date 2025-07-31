<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button - Documentation des Composants</title>
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
    buttonConfig: {
        label: 'Cliquez-moi',
        color: 'primary',
        size: 'md',
        icon: '',
        loading: false,
        disabled: false,
        outline: false,
        block: false,
        type: 'button'
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
                        <a href="/components-docs/button" class="flex items-center px-3 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-md">
                            <span class="mr-3">🔘</span>
                            <span>Button</span>
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
                <h1 class="text-lg font-semibold text-gray-900">🔘 Button</h1>
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
                        <span class="text-3xl mr-4">🔘</span>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Button</h1>
                            <p class="text-gray-600">Composant de bouton réutilisable avec options configurables</p>
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
                    <!-- Live Preview -->
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Preview Interactive</h3>
                        
                        <!-- Preview Area -->
                        <div class="bg-gray-50 rounded-lg p-8 mb-6 flex items-center justify-center">
                            <button type="button" 
                                    :disabled="buttonConfig.disabled || buttonConfig.loading"
                                    :class="`
                                        inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none
                                        ${buttonConfig.color === 'primary' ? (buttonConfig.outline ? 'border border-blue-600 text-blue-600 bg-white hover:bg-blue-50 focus:ring-blue-500' : 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500') : ''}
                                        ${buttonConfig.color === 'secondary' ? (buttonConfig.outline ? 'border border-gray-400 text-gray-700 bg-white hover:bg-gray-50 focus:ring-gray-400' : 'bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-400') : ''}
                                        ${buttonConfig.color === 'danger' ? (buttonConfig.outline ? 'border border-red-600 text-red-600 bg-white hover:bg-red-50 focus:ring-red-500' : 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500') : ''}
                                        ${buttonConfig.size === 'sm' ? 'px-3 py-1.5 text-xs rounded' : ''}
                                        ${buttonConfig.size === 'md' ? 'px-4 py-2 text-sm rounded-md' : ''}
                                        ${buttonConfig.size === 'lg' ? 'px-6 py-3 text-base rounded-lg' : ''}
                                        ${buttonConfig.block ? ' w-full' : ''}
                                    `">
                                <span x-show="buttonConfig.loading" class="animate-spin h-4 w-4 mr-2 text-current">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                    </svg>
                                </span>
                                <span x-show="buttonConfig.icon && !buttonConfig.loading" class="mr-2" x-html="buttonConfig.icon"></span>
                                <span x-text="buttonConfig.label"></span>
                            </button>
                        </div>

                        <!-- Controls -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Label -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Label</label>
                                <input type="text" x-model="buttonConfig.label" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <!-- Color -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Couleur</label>
                                <select x-model="buttonConfig.color" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="primary">Primary</option>
                                    <option value="secondary">Secondary</option>
                                    <option value="danger">Danger</option>
                                </select>
                            </div>

                            <!-- Size -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Taille</label>
                                <select x-model="buttonConfig.size" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="sm">Small</option>
                                    <option value="md">Medium</option>
                                    <option value="lg">Large</option>
                                </select>
                            </div>

                            <!-- Icon -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Icône (HTML)</label>
                                <input type="text" x-model="buttonConfig.icon" 
                                       placeholder="<svg>...</svg>"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <!-- Type -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                                <select x-model="buttonConfig.type" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="button">Button</option>
                                    <option value="submit">Submit</option>
                                    <option value="reset">Reset</option>
                                </select>
                            </div>

                            <!-- Switches -->
                            <div class="space-y-3">
                                <label class="flex items-center">
                                    <input type="checkbox" x-model="buttonConfig.loading" class="mr-2">
                                    <span class="text-sm font-medium text-gray-700">Loading</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" x-model="buttonConfig.disabled" class="mr-2">
                                    <span class="text-sm font-medium text-gray-700">Disabled</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" x-model="buttonConfig.outline" class="mr-2">
                                    <span class="text-sm font-medium text-gray-700">Outline</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" x-model="buttonConfig.block" class="mr-2">
                                    <span class="text-sm font-medium text-gray-700">Block</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Examples -->
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Exemples d'utilisation</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Basic Examples -->
                            <div>
                                <h4 class="font-medium text-gray-900 mb-3">Exemples de base</h4>
                                <div class="space-y-3">
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                                        Bouton Primary
                                    </button>
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-400 px-4 py-2 text-sm rounded-md">
                                        Bouton Secondary
                                    </button>
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 px-4 py-2 text-sm rounded-md">
                                        Bouton Danger
                                    </button>
                                </div>
                            </div>

                            <!-- Advanced Examples -->
                            <div>
                                <h4 class="font-medium text-gray-900 mb-3">Exemples avancés</h4>
                                <div class="space-y-3">
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none border border-blue-600 text-blue-600 bg-white hover:bg-blue-50 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Avec icône
                                    </button>
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-6 py-3 text-base rounded-lg">
                                        Large
                                    </button>
                                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-3 py-1.5 text-xs rounded">
                                        Small
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tab -->
                <div x-show="activeTab === 'code'" class="space-y-8">
                    <div class="bg-white rounded-lg shadow-sm border p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Code source</h3>
                        
                        <div class="space-y-6">
                            <!-- Component Code -->
                            <div>
                                <h4 class="font-medium text-gray-900 mb-3">Composant Button</h4>
                                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-php">@props([
    'label' => null,
    'color' => 'primary', // primary, secondary, danger, etc.
    'size' => 'md', // sm, md, lg
    'icon' => null,
    'loading' => false,
    'disabled' => false,
    'outline' => false,
    'block' => false,
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none';
    $colors = [
        'primary' => $outline ? 'border border-blue-600 text-blue-600 bg-white hover:bg-blue-50 focus:ring-blue-500' : 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        'secondary' => $outline ? 'border border-gray-400 text-gray-700 bg-white hover:bg-gray-50 focus:ring-gray-400' : 'bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-400',
        'danger' => $outline ? 'border border-red-600 text-red-600 bg-white hover:bg-red-50 focus:ring-red-500' : 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
    ];
    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs rounded',
        'md' => 'px-4 py-2 text-sm rounded-md',
        'lg' => 'px-6 py-3 text-base rounded-lg',
    ];
    $classes = $base . ' ' . ($colors[$color] ?? $colors['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']) . ($block ? ' w-full' : '');
@endphp

&lt;button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled || $loading]) }}&gt;
    @if($loading)
        &lt;svg class="animate-spin h-4 w-4 mr-2 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"&gt;&lt;circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"&gt;&lt;/circle&gt;&lt;path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"&gt;&lt;/path&gt;&lt;/svg&gt;
    @elseif($icon)
        &lt;span class="mr-2"&gt;{!! $icon !!}&lt;/span&gt;
    @endif
    {{ $label ?? $slot }}
&lt;/button&gt;</code></pre>
                            </div>

                            <!-- Usage Examples -->
                            <div>
                                <h4 class="font-medium text-gray-900 mb-3">Exemples d'utilisation</h4>
                                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;!-- Bouton simple --&gt;
&lt;x-button label="Cliquez-moi" /&gt;

&lt;!-- Bouton avec icône --&gt;
&lt;x-button label="Ajouter" icon="&lt;svg class='w-4 h-4'&gt;...&lt;/svg&gt;" /&gt;

&lt;!-- Bouton loading --&gt;
&lt;x-button label="Sauvegarder" loading="true" /&gt;

&lt;!-- Bouton outline --&gt;
&lt;x-button label="Annuler" color="secondary" outline="true" /&gt;

&lt;!-- Bouton danger --&gt;
&lt;x-button label="Supprimer" color="danger" /&gt;

&lt;!-- Bouton large --&gt;
&lt;x-button label="Confirmer" size="lg" /&gt;

&lt;!-- Bouton block --&gt;
&lt;x-button label="Soumettre" block="true" /&gt;</code></pre>
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
                                        <td class="px-6 py-4 text-sm text-gray-500">Texte affiché dans le bouton</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">color</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">primary</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">Couleur du bouton (primary, secondary, danger)</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">size</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">md</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">Taille du bouton (sm, md, lg)</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">icon</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">null</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">Icône HTML à afficher</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">loading</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">Affiche un spinner de chargement</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">disabled</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">Désactive le bouton</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">outline</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">Style outline (bordure)</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">block</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">Bouton pleine largeur</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">type</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">button</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">Type HTML (button, submit, reset)</td>
                                    </tr>
                                </tbody>
                            </table>
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