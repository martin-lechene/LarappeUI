@extends('layouts.app')

@section('title', 'Showcase des Thèmes - 23 Thèmes')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-text mb-2">🎨 Showcase des Thèmes</h1>
        <p class="text-text-secondary">Découvrez nos 23 thèmes disponibles avec des exemples interactifs</p>
        <div class="flex items-center space-x-4 mt-4">
            <span class="px-3 py-1 bg-primary text-white text-sm font-medium rounded-full">23 Thèmes</span>
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
        activeTab: 'basic',
        searchQuery: '',
        basicThemes: [
            { key: 'light', name: 'Light', category: 'base', description: 'Thème clair par défaut' },
            { key: 'dark', name: 'Dark', category: 'base', description: 'Thème sombre élégant' },
            { key: 'pro', name: 'Pro (FrappeUI)', category: 'professional', description: 'Thème professionnel' },
            { key: 'enterprise', name: 'Enterprise', category: 'professional', description: 'Thème entreprise' },
            { key: 'glass', name: 'Glass', category: 'creative', description: 'Effet de verre avec transparence' },
            { key: 'neon', name: 'Neon', category: 'creative', description: 'Couleurs vives et lumineuses' },
            { key: 'forest', name: 'Forest', category: 'nature', description: 'Tons verts naturels' },
            { key: 'sea', name: 'Sea', category: 'nature', description: 'Bleus océaniques' },
            { key: 'sunset', name: 'Sunset', category: 'nature', description: 'Oranges chaleureux' },
            { key: 'modern', name: 'Modern', category: 'modern', description: 'Couleurs vibrantes' },
            { key: 'minimal', name: 'Minimal', category: 'modern', description: 'Noir et blanc' },
            { key: '2d', name: '2D', category: 'special', description: 'Couleurs géométriques' },
            { key: 'retro', name: 'Retro', category: 'special', description: 'Années 80' },
            { key: 'cyberpunk', name: 'Cyberpunk', category: 'special', description: 'Futuriste' },
            { key: 'pastel', name: 'Pastel', category: 'special', description: 'Doux et apaisant' }
        ],
        extendedThemes: [
            { key: 'midnight', name: 'Midnight', category: 'dark', description: 'Thème nocturne mystérieux' },
            { key: 'aurora', name: 'Aurora', category: 'nature', description: 'Aurores boréales' },
            { key: 'cosmic', name: 'Cosmic', category: 'special', description: 'Galactique mystique' },
            { key: 'ocean', name: 'Ocean', category: 'nature', description: 'Bleus profonds' },
            { key: 'fire', name: 'Fire', category: 'special', description: 'Flamboyant ardent' },
            { key: 'earth', name: 'Earth', category: 'nature', description: 'Terreux chaleureux' },
            { key: 'lavender', name: 'Lavender', category: 'soft', description: 'Violet délicat' },
            { key: 'mint', name: 'Mint', category: 'soft', description: 'Vert rafraîchissant' }
        ]
    }">
        <!-- Tabs -->
        <div class="border-b border-border mb-8">
            <nav class="-mb-px flex space-x-8">
                <button @click="activeTab = 'basic'" 
                        :class="activeTab === 'basic' ? 'border-primary text-primary' : 'border-transparent text-text-secondary hover:text-text hover:border-border'"
                        class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                    Thèmes de Base (15)
                </button>
                <button @click="activeTab = 'extended'" 
                        :class="activeTab === 'extended' ? 'border-primary text-primary' : 'border-transparent text-text-secondary hover:text-text hover:border-border'"
                        class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                    Thèmes Étendus (8)
                </button>
                <button @click="activeTab = 'preview'" 
                        :class="activeTab === 'preview' ? 'border-primary text-primary' : 'border-transparent text-text-secondary hover:text-text hover:border-border'"
                        class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                    Preview Interactive
                </button>
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

        <!-- Basic Themes Tab -->
        <div x-show="activeTab === 'basic'" class="space-y-8">
            <div class="card">
                <h2 class="text-2xl font-bold text-text mb-6">Thèmes de Base</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="theme in basicThemes.filter(t => t.name.toLowerCase().includes(searchQuery.toLowerCase()))" :key="theme.key">
                        <div class="border rounded-lg p-6 cursor-pointer hover:shadow-md transition-shadow bg-surface"
                             @click="
                                 if (window.ThemeManager) {
                                     window.ThemeManager.applyTheme(theme.key);
                                 }
                             ">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-text" x-text="theme.name"></h3>
                                <span class="px-2 py-1 text-xs font-medium bg-primary text-white rounded-full" x-text="theme.category"></span>
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

        <!-- Extended Themes Tab -->
        <div x-show="activeTab === 'extended'" class="space-y-8">
            <div class="card">
                <h2 class="text-2xl font-bold text-text mb-6">Thèmes Étendus</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="theme in extendedThemes.filter(t => t.name.toLowerCase().includes(searchQuery.toLowerCase()))" :key="theme.key">
                        <div class="border rounded-lg p-6 cursor-pointer hover:shadow-md transition-shadow bg-surface"
                             @click="
                                 if (window.ExtendedThemeManager) {
                                     window.ExtendedThemeManager.applyExtendedTheme(theme.key);
                                 }
                             ">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold text-text" x-text="theme.name"></h3>
                                <span class="px-2 py-1 text-xs font-medium bg-purple-500 text-white rounded-full" x-text="theme.category"></span>
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

        <!-- Preview Tab -->
        <div x-show="activeTab === 'preview'" class="space-y-8">
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