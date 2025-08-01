@extends('layouts.app')

@section('title', 'Showcase des Thèmes - 20 Thèmes')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-text mb-2">🎨 Showcase des Thèmes</h1>
        <p class="text-text-secondary">Découvrez nos 20 thèmes disponibles avec des exemples interactifs</p>
        <div class="flex items-center space-x-4 mt-4">
            <span class="px-3 py-1 bg-primary text-white text-sm font-medium rounded-full">20 Thèmes</span>
            <span class="px-3 py-1 bg-success text-white text-sm font-medium rounded-full">100% Fonctionnels</span>
            <span class="px-3 py-1 bg-info text-white text-sm font-medium rounded-full">Responsive</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex space-x-4 mb-8">
        <a href="{{ route('components-docs') }}" class="text-primary hover:text-primary-hover">
            ← Retour à la documentation
        </a>
    </nav>

    <!-- Contenu principal -->
    <div x-data="{ 
        activeTab: 'all',
        searchQuery: '',
        allThemes: [
            // Thèmes de base
            { key: 'light', name: 'Light', category: 'base', description: 'Thème clair par défaut', featured: true },
            { key: 'dark', name: 'Dark', category: 'base', description: 'Thème sombre élégant', featured: true },
            { key: 'pro', name: 'Pro (FrappeUI)', category: 'professional', description: 'Thème professionnel', featured: true },
            
            // Thèmes naturels
            { key: 'forest', name: 'Forest', category: 'nature', description: 'Tons verts naturels' },
            { key: 'forest-night', name: 'Forest Night', category: 'nature', description: 'Version nocturne du thème forest' },
            { key: 'sea', name: 'Sea', category: 'nature', description: 'Bleus océaniques' },
            { key: 'sakura', name: 'Sakura', category: 'nature', description: 'Thème floral japonais' },
            { key: 'summer', name: 'Summer', category: 'nature', description: 'Couleurs estivales chaleureuses' },
            
            // Thèmes créatifs
            { key: 'glass', name: 'Glass', category: 'creative', description: 'Effet de verre avec transparence' },
            { key: '2d', name: '2D', category: 'creative', description: 'Couleurs géométriques vives' },
            { key: 'retro80s', name: 'Retro 80s', category: 'creative', description: 'Style rétro années 80' },
            { key: 'space', name: 'Space', category: 'creative', description: 'Thème spatial mystérieux' },
            
            // Thèmes spécialisés
            { key: 'minimal', name: 'Minimal', category: 'special', description: 'Design minimaliste épuré' },
            { key: 'coffee', name: 'Coffee', category: 'special', description: 'Tons café chaleureux' },
            { key: 'vintage', name: 'Vintage', category: 'special', description: 'Style vintage classique' },
            { key: 'monokai', name: 'Monokai', category: 'special', description: 'Palette Monokai pour développeurs' },
            { key: 'pastel', name: 'Pastel', category: 'special', description: 'Couleurs douces et apaisantes' },
            
            // Thèmes Solarized
            { key: 'solarized-light', name: 'Solarized Light', category: 'solarized', description: 'Palette Solarized claire' },
            { key: 'solarized-dark', name: 'Solarized Dark', category: 'solarized', description: 'Palette Solarized sombre' }
        ],
        categories: [
            { key: 'all', name: 'Tous les thèmes', count: 20 },
            { key: 'base', name: 'Thèmes de base', count: 3 },
            { key: 'nature', name: 'Thèmes naturels', count: 5 },
            { key: 'creative', name: 'Thèmes créatifs', count: 4 },
            { key: 'special', name: 'Thèmes spéciaux', count: 5 },
            { key: 'solarized', name: 'Thèmes Solarized', count: 2 },
            { key: 'professional', name: 'Thèmes professionnels', count: 1 }
        ]
    }">
        <!-- Tabs -->
        <div class="border-b border-border mb-8">
            <nav class="-mb-px flex space-x-8 overflow-x-auto">
                <template x-for="category in categories" :key="category.key">
                    <button @click="activeTab = category.key" 
                            :class="activeTab === category.key ? 'border-primary text-primary' : 'border-transparent text-text-secondary hover:text-text hover:border-border'"
                            class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                        <span x-text="category.name"></span>
                        <span class="ml-1 text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full" x-text="category.count"></span>
                    </button>
                </template>
            </nav>
        </div>

        <!-- Search -->
        <div class="mb-8">
            <div class="relative max-w-md">
                <input type="text" 
                       x-model="searchQuery"
                       placeholder="Rechercher un thème..."
                       class="form-input w-full pl-10">
                <svg class="absolute left-3 top-2.5 w-4 h-4 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Themes Grid -->
        <div class="space-y-8">
            <div class="card">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-text">
                        <span x-show="activeTab === 'all'">Tous les Thèmes</span>
                        <span x-show="activeTab === 'base'">Thèmes de Base</span>
                        <span x-show="activeTab === 'nature'">Thèmes Naturels</span>
                        <span x-show="activeTab === 'creative'">Thèmes Créatifs</span>
                        <span x-show="activeTab === 'special'">Thèmes Spéciaux</span>
                        <span x-show="activeTab === 'solarized'">Thèmes Solarized</span>
                        <span x-show="activeTab === 'professional'">Thèmes Professionnels</span>
                    </h2>
                    <div class="text-sm text-text-secondary">
                        <span x-text="allThemes.filter(t => (activeTab === 'all' || t.category === activeTab) && t.name.toLowerCase().includes(searchQuery.toLowerCase())).length"></span> thèmes trouvés
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <template x-for="theme in allThemes.filter(t => (activeTab === 'all' || t.category === activeTab) && t.name.toLowerCase().includes(searchQuery.toLowerCase()))" :key="theme.key">
                        <div class="border rounded-lg p-6 cursor-pointer hover:shadow-md transition-all duration-200 bg-surface hover:scale-105"
                             :class="theme.featured ? 'ring-2 ring-primary ring-opacity-50' : ''"
                             @click="
                                 if (window.ThemeManager) {
                                     window.ThemeManager.applyTheme(theme.key);
                                 }
                             ">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-text" x-text="theme.name"></h3>
                                <div class="flex items-center space-x-2">
                                    <span x-show="theme.featured" class="px-2 py-1 text-xs font-medium bg-primary text-white rounded-full">⭐</span>
                                    <span class="px-2 py-1 text-xs font-medium bg-secondary text-white rounded-full" x-text="theme.category"></span>
                                </div>
                            </div>
                            
                            <p class="text-sm text-text-secondary mb-4" x-text="theme.description"></p>
                            
                            <!-- Color Preview -->
                            <div class="flex space-x-2 mb-4">
                                <div class="w-4 h-4 rounded-full bg-primary"></div>
                                <div class="w-4 h-4 rounded-full bg-secondary"></div>
                                <div class="w-4 h-4 rounded-full bg-success"></div>
                                <div class="w-4 h-4 rounded-full bg-danger"></div>
                            </div>
                            
                            <!-- Component Preview -->
                            <div class="space-y-2">
                                <button class="btn btn-primary btn-sm w-full">Primary</button>
                                <button class="btn btn-secondary btn-sm w-full">Secondary</button>
                                <button class="btn btn-success btn-sm w-full">Success</button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Preview Interactive -->
        <div class="mt-12">
            <div class="card">
                <h2 class="text-2xl font-bold text-text mb-6">Preview Interactive</h2>
                
                <!-- Component Showcase -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Buttons -->
                    <div>
                        <h3 class="text-lg font-semibold text-text mb-4">Boutons</h3>
                        <div class="space-y-3">
                            <button class="btn btn-primary">Primary Button</button>
                            <button class="btn btn-secondary">Secondary Button</button>
                            <button class="btn btn-success">Success Button</button>
                            <button class="btn btn-danger">Danger Button</button>
                            <button class="btn btn-warning">Warning Button</button>
                            <button class="btn btn-info">Info Button</button>
                        </div>
                    </div>

                    <!-- Form Elements -->
                    <div>
                        <h3 class="text-lg font-semibold text-text mb-4">Éléments de Formulaire</h3>
                        <div class="space-y-3">
                            <input type="text" placeholder="Input field" class="form-input w-full">
                            <select class="form-input w-full">
                                <option>Select option</option>
                            </select>
                            <div class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span class="text-sm">Checkbox</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cards -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-text mb-4">Cards</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="card">
                            <h4 class="font-semibold text-text mb-2">Card Title</h4>
                            <p class="text-text-secondary">This is a sample card with some content.</p>
                        </div>
                        <div class="card">
                            <h4 class="font-semibold text-text mb-2">Another Card</h4>
                            <p class="text-text-secondary">Another sample card with different content.</p>
                        </div>
                        <div class="card">
                            <h4 class="font-semibold text-text mb-2">Third Card</h4>
                            <p class="text-text-secondary">Yet another card for demonstration.</p>
                        </div>
                    </div>
                </div>

                <!-- Color Palette -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-text mb-4">Palette de Couleurs</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-lg bg-primary mx-auto mb-2"></div>
                            <p class="text-xs font-medium text-text">Primary</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-lg bg-secondary mx-auto mb-2"></div>
                            <p class="text-xs font-medium text-text">Secondary</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-lg bg-success mx-auto mb-2"></div>
                            <p class="text-xs font-medium text-text">Success</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-lg bg-warning mx-auto mb-2"></div>
                            <p class="text-xs font-medium text-text">Warning</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-lg bg-danger mx-auto mb-2"></div>
                            <p class="text-xs font-medium text-text">Danger</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 rounded-lg bg-info mx-auto mb-2"></div>
                            <p class="text-xs font-medium text-text">Info</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection