@extends('layouts.app')

@section('title', 'Input - Documentation des Composants')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-text mb-2">Input</h1>
        <p class="text-text-secondary">Composant de champ de saisie avec support des thèmes</p>
    </div>

    <!-- Navigation -->
    <nav class="flex space-x-4 mb-8">
        <a href="{{ route('components-docs') }}" class="text-primary hover:text-primary-hover">
            ← Retour à la documentation
        </a>
    </nav>

    <!-- Contenu principal -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Preview -->
        <div class="lg:col-span-2">
            <div class="card">
                <h2 class="text-xl font-semibold text-text mb-4">Preview</h2>
                
                <div class="space-y-6" x-data="{
                    inputConfig: {
                        type: 'text',
                        placeholder: 'Entrez votre texte...',
                        value: '',
                        disabled: false,
                        required: false,
                        size: 'md',
                        variant: 'default'
                    }
                }">
                    <!-- Contrôles -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Type</label>
                            <select x-model="inputConfig.type" class="form-input">
                                <option value="text">Text</option>
                                <option value="email">Email</option>
                                <option value="password">Password</option>
                                <option value="number">Number</option>
                                <option value="tel">Tel</option>
                                <option value="url">URL</option>
                                <option value="search">Search</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Placeholder</label>
                            <input type="text" x-model="inputConfig.placeholder" class="form-input">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Valeur</label>
                            <input type="text" x-model="inputConfig.value" class="form-input">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Taille</label>
                            <select x-model="inputConfig.size" class="form-input">
                                <option value="sm">Small</option>
                                <option value="md">Medium</option>
                                <option value="lg">Large</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Variante</label>
                            <select x-model="inputConfig.variant" class="form-input">
                                <option value="default">Default</option>
                                <option value="outlined">Outlined</option>
                                <option value="filled">Filled</option>
                                <option value="minimal">Minimal</option>
                            </select>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" x-model="inputConfig.disabled" class="mr-2">
                                <span class="text-sm text-text">Désactivé</span>
                            </label>
                            
                            <label class="flex items-center">
                                <input type="checkbox" x-model="inputConfig.required" class="mr-2">
                                <span class="text-sm text-text">Requis</span>
                            </label>
                        </div>
                    </div>

                    <!-- Preview de l'input -->
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-medium text-text mb-4">Résultat</h3>
                        
                        <div class="space-y-4">
                            <!-- Input principal -->
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">Champ de saisie</label>
                                <input 
                                    :type="inputConfig.type"
                                    :placeholder="inputConfig.placeholder"
                                    :value="inputConfig.value"
                                    :disabled="inputConfig.disabled"
                                    :required="inputConfig.required"
                                    :class="{
                                        'form-input': true,
                                        'form-input-sm': inputConfig.size === 'sm',
                                        'form-input-md': inputConfig.size === 'md',
                                        'form-input-lg': inputConfig.size === 'lg',
                                        'form-input-outlined': inputConfig.variant === 'outlined',
                                        'form-input-filled': inputConfig.variant === 'filled',
                                        'form-input-minimal': inputConfig.variant === 'minimal'
                                    }"
                                    class="w-full">
                            </div>

                            <!-- Exemples de variantes -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-text mb-2">Default</label>
                                    <input type="text" placeholder="Input par défaut" class="form-input w-full">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-text mb-2">Outlined</label>
                                    <input type="text" placeholder="Input outlined" class="form-input form-input-outlined w-full">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-text mb-2">Filled</label>
                                    <input type="text" placeholder="Input filled" class="form-input form-input-filled w-full">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-text mb-2">Minimal</label>
                                    <input type="text" placeholder="Input minimal" class="form-input form-input-minimal w-full">
                                </div>
                            </div>

                            <!-- États -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-text mb-2">Désactivé</label>
                                    <input type="text" placeholder="Input désactivé" disabled class="form-input w-full">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-text mb-2">Avec erreur</label>
                                    <input type="text" placeholder="Input avec erreur" class="form-input form-input-error w-full">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Code et propriétés -->
        <div class="space-y-6">
            <!-- Code -->
            <div class="card">
                <h2 class="text-xl font-semibold text-text mb-4">Code</h2>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-php">&lt;x-input 
    type="text"
    placeholder="Entrez votre texte..."
    value=""
    disabled="false"
    required="false"
    size="md"
    variant="default"
/&gt;</code></pre>
            </div>

            <!-- Propriétés -->
            <div class="card">
                <h2 class="text-xl font-semibold text-text mb-4">Propriétés</h2>
                
                <div class="space-y-4">
                    <div>
                        <h3 class="font-medium text-text mb-2">type</h3>
                        <p class="text-sm text-text-secondary">Type du champ (text, email, password, number, tel, url, search)</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: text</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">placeholder</h3>
                        <p class="text-sm text-text-secondary">Texte d'aide affiché dans le champ</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: null</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">value</h3>
                        <p class="text-sm text-text-secondary">Valeur initiale du champ</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: null</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">disabled</h3>
                        <p class="text-sm text-text-secondary">Désactive le champ</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: false</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">required</h3>
                        <p class="text-sm text-text-secondary">Rend le champ obligatoire</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: false</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">size</h3>
                        <p class="text-sm text-text-secondary">Taille du champ (sm, md, lg)</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: md</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">variant</h3>
                        <p class="text-sm text-text-secondary">Style du champ (default, outlined, filled, minimal)</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: default</p>
                    </div>
                </div>
            </div>

            <!-- Classes CSS -->
            <div class="card">
                <h2 class="text-xl font-semibold text-text mb-4">Classes CSS</h2>
                
                <div class="space-y-2 text-sm">
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.form-input</code> - Classe de base</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.form-input-sm</code> - Taille petite</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.form-input-md</code> - Taille moyenne</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.form-input-lg</code> - Taille grande</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.form-input-outlined</code> - Style outlined</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.form-input-filled</code> - Style filled</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.form-input-minimal</code> - Style minimal</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.form-input-error</code> - État d'erreur</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection