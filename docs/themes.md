# Système de Thèmes - LarappeUI

## Vue d'ensemble

Le système de thèmes de LarappeUI permet de personnaliser l'apparence de l'application avec différents thèmes prédéfinis et la possibilité de créer des thèmes personnalisés.

## Thèmes Disponibles

### Thèmes Prédéfinis

1. **Light** - Thème clair par défaut avec des couleurs modernes
2. **Dark** - Thème sombre élégant pour une expérience nocturne
3. **Pro (FrappeUI)** - Thème professionnel inspiré de FrappeUI
4. **Enterprise** - Thème entreprise avec des couleurs sobres et professionnelles
5. **Glass** - Effet de verre avec transparence et flou
6. **Neon** - Thème néon avec des couleurs vives et lumineuses
7. **Forest** - Thème forestier avec des tons verts naturels
8. **Sea** - Thème marin avec des bleus océaniques
9. **Sunset** - Thème coucher de soleil avec des oranges chaleureux
10. **Modern** - Thème moderne avec des couleurs vibrantes
11. **Minimal** - Thème minimaliste en noir et blanc
12. **2D** - Thème 2D avec des couleurs vives et géométriques
13. **Retro** - Thème rétro avec des couleurs des années 80
14. **Cyberpunk** - Thème cyberpunk futuriste
15. **Pastel** - Thème pastel doux et apaisant

## Structure des Fichiers

```
public/
├── css/
│   └── themes.css          # Variables CSS pour tous les thèmes
├── js/
│   └── themes-manager.js   # Gestionnaire JavaScript des thèmes
resources/
└── views/
    └── themes-manager.blade.php  # Interface de gestion des thèmes
```

## Variables CSS

Chaque thème utilise les variables CSS suivantes :

```css
:root {
    --color-primary: #3b82f6; /* Couleur principale */
    --color-secondary: #6b7280; /* Couleur secondaire */
    --color-success: #10b981; /* Couleur de succès */
    --color-warning: #f59e0b; /* Couleur d'avertissement */
    --color-danger: #ef4444; /* Couleur de danger */
    --color-info: #06b6d4; /* Couleur d'information */
    --color-background: #ffffff; /* Couleur d'arrière-plan */
    --color-surface: #f9fafb; /* Couleur de surface */
    --color-text: #111827; /* Couleur de texte */
    --color-textSecondary: #6b7280; /* Couleur de texte secondaire */
    --color-border: #e5e7eb; /* Couleur de bordure */
    --color-accent: #f59e42; /* Couleur d'accent */
}
```

## Utilisation

### Dans les Vues Blade

```html
<!-- Utiliser les classes de couleur -->
<button class="bg-primary text-white">Bouton Principal</button>
<div class="bg-success text-white">Message de succès</div>
<p class="text-danger">Message d'erreur</p>
```

### Dans JavaScript

```javascript
// Changer de thème
if (window.ThemeManager) {
    window.ThemeManager.applyTheme("dark");
}

// Obtenir le thème actuel
const currentTheme = window.ThemeManager.getCurrentTheme();

// Obtenir les couleurs d'un thème
const colors = window.ThemeManager.getThemeColors("light");
```

## Gestionnaire de Thèmes

Le fichier `themes-manager.js` contient la classe `ThemeManager` qui gère :

-   **Changement de thème** : `applyTheme(themeName)`
-   **Persistance** : Sauvegarde automatique dans localStorage
-   **Événements** : Déclenche un événement `themeChanged` lors du changement
-   **Thèmes personnalisés** : Support pour créer des thèmes personnalisés

## Interface de Gestion

L'interface de gestion des thèmes (`/themes-manager`) permet de :

1. **Prévisualiser** les thèmes sur des composants
2. **Sélectionner** un thème parmi les disponibles
3. **Personnaliser** les couleurs d'un thème
4. **Exporter** les thèmes personnalisés

## Personnalisation

### Créer un Thème Personnalisé

```javascript
const customColors = {
    primary: "#ff6b6b",
    secondary: "#4ecdc4",
    // ... autres couleurs
};

window.ThemeManager.applyCustomTheme(customColors);
```

### Ajouter un Nouveau Thème

1. Ajouter les variables CSS dans `public/css/themes.css`
2. Ajouter la configuration dans `public/js/themes-manager.js`
3. Mettre à jour l'interface dans `themes-manager.blade.php`

## Compatibilité

-   **Navigateurs** : Tous les navigateurs modernes supportant les variables CSS
-   **Laravel** : Compatible avec Laravel 12+
-   **Alpine.js** : Utilisé pour l'interactivité de l'interface

## Dépannage

### Erreurs Courantes

1. **Fichier JavaScript manquant** : Vérifier que `themes-manager.js` existe dans `public/js/`
2. **Erreur Alpine.js** : Vérifier la syntaxe JavaScript dans les expressions Alpine
3. **Thème non appliqué** : Vérifier que le fichier CSS `themes.css` est chargé

### Solutions

-   Recharger la page après modification des fichiers
-   Vérifier la console du navigateur pour les erreurs JavaScript
-   S'assurer que tous les fichiers sont bien servis par le serveur web
