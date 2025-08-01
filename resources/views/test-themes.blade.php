@extends('layouts.app')

@section('title', 'Test du Système de Thèmes - LarappeUI')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-text mb-8">🧪 Test du Système de Thèmes</h1>

    <!-- Sélecteur de thème -->
    <div class="mb-8 p-6 bg-surface rounded-lg border border-border">
        <h2 class="text-xl font-semibold text-text mb-4">Sélecteur de Thème</h2>
        <select x-model="currentTheme"
                @change="
                    if (window.ThemeManager) {
                        window.ThemeManager.applyTheme(currentTheme);
                    }
                "
                data-theme-selector
                class="w-full px-4 py-2 border border-border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent bg-surface text-text">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
            <option value="pro">Pro (FrappeUI)</option>
            <option value="enterprise">Enterprise</option>
            <option value="glass">Glass</option>
            <option value="neon">Neon</option>
            <option value="forest">Forest</option>
            <option value="forest-night">Forest Night</option>
            <option value="sea">Sea</option>
            <option value="sakura">Sakura</option>
            <option value="summer">Summer</option>
            <option value="sunset">Sunset</option>
            <option value="modern">Modern</option>
            <option value="minimal">Minimal</option>
            <option value="2d">2D</option>
            <option value="retro">Retro</option>
            <option value="retro80s">Retro 80s</option>
            <option value="cyberpunk">Cyberpunk</option>
            <option value="pastel">Pastel</option>
            <option value="space">Space</option>
            <option value="coffee">Coffee</option>
            <option value="vintage">Vintage</option>
            <option value="monokai">Monokai</option>
            <option value="solarized-light">Solarized Light</option>
            <option value="solarized-dark">Solarized Dark</option>
        </select>
    </div>

    <!-- Tests visuels -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Boutons -->
        <div class="p-6 bg-surface rounded-lg border border-border">
            <h3 class="text-lg font-semibold text-text mb-4">Boutons</h3>
            <div class="space-y-3">
                <button class="btn btn-primary px-4 py-2 rounded-lg">Primary</button>
                <button class="btn btn-secondary px-4 py-2 rounded-lg">Secondary</button>
                <button class="btn btn-success px-4 py-2 rounded-lg">Success</button>
                <button class="btn btn-warning px-4 py-2 rounded-lg">Warning</button>
                <button class="btn btn-danger px-4 py-2 rounded-lg">Danger</button>
                <button class="btn btn-info px-4 py-2 rounded-lg">Info</button>
            </div>
        </div>

        <!-- Formulaires -->
        <div class="p-6 bg-surface rounded-lg border border-border">
            <h3 class="text-lg font-semibold text-text mb-4">Formulaires</h3>
            <div class="space-y-3">
                <input type="text" placeholder="Champ de saisie" class="form-input w-full px-3 py-2 rounded-lg">
                <select class="form-input w-full px-3 py-2 rounded-lg">
                    <option>Sélectionner une option</option>
                </select>
                <div class="flex items-center">
                    <input type="checkbox" class="mr-2">
                    <span class="text-text">Case à cocher</span>
                </div>
            </div>
        </div>

        <!-- Couleurs de texte -->
        <div class="p-6 bg-surface rounded-lg border border-border">
            <h3 class="text-lg font-semibold text-text mb-4">Couleurs de Texte</h3>
            <div class="space-y-2">
                <p class="text-primary">Texte primaire</p>
                <p class="text-secondary">Texte secondaire</p>
                <p class="text-success">Texte succès</p>
                <p class="text-warning">Texte avertissement</p>
                <p class="text-danger">Texte danger</p>
                <p class="text-info">Texte info</p>
            </div>
        </div>

        <!-- Cartes -->
        <div class="p-6 bg-surface rounded-lg border border-border">
            <h3 class="text-lg font-semibold text-text mb-4">Cartes</h3>
            <div class="space-y-3">
                <div class="card">
                    <h4 class="text-lg font-semibold text-text mb-2">Carte de base</h4>
                    <p class="text-text-secondary">Contenu de la carte avec du texte secondaire.</p>
                </div>
                <div class="card bg-primary text-white">
                    <h4 class="text-lg font-semibold mb-2">Carte primaire</h4>
                    <p>Contenu de la carte avec fond primaire.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Résultats des tests -->
    <div class="mt-8 p-6 bg-surface rounded-lg border border-border">
        <h2 class="text-xl font-semibold text-text mb-4">Résultats des Tests</h2>
        <div class="space-y-2">
            <template x-for="result in testResults" :key="result.name">
                <div class="flex items-center justify-between p-3 rounded-lg"
                     :class="result.status === 'pass' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'">
                    <span x-text="result.name"></span>
                    <span x-text="result.status === 'pass' ? '✓' : '✗'"></span>
                </div>
            </template>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Tests automatiques
    document.addEventListener('alpine:init', () => {
        Alpine.data('testResults', () => []);

        // Fonction pour exécuter les tests
        window.runTests = function() {
            const results = [];

            // Test 1: Vérifier que le sélecteur de thème fonctionne
            const themeSelector = document.querySelector('[data-theme-selector]');
            if (themeSelector) {
                results.push({ name: 'Sélecteur de thème disponible', status: 'pass' });
            } else {
                results.push({ name: 'Sélecteur de thème manquant', status: 'fail' });
            }

            // Test 2: Vérifier que les classes CSS sont appliquées
            const body = document.body;
            if (body.classList.contains('bg-background')) {
                results.push({ name: 'Classes CSS appliquées', status: 'pass' });
            } else {
                results.push({ name: 'Classes CSS non appliquées', status: 'fail' });
            }

            // Test 3: Vérifier que ThemeManager est disponible
            if (window.ThemeManager) {
                results.push({ name: 'ThemeManager disponible', status: 'pass' });
            } else {
                results.push({ name: 'ThemeManager non disponible', status: 'fail' });
            }

            // Mettre à jour les résultats
            Alpine.store('testResults', results);
        };

        // Exécuter les tests après un délai
        setTimeout(() => {
            runTests();
        }, 1000);
    });
</script>
@endpush
