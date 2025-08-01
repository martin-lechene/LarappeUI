@extends('layouts.app')

@section('title', 'Input - Documentation des Composants')

@section('content')
<!-- Header -->
<div class="mb-8">
    <div class="flex items-center mb-4">
        <span class="text-3xl mr-4">📝</span>
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Input</h1>
            <p class="text-gray-600">Composant de champ de saisie réutilisable avec options configurables</p>
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
            <div class="w-full max-w-md">
                <div class="relative">
                    <input type="text" 
                           :type="inputConfig.type"
                           :placeholder="inputConfig.placeholder"
                           :value="inputConfig.value"
                           :disabled="inputConfig.disabled"
                           :readonly="inputConfig.readonly"
                           :required="inputConfig.required"
                           :class="`
                               w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-offset-2 focus:outline-none transition-colors
                               ${inputConfig.size === 'sm' ? 'px-2 py-1 text-sm' : ''}
                               ${inputConfig.size === 'md' ? 'px-3 py-2 text-base' : ''}
                               ${inputConfig.size === 'lg' ? 'px-4 py-3 text-lg' : ''}
                               ${inputConfig.color === 'primary' ? 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' : ''}
                               ${inputConfig.color === 'success' ? 'border-green-300 focus:ring-green-500 focus:border-green-500' : ''}
                               ${inputConfig.color === 'danger' ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : ''}
                               ${inputConfig.disabled ? 'bg-gray-100 cursor-not-allowed' : ''}
                               ${inputConfig.icon ? (inputConfig.iconPosition === 'left' ? 'pl-10' : 'pr-10') : ''}
                           `">
                    <span x-show="inputConfig.icon && inputConfig.iconPosition === 'left'" 
                          class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" 
                          x-html="inputConfig.icon"></span>
                    <span x-show="inputConfig.icon && inputConfig.iconPosition === 'right'" 
                          class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400" 
                          x-html="inputConfig.icon"></span>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                <select x-model="inputConfig.type" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="text">Text</option>
                    <option value="email">Email</option>
                    <option value="password">Password</option>
                    <option value="number">Number</option>
                    <option value="tel">Tel</option>
                    <option value="url">URL</option>
                </select>
            </div>

            <!-- Placeholder -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Placeholder</label>
                <input type="text" x-model="inputConfig.placeholder" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Size -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Taille</label>
                <select x-model="inputConfig.size" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="sm">Small</option>
                    <option value="md">Medium</option>
                    <option value="lg">Large</option>
                </select>
            </div>

            <!-- Color -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Couleur</label>
                <select x-model="inputConfig.color" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="primary">Primary</option>
                    <option value="success">Success</option>
                    <option value="danger">Danger</option>
                </select>
            </div>

            <!-- Icon -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Icône</label>
                <select x-model="inputConfig.icon" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Aucune</option>
                    <option value="🔍">🔍</option>
                    <option value="📧">📧</option>
                    <option value="🔒">🔒</option>
                    <option value="📱">📱</option>
                </select>
            </div>

            <!-- Icon Position -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Position Icône</label>
                <select x-model="inputConfig.iconPosition" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="left">Gauche</option>
                    <option value="right">Droite</option>
                </select>
            </div>

            <!-- Options -->
            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="checkbox" x-model="inputConfig.disabled" class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Disabled</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" x-model="inputConfig.readonly" class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Readonly</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" x-model="inputConfig.required" class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Required</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" x-model="inputConfig.clearable" class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Clearable</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" x-model="inputConfig.loading" class="mr-2">
                    <label class="text-sm font-medium text-gray-700">Loading</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Examples -->
    <div class="bg-white rounded-lg shadow-sm border p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Exemples</h3>
        
        <div class="space-y-6">
            <!-- Basic Inputs -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Champs de Base</h4>
                <div class="space-y-3">
                    <input type="text" placeholder="Text input" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="email" placeholder="Email input" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="password" placeholder="Password input" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <!-- Sizes -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Tailles</h4>
                <div class="space-y-3">
                    <input type="text" placeholder="Small input" class="w-full px-2 py-1 text-sm border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="text" placeholder="Medium input" class="w-full px-3 py-2 text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="text" placeholder="Large input" class="w-full px-4 py-3 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <!-- Colors -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Couleurs</h4>
                <div class="space-y-3">
                    <input type="text" placeholder="Primary input" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <input type="text" placeholder="Success input" class="w-full px-3 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <input type="text" placeholder="Danger input" class="w-full px-3 py-2 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent">
                </div>
            </div>

            <!-- With Icons -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Avec Icônes</h4>
                <div class="space-y-3">
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">🔍</span>
                    </div>
                    <div class="relative">
                        <input type="email" placeholder="Email" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">📧</span>
                    </div>
                    <div class="relative">
                        <input type="password" placeholder="Password" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">🔒</span>
                    </div>
                </div>
            </div>

            <!-- States -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">États</h4>
                <div class="space-y-3">
                    <input type="text" placeholder="Disabled input" disabled class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
                    <input type="text" placeholder="Readonly input" readonly class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50">
                    <input type="text" placeholder="Required input" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;x-input placeholder="Entrez votre texte..." /&gt;</code></pre>
            </div>

            <!-- With Props -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Avec Propriétés</h4>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;x-input 
    type="text"
    placeholder="Entrez votre texte..."
    size="md"
    color="primary"
    icon="🔍"
    icon-position="left"
    :disabled="false"
    :readonly="false"
    :required="false"
    :clearable="false"
    :loading="false"
/&gt;</code></pre>
            </div>

            <!-- All Variants -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Toutes les Variantes</h4>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;!-- Types --&gt;
&lt;x-input type="text" placeholder="Text" /&gt;
&lt;x-input type="email" placeholder="Email" /&gt;
&lt;x-input type="password" placeholder="Password" /&gt;
&lt;x-input type="number" placeholder="Number" /&gt;

&lt;!-- Tailles --&gt;
&lt;x-input size="sm" placeholder="Small" /&gt;
&lt;x-input size="md" placeholder="Medium" /&gt;
&lt;x-input size="lg" placeholder="Large" /&gt;

&lt;!-- Couleurs --&gt;
&lt;x-input color="primary" placeholder="Primary" /&gt;
&lt;x-input color="success" placeholder="Success" /&gt;
&lt;x-input color="danger" placeholder="Danger" /&gt;

&lt;!-- États --&gt;
&lt;x-input :disabled="true" placeholder="Disabled" /&gt;
&lt;x-input :readonly="true" placeholder="Readonly" /&gt;
&lt;x-input :required="true" placeholder="Required" /&gt;

&lt;!-- Avec Icônes --&gt;
&lt;x-input icon="🔍" placeholder="Search" /&gt;
&lt;x-input icon="📧" icon-position="right" placeholder="Email" /&gt;</code></pre>
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">type</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">'text'</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Type du champ (text, email, password, number, tel, url)</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">placeholder</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">''</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Texte d'aide affiché dans le champ</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">size</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">'md'</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Taille du champ (sm, md, lg)</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">color</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">'primary'</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Couleur du champ (primary, success, danger)</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">icon</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">''</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Icône à afficher dans le champ</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">iconPosition</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">string</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">'left'</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Position de l'icône (left, right)</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">disabled</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Désactive le champ</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">readonly</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Rend le champ en lecture seule</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">required</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Rend le champ obligatoire</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">clearable</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Ajoute un bouton pour effacer le contenu</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">loading</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">boolean</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">false</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Affiche un indicateur de chargement</td>
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
        Alpine.data('inputConfig', () => ({
            type: 'text',
            placeholder: 'Entrez votre texte...',
            value: '',
            disabled: false,
            readonly: false,
            required: false,
            size: 'md',
            color: 'primary',
            icon: '',
            iconPosition: 'left',
            clearable: false,
            loading: false
        }));
    });
</script>
@endpush 