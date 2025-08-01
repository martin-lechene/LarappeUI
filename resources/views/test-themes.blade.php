<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test du Système de Thèmes - LarappeUI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/themes-complete.css') }}">
    <script src="{{ asset('js/themes-manager.js') }}"></script>
</head>
<body class="h-full bg-background text-text" x-data="{
    currentTheme: 'light',
    testResults: []
}" x-init="
    const savedTheme = localStorage.getItem('theme') || 'light';
    currentTheme = savedTheme;
    if (window.ThemeManager) {
        window.ThemeManager.applyTheme(currentTheme);
    }

    // Tests automatiques
    setTimeout(() => {
        runTests();
    }, 1000);
">
    <div class="min-h-screen p-8">
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

                <!-- Couleurs de fond -->
                <div class="p-6 bg-surface rounded-lg border border-border">
                    <h3 class="text-lg font-semibold text-text mb-4">Couleurs de Fond</h3>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="bg-primary text-white p-3 rounded text-center text-sm">Primary</div>
                        <div class="bg-secondary text-white p-3 rounded text-center text-sm">Secondary</div>
                        <div class="bg-success text-white p-3 rounded text-center text-sm">Success</div>
                        <div class="bg-warning text-white p-3 rounded text-center text-sm">Warning</div>
                        <div class="bg-danger text-white p-3 rounded text-center text-sm">Danger</div>
                        <div class="bg-info text-white p-3 rounded text-center text-sm">Info</div>
                    </div>
                </div>
            </div>

            <!-- Tests automatiques -->
            <div class="mt-8 p-6 bg-surface rounded-lg border border-border">
                <h3 class="text-lg font-semibold text-text mb-4">Tests Automatiques</h3>
                <div class="space-y-2">
                    <template x-for="result in testResults" :key="result.test">
                        <div class="flex items-center space-x-2">
                            <span x-text="result.passed ? '✅' : '❌'" class="text-lg"></span>
                            <span x-text="result.test" class="text-text"></span>
                            <span x-text="result.message" class="text-textSecondary text-sm"></span>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Informations de débogage -->
            <div class="mt-8 p-6 bg-surface rounded-lg border border-border">
                <h3 class="text-lg font-semibold text-text mb-4">Informations de Débogage</h3>
                <div class="space-y-2 text-sm">
                    <p><strong>Thème actuel:</strong> <span x-text="currentTheme"></span></p>
                    <p><strong>localStorage theme:</strong> <span x-text="localStorage.getItem('theme') || 'non défini'"></span></p>
                    <p><strong>ThemeManager disponible:</strong> <span x-text="window.ThemeManager ? 'Oui' : 'Non'"></span></p>
                    <p><strong>Classes HTML:</strong> <span x-text="document.documentElement.className"></span></p>
                    <p><strong>Variables CSS primaires:</strong> <span x-text="getComputedStyle(document.documentElement).getPropertyValue('--color-primary')"></span></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function runTests() {
            const results = [];

            // Test 1: ThemeManager disponible
            results.push({
                test: 'ThemeManager disponible',
                passed: !!window.ThemeManager,
                message: window.ThemeManager ? 'OK' : 'ThemeManager non trouvé'
            });

            // Test 2: Thème appliqué
            const currentTheme = localStorage.getItem('theme') || 'light';
            const htmlClasses = document.documentElement.className;
            results.push({
                test: 'Thème appliqué',
                passed: htmlClasses.includes(`theme-${currentTheme}`),
                message: `Classe attendue: theme-${currentTheme}, Classes actuelles: ${htmlClasses}`
            });

            // Test 3: Variables CSS définies
            const primaryColor = getComputedStyle(document.documentElement).getPropertyValue('--color-primary');
            results.push({
                test: 'Variables CSS définies',
                passed: primaryColor && primaryColor.trim() !== '',
                message: `Couleur primaire: ${primaryColor}`
            });

            // Test 4: localStorage fonctionne
            results.push({
                test: 'localStorage fonctionne',
                passed: typeof localStorage !== 'undefined',
                message: 'localStorage disponible'
            });

            // Test 5: Sélecteur fonctionne
            const selector = document.querySelector('[data-theme-selector]');
            results.push({
                test: 'Sélecteur présent',
                passed: !!selector,
                message: selector ? 'Sélecteur trouvé' : 'Sélecteur non trouvé'
            });

            // Mettre à jour les résultats
            Alpine.store('testResults', results);
            document.querySelector('[x-data]').__x.$data.testResults = results;
        }

        // Écouter les changements de thème
        document.addEventListener('themeChanged', (event) => {
            console.log('Thème changé:', event.detail);
            setTimeout(runTests, 100);
        });
    </script>
</body>
</html>
