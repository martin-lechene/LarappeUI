@extends('layouts.app')

@section('title', 'Button - Documentation des Composants')

@section('content')
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
                <label class="block text-sm font-medium text-gray-700 mb-2">Icône</label>
                <select x-model="buttonConfig.icon" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Aucune</option>
                    <option value="🚀">🚀</option>
                    <option value="⭐">⭐</option>
                    <option value="💡">💡</option>
                    <option value="🎯">🎯</option>
                </select>
            </div>

            <!-- Options -->
            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="checkbox" x-model="buttonConfig.loading" class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Loading</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" x-model="buttonConfig.disabled" class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Disabled</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" x-model="buttonConfig.outline" class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Outline</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" x-model="buttonConfig.block" class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Block</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Examples -->
    <div class="bg-white rounded-lg shadow-sm border p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Exemples</h3>
        
        <div class="space-y-6">
            <!-- Basic Buttons -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Boutons de Base</h4>
                <div class="flex flex-wrap gap-3">
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                        Primary
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-400 px-4 py-2 text-sm rounded-md">
                        Secondary
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 px-4 py-2 text-sm rounded-md">
                        Danger
                    </button>
                </div>
            </div>

            <!-- Sizes -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Tailles</h4>
                <div class="flex flex-wrap items-center gap-3">
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-3 py-1.5 text-xs rounded">
                        Small
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                        Medium
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-6 py-3 text-base rounded-lg">
                        Large
                    </button>
                </div>
            </div>

            <!-- Outline -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Outline</h4>
                <div class="flex flex-wrap gap-3">
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none border border-blue-600 text-blue-600 bg-white hover:bg-blue-50 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                        Primary Outline
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none border border-gray-400 text-gray-700 bg-white hover:bg-gray-50 focus:ring-gray-400 px-4 py-2 text-sm rounded-md">
                        Secondary Outline
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none border border-red-600 text-red-600 bg-white hover:bg-red-50 focus:ring-red-500 px-4 py-2 text-sm rounded-md">
                        Danger Outline
                    </button>
                </div>
            </div>

            <!-- With Icons -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Avec Icônes</h4>
                <div class="flex flex-wrap gap-3">
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                        <span class="mr-2">🚀</span>
                        Launch
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-green-600 text-white hover:bg-green-700 focus:ring-green-500 px-4 py-2 text-sm rounded-md">
                        <span class="mr-2">⭐</span>
                        Star
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-purple-600 text-white hover:bg-purple-700 focus:ring-purple-500 px-4 py-2 text-sm rounded-md">
                        <span class="mr-2">💡</span>
                        Idea
                    </button>
                </div>
            </div>

            <!-- Loading -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Loading</h4>
                <div class="flex flex-wrap gap-3">
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                        <span class="animate-spin h-4 w-4 mr-2 text-current">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                            </svg>
                        </span>
                        Loading...
                    </button>
                </div>
            </div>

            <!-- Disabled -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Disabled</h4>
                <div class="flex flex-wrap gap-3">
                    <button disabled class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                        Disabled
                    </button>
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
            <!-- Basic Usage -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Utilisation de Base</h4>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;x-button&gt;Cliquez-moi&lt;/x-button&gt;</code></pre>
            </div>

            <!-- With Props -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Avec Propriétés</h4>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;x-button 
    color="primary"
    size="md"
    :loading="true"
    :disabled="false"
    :outline="false"
    :block="false"
    icon="🚀"
&gt;
    Cliquez-moi
&lt;/x-button&gt;</code></pre>
            </div>

            <!-- All Variants -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Toutes les Variantes</h4>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;!-- Couleurs --&gt;
&lt;x-button color="primary"&gt;Primary&lt;/x-button&gt;
&lt;x-button color="secondary"&gt;Secondary&lt;/x-button&gt;
&lt;x-button color="danger"&gt;Danger&lt;/x-button&gt;

&lt;!-- Tailles --&gt;
&lt;x-button size="sm"&gt;Small&lt;/x-button&gt;
&lt;x-button size="md"&gt;Medium&lt;/x-button&gt;
&lt;x-button size="lg"&gt;Large&lt;/x-button&gt;

&lt;!-- Options --&gt;
&lt;x-button :loading="true"&gt;Loading&lt;/x-button&gt;
&lt;x-button :disabled="true"&gt;Disabled&lt;/x-button&gt;
&lt;x-button :outline="true"&gt;Outline&lt;/x-button&gt;
&lt;x-button :block="true"&gt;Block&lt;/x-button&gt;

&lt;!-- Avec Icône --&gt;
&lt;x-button icon="🚀"&gt;Launch&lt;/x-button&gt;</code></pre>
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">color</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">'primary'</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Couleur du bouton (primary, secondary, danger)</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">size</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">'md'</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Taille du bouton (sm, md, lg)</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">icon</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">''</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Icône à afficher avant le texte</td>
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
                        <td class="px-6 py-4 text-sm text-gray-500">Style outline (bordure seulement)</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">block</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Bouton en pleine largeur</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">type</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">'button'</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Type du bouton (button, submit, reset)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Configuration spécifique pour cette page
    document.addEventListener('alpine:init', () => {
        Alpine.data('buttonConfig', () => ({
            label: 'Cliquez-moi',
            color: 'primary',
            size: 'md',
            icon: '',
            loading: false,
            disabled: false,
            outline: false,
            block: false,
            type: 'button'
        }));
    });
</script>
@endpush