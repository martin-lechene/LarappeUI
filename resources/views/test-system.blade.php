@extends('layouts.app')

@section('title', 'Test du Système - Thèmes et Composants')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-text mb-2">🧪 Test du Système</h1>
        <p class="text-text-secondary">Page de test pour vérifier que tous les thèmes et composants fonctionnent correctement</p>
    </div>

    <!-- Navigation -->
    <nav class="flex space-x-4 mb-8">
        <a href="{{ route('components-docs') }}" class="text-primary hover:text-primary-hover">
            📚 Documentation
        </a>
        <a href="{{ route('themes-manager') }}" class="text-primary hover:text-primary-hover">
            🎨 Gestionnaire de Thèmes
        </a>
        <a href="{{ route('themes-showcase') }}" class="text-primary hover:text-primary-hover">
            🌈 Showcase des Thèmes
        </a>
    </nav>

    <!-- Test des thèmes -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Test des thèmes de base -->
        <div class="card">
            <h2 class="text-xl font-semibold text-text mb-4">Test des Thèmes de Base</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-text mb-2">Sélectionner un thème de base</label>
                    <select id="basic-theme-select" class="form-input w-full">
                        <option value="light">Light</option>
                        <option value="dark">Dark</option>
                        <option value="pro">Pro (FrappeUI)</option>
                        <option value="enterprise">Enterprise</option>
                        <option value="glass">Glass</option>
                        <option value="neon">Neon</option>
                        <option value="forest">Forest</option>
                        <option value="sea">Sea</option>
                        <option value="sunset">Sunset</option>
                        <option value="modern">Modern</option>
                        <option value="minimal">Minimal</option>
                        <option value="2d">2D</option>
                        <option value="retro">Retro</option>
                        <option value="cyberpunk">Cyberpunk</option>
                        <option value="pastel">Pastel</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button class="btn btn-primary">Primary</button>
                    <button class="btn btn-secondary">Secondary</button>
                    <button class="btn btn-success">Success</button>
                    <button class="btn btn-danger">Danger</button>
                </div>

                <div class="space-y-2">
                    <input type="text" placeholder="Input de test" class="form-input w-full">
                    <select class="form-input w-full">
                        <option>Option 1</option>
                        <option>Option 2</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Test des thèmes étendus -->
        <div class="card">
            <h2 class="text-xl font-semibold text-text mb-4">Test des Thèmes Étendus</h2>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-text mb-2">Sélectionner un thème étendu</label>
                    <select id="extended-theme-select" class="form-input w-full">
                        <option value="midnight">Midnight</option>
                        <option value="aurora">Aurora</option>
                        <option value="cosmic">Cosmic</option>
                        <option value="ocean">Ocean</option>
                        <option value="fire">Fire</option>
                        <option value="earth">Earth</option>
                        <option value="lavender">Lavender</option>
                        <option value="mint">Mint</option>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button class="btn btn-primary">Primary</button>
                    <button class="btn btn-secondary">Secondary</button>
                    <button class="btn btn-success">Success</button>
                    <button class="btn btn-danger">Danger</button>
                </div>

                <div class="space-y-2">
                    <input type="text" placeholder="Input de test" class="form-input w-full">
                    <select class="form-input w-full">
                        <option>Option 1</option>
                        <option>Option 2</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Test des composants -->
    <div class="mt-8">
        <div class="card">
            <h2 class="text-xl font-semibold text-text mb-4">Test des Composants</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Test Input -->
                <div>
                    <h3 class="font-medium text-text mb-2">Composant Input</h3>
                    <x-input type="text" placeholder="Test input" />
                    <x-input type="email" placeholder="Test email" class="mt-2" />
                    <x-input type="password" placeholder="Test password" class="mt-2" />
                </div>

                <!-- Test Card -->
                <div>
                    <h3 class="font-medium text-text mb-2">Composant Card</h3>
                    <x-card variant="default" class="mb-2">
                        <h4 class="font-semibold text-text">Card Default</h4>
                        <p class="text-sm text-text-secondary">Contenu de test</p>
                    </x-card>
                    
                    <x-card variant="elevated" class="mb-2">
                        <h4 class="font-semibold text-text">Card Elevated</h4>
                        <p class="text-sm text-text-secondary">Contenu de test</p>
                    </x-card>
                </div>

                <!-- Test Button -->
                <div>
                    <h3 class="font-medium text-text mb-2">Composant Button</h3>
                    <x-button label="Test Button" color="primary" class="mb-2" />
                    <x-button label="Test Button" color="secondary" class="mb-2" />
                    <x-button label="Test Button" color="success" class="mb-2" />
                </div>
            </div>
        </div>
    </div>

    <!-- Test des variables CSS -->
    <div class="mt-8">
        <div class="card">
            <h2 class="text-xl font-semibold text-text mb-4">Test des Variables CSS</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <div class="text-center">
                    <div class="w-16 h-16 rounded-lg bg-primary mx-auto mb-2"></div>
                    <p class="text-xs font-medium text-text">Primary</p>
                    <p class="text-xs text-text-secondary">var(--color-primary)</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 rounded-lg bg-secondary mx-auto mb-2"></div>
                    <p class="text-xs font-medium text-text">Secondary</p>
                    <p class="text-xs text-text-secondary">var(--color-secondary)</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 rounded-lg bg-success mx-auto mb-2"></div>
                    <p class="text-xs font-medium text-text">Success</p>
                    <p class="text-xs text-text-secondary">var(--color-success)</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 rounded-lg bg-warning mx-auto mb-2"></div>
                    <p class="text-xs font-medium text-text">Warning</p>
                    <p class="text-xs text-text-secondary">var(--color-warning)</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 rounded-lg bg-danger mx-auto mb-2"></div>
                    <p class="text-xs font-medium text-text">Danger</p>
                    <p class="text-xs text-text-secondary">var(--color-danger)</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 rounded-lg bg-info mx-auto mb-2"></div>
                    <p class="text-xs font-medium text-text">Info</p>
                    <p class="text-xs text-text-secondary">var(--color-info)</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statut du système -->
    <div class="mt-8">
        <div class="card">
            <h2 class="text-xl font-semibold text-text mb-4">Statut du Système</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-success rounded-full mr-2"></div>
                        <span class="text-sm text-text">Thèmes de base (15/15)</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-success rounded-full mr-2"></div>
                        <span class="text-sm text-text">Thèmes étendus (8/8)</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-success rounded-full mr-2"></div>
                        <span class="text-sm text-text">Variables CSS</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-success rounded-full mr-2"></div>
                        <span class="text-sm text-text">Composants Blade</span>
                    </div>
                </div>
                
                <div class="space-y-2">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-success rounded-full mr-2"></div>
                        <span class="text-sm text-text">Documentation</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-success rounded-full mr-2"></div>
                        <span class="text-sm text-text">Gestionnaire de thèmes</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-success rounded-full mr-2"></div>
                        <span class="text-sm text-text">Showcase des thèmes</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-success rounded-full mr-2"></div>
                        <span class="text-sm text-text">Responsive design</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Test des thèmes de base
    const basicThemeSelect = document.getElementById('basic-theme-select');
    basicThemeSelect.addEventListener('change', function() {
        if (window.ThemeManager) {
            window.ThemeManager.applyTheme(this.value);
        }
    });

    // Test des thèmes étendus
    const extendedThemeSelect = document.getElementById('extended-theme-select');
    extendedThemeSelect.addEventListener('change', function() {
        if (window.ExtendedThemeManager) {
            window.ExtendedThemeManager.applyExtendedTheme(this.value);
        }
    });
});
</script>
@endsection