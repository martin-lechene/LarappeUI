@extends('layouts.app')

@section('title', 'Showcase des Thèmes - 20 Thèmes')

@section('content')
<div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="mb-2 text-3xl font-bold text-text">🎨 Showcase des Thèmes</h1>
        <p class="text-text-secondary">Découvrez nos 20 thèmes disponibles avec des exemples interactifs</p>
        <div class="flex items-center mt-4 space-x-4">
            <span class="px-3 py-1 text-sm font-medium text-white rounded-full bg-primary">20 Thèmes</span>
            <span class="px-3 py-1 text-sm font-medium text-white rounded-full bg-success">100% Fonctionnels</span>
            <span class="px-3 py-1 text-sm font-medium text-white rounded-full bg-info">Responsive</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex mb-8 space-x-4">
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
            { key: 'enterprise', name: 'Enterprise', category: 'professional', description: 'Thème entreprise' },
            { key: 'modern', name: 'Modern', category: 'professional', description: 'Thème moderne' },

            // Thèmes naturels
            { key: 'forest', name: 'Forest', category: 'nature', description: 'Tons verts naturels' },
            { key: 'forest-night', name: 'Forest Night', category: 'nature', description: 'Version nocturne du thème forest' },
            { key: 'sea', name: 'Sea', category: 'nature', description: 'Bleus océaniques' },
            { key: 'sakura', name: 'Sakura', category: 'nature', description: 'Thème floral japonais' },
            { key: 'summer', name: 'Summer', category: 'nature', description: 'Couleurs estivales chaleureuses' },
            { key: 'sunset', name: 'Sunset', category: 'nature', description: 'Couleurs du coucher de soleil' },

            // Thèmes créatifs
            { key: 'glass', name: 'Glass', category: 'creative', description: 'Effet de verre avec transparence' },
            { key: '2d', name: '2D', category: 'creative', description: 'Couleurs géométriques vives' },
            { key: 'retro', name: 'Retro', category: 'creative', description: 'Style rétro classique' },
            { key: 'retro80s', name: 'Retro 80s', category: 'creative', description: 'Style rétro années 80' },
            { key: 'space', name: 'Space', category: 'creative', description: 'Thème spatial mystérieux' },
            { key: 'neon', name: 'Neon', category: 'creative', description: 'Couleurs néon vibrantes' },
            { key: 'cyberpunk', name: 'Cyberpunk', category: 'creative', description: 'Thème cyberpunk futuriste' },

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
            { key: 'all', name: 'Tous les thèmes', count: 25 },
            { key: 'base', name: 'Thèmes de base', count: 3 },
            { key: 'nature', name: 'Thèmes naturels', count: 6 },
            { key: 'creative', name: 'Thèmes créatifs', count: 7 },
            { key: 'special', name: 'Thèmes spéciaux', count: 5 },
            { key: 'solarized', name: 'Thèmes Solarized', count: 2 },
            { key: 'professional', name: 'Thèmes professionnels', count: 2 }
        ]
    }">
        <!-- Tabs -->
        <div class="mb-8 border-b border-border">
            <nav class="flex overflow-x-auto -mb-px space-x-8">
                <template x-for="category in categories" :key="category.key">
                    <button @click="activeTab = category.key"
                            :class="activeTab === category.key ? 'border-primary text-primary' : 'border-transparent text-text-secondary hover:text-text hover:border-border'"
                            class="px-1 py-2 text-sm font-medium whitespace-nowrap border-b-2">
                        <span x-text="category.name"></span>
                        <span class="px-2 py-0.5 ml-1 text-xs text-gray-600 bg-gray-100 rounded-full" x-text="category.count"></span>
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
                       class="pl-10 w-full form-input">
                <svg class="absolute top-2.5 left-3 w-4 h-4 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Themes Grid -->
        <div class="space-y-8">
            <div class="card">
                <div class="flex justify-between items-center mb-6">
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

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <template x-for="theme in allThemes.filter(t => (activeTab === 'all' || t.category === activeTab) && t.name.toLowerCase().includes(searchQuery.toLowerCase()))" :key="theme.key">
                        <div class="p-6 rounded-lg border transition-all duration-200 cursor-pointer hover:shadow-md bg-surface hover:scale-105"
                             :class="theme.featured ? 'ring-2 ring-primary ring-opacity-50' : ''"
                             @click="
                                 if (window.ThemeManager) {
                                     window.ThemeManager.applyTheme(theme.key);
                                 }
                             ">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-text" x-text="theme.name"></h3>
                                <div class="flex items-center space-x-2">
                                    <span x-show="theme.featured" class="px-2 py-1 text-xs font-medium text-white rounded-full bg-primary">⭐</span>
                                    <span class="px-2 py-1 text-xs font-medium text-white rounded-full bg-secondary" x-text="theme.category"></span>
                                </div>
                            </div>

                            <p class="mb-4 text-sm text-text-secondary" x-text="theme.description"></p>

                            <!-- Color Preview -->
                            <div class="flex mb-4 space-x-2">
                                <div class="w-4 h-4 rounded-full bg-primary"></div>
                                <div class="w-4 h-4 rounded-full bg-secondary"></div>
                                <div class="w-4 h-4 rounded-full bg-success"></div>
                                <div class="w-4 h-4 rounded-full bg-danger"></div>
                            </div>

                            <!-- Component Preview -->
                            <div class="space-y-2">
                                <button class="w-full btn btn-primary btn-sm">Primary</button>
                                <button class="w-full btn btn-secondary btn-sm">Secondary</button>
                                <button class="w-full btn btn-success btn-sm">Success</button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Preview Interactive -->
        <div class="mt-12">
            <div class="card">
                <h2 class="mb-6 text-2xl font-bold text-text">Preview Interactive</h2>

                <!-- Component Showcase -->
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                    <!-- Buttons -->
                    <div>
                        <h3 class="mb-4 text-lg font-semibold text-text">Boutons</h3>
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
                        <h3 class="mb-4 text-lg font-semibold text-text">Éléments de Formulaire</h3>
                        <div class="space-y-3">
                            <input type="text" placeholder="Input field" class="w-full form-input">
                            <select class="w-full form-input">
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
                    <h3 class="mb-4 text-lg font-semibold text-text">Cards</h3>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div class="card">
                            <h4 class="mb-2 font-semibold text-text">Card Title</h4>
                            <p class="text-text-secondary">This is a sample card with some content.</p>
                        </div>
                        <div class="card">
                            <h4 class="mb-2 font-semibold text-text">Another Card</h4>
                            <p class="text-text-secondary">Another sample card with different content.</p>
                        </div>
                        <div class="card">
                            <h4 class="mb-2 font-semibold text-text">Third Card</h4>
                            <p class="text-text-secondary">Yet another card for demonstration.</p>
                        </div>
                    </div>
                </div>

                <!-- Color Palette -->
                <div class="mt-8">
                    <h3 class="mb-4 text-lg font-semibold text-text">Palette de Couleurs</h3>
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-4 lg:grid-cols-6">
                        <div class="text-center">
                            <div class="mx-auto mb-2 w-16 h-16 rounded-lg bg-primary"></div>
                            <p class="text-xs font-medium text-text">Primary</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto mb-2 w-16 h-16 rounded-lg bg-secondary"></div>
                            <p class="text-xs font-medium text-text">Secondary</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto mb-2 w-16 h-16 rounded-lg bg-success"></div>
                            <p class="text-xs font-medium text-text">Success</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto mb-2 w-16 h-16 rounded-lg bg-warning"></div>
                            <p class="text-xs font-medium text-text">Warning</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto mb-2 w-16 h-16 rounded-lg bg-danger"></div>
                            <p class="text-xs font-medium text-text">Danger</p>
                        </div>
                        <div class="text-center">
                            <div class="mx-auto mb-2 w-16 h-16 rounded-lg bg-info"></div>
                            <p class="text-xs font-medium text-text">Info</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
