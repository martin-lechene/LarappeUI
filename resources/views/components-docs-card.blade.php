@extends('layouts.app')

@section('title', 'Card - Documentation des Composants')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-text mb-2">Card</h1>
        <p class="text-text-secondary">Composant de carte avec support des thèmes et variantes</p>
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
                    cardConfig: {
                        variant: 'default',
                        padding: 'md',
                        shadow: 'md',
                        border: true,
                        hover: false
                    }
                }">
                    <!-- Contrôles -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Variante</label>
                            <select x-model="cardConfig.variant" class="form-input">
                                <option value="default">Default</option>
                                <option value="elevated">Elevated</option>
                                <option value="outlined">Outlined</option>
                                <option value="filled">Filled</option>
                                <option value="glass">Glass</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Padding</label>
                            <select x-model="cardConfig.padding" class="form-input">
                                <option value="sm">Small</option>
                                <option value="md">Medium</option>
                                <option value="lg">Large</option>
                                <option value="xl">Extra Large</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Ombre</label>
                            <select x-model="cardConfig.shadow" class="form-input">
                                <option value="none">None</option>
                                <option value="sm">Small</option>
                                <option value="md">Medium</option>
                                <option value="lg">Large</option>
                                <option value="xl">Extra Large</option>
                            </select>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" x-model="cardConfig.border" class="mr-2">
                                <span class="text-sm text-text">Bordure</span>
                            </label>
                            
                            <label class="flex items-center">
                                <input type="checkbox" x-model="cardConfig.hover" class="mr-2">
                                <span class="text-sm text-text">Effet hover</span>
                            </label>
                        </div>
                    </div>

                    <!-- Preview de la card -->
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-medium text-text mb-4">Résultat</h3>
                        
                        <div class="space-y-4">
                            <!-- Card principale -->
                            <div :class="{
                                'card': true,
                                'card-elevated': cardConfig.variant === 'elevated',
                                'card-outlined': cardConfig.variant === 'outlined',
                                'card-filled': cardConfig.variant === 'filled',
                                'card-glass': cardConfig.variant === 'glass',
                                'card-p-sm': cardConfig.padding === 'sm',
                                'card-p-md': cardConfig.padding === 'md',
                                'card-p-lg': cardConfig.padding === 'lg',
                                'card-p-xl': cardConfig.padding === 'xl',
                                'card-shadow-none': cardConfig.shadow === 'none',
                                'card-shadow-sm': cardConfig.shadow === 'sm',
                                'card-shadow-md': cardConfig.shadow === 'md',
                                'card-shadow-lg': cardConfig.shadow === 'lg',
                                'card-shadow-xl': cardConfig.shadow === 'xl',
                                'card-border-none': !cardConfig.border,
                                'card-hover': cardConfig.hover
                            }">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-lg font-semibold text-text">Titre de la carte</h4>
                                    <span class="text-sm text-text-secondary">Badge</span>
                                </div>
                                
                                <p class="text-text-secondary mb-4">
                                    Ceci est un exemple de contenu pour la carte. La carte peut contenir n'importe quel type de contenu : texte, images, formulaires, etc.
                                </p>
                                
                                <div class="flex justify-end space-x-2">
                                    <button class="btn btn-secondary btn-sm">Annuler</button>
                                    <button class="btn btn-primary btn-sm">Confirmer</button>
                                </div>
                            </div>

                            <!-- Exemples de variantes -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="card card-elevated">
                                    <h5 class="font-semibold text-text mb-2">Elevated</h5>
                                    <p class="text-sm text-text-secondary">Carte avec élévation</p>
                                </div>
                                
                                <div class="card card-outlined">
                                    <h5 class="font-semibold text-text mb-2">Outlined</h5>
                                    <p class="text-sm text-text-secondary">Carte avec bordure</p>
                                </div>
                                
                                <div class="card card-filled">
                                    <h5 class="font-semibold text-text mb-2">Filled</h5>
                                    <p class="text-sm text-text-secondary">Carte remplie</p>
                                </div>
                                
                                <div class="card card-glass">
                                    <h5 class="font-semibold text-text mb-2">Glass</h5>
                                    <p class="text-sm text-text-secondary">Effet de verre</p>
                                </div>
                            </div>

                            <!-- Cards avec images -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="card overflow-hidden">
                                    <img src="https://via.placeholder.com/300x200" alt="Placeholder" class="w-full h-32 object-cover">
                                    <div class="p-4">
                                        <h5 class="font-semibold text-text mb-2">Card avec image</h5>
                                        <p class="text-sm text-text-secondary">Description courte</p>
                                    </div>
                                </div>
                                
                                <div class="card card-elevated overflow-hidden">
                                    <div class="p-4">
                                        <h5 class="font-semibold text-text mb-2">Card avec icône</h5>
                                        <p class="text-sm text-text-secondary">Description avec icône</p>
                                        <div class="mt-3 text-primary">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card card-outlined">
                                    <div class="p-4">
                                        <h5 class="font-semibold text-text mb-2">Card simple</h5>
                                        <p class="text-sm text-text-secondary">Contenu simple</p>
                                        <button class="btn btn-primary btn-sm mt-3">Action</button>
                                    </div>
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
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-php">&lt;x-card 
    variant="default"
    padding="md"
    shadow="md"
    border="true"
    hover="false"
&gt;
    &lt;h4&gt;Titre de la carte&lt;/h4&gt;
    &lt;p&gt;Contenu de la carte&lt;/p&gt;
&lt;/x-card&gt;</code></pre>
            </div>

            <!-- Propriétés -->
            <div class="card">
                <h2 class="text-xl font-semibold text-text mb-4">Propriétés</h2>
                
                <div class="space-y-4">
                    <div>
                        <h3 class="font-medium text-text mb-2">variant</h3>
                        <p class="text-sm text-text-secondary">Style de la carte (default, elevated, outlined, filled, glass)</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: default</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">padding</h3>
                        <p class="text-sm text-text-secondary">Espacement interne (sm, md, lg, xl)</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: md</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">shadow</h3>
                        <p class="text-sm text-text-secondary">Ombre (none, sm, md, lg, xl)</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: md</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">border</h3>
                        <p class="text-sm text-text-secondary">Afficher la bordure</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: true</p>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-text mb-2">hover</h3>
                        <p class="text-sm text-text-secondary">Effet au survol</p>
                        <p class="text-xs text-text-muted mt-1">Défaut: false</p>
                    </div>
                </div>
            </div>

            <!-- Classes CSS -->
            <div class="card">
                <h2 class="text-xl font-semibold text-text mb-4">Classes CSS</h2>
                
                <div class="space-y-2 text-sm">
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card</code> - Classe de base</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-elevated</code> - Style élevé</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-outlined</code> - Style avec bordure</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-filled</code> - Style rempli</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-glass</code> - Effet de verre</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-p-sm</code> - Padding petit</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-p-md</code> - Padding moyen</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-p-lg</code> - Padding grand</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-p-xl</code> - Padding très grand</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-shadow-*</code> - Ombres</div>
                    <div><code class="bg-gray-100 px-2 py-1 rounded">.card-hover</code> - Effet hover</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection