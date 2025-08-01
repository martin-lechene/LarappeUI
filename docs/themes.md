# Système de Thèmes - LarappeUI

## Vue d'ensemble

Le système de thèmes de LarappeUI permet de personnaliser l'apparence de l'application avec différents thèmes prédéfinis et la possibilité de créer des thèmes personnalisés.

## Thèmes Disponibles

LarappeUI propose **20 thèmes** organisés en 6 catégories distinctes :

### 🎯 Thèmes de Base (3)

1. **Light** - Thème clair par défaut avec des couleurs modernes
2. **Dark** - Thème sombre élégant pour une expérience nocturne
3. **Pro (FrappeUI)** - Thème professionnel inspiré de FrappeUI

### 🌿 Thèmes Naturels (5)

4. **Forest** - Thème forestier avec des tons verts naturels
5. **Forest Night** - Version nocturne du thème forest
6. **Sea** - Thème marin avec des bleus océaniques
7. **Sakura** - Thème floral japonais avec des tons roses
8. **Summer** - Couleurs estivales chaleureuses

### 🎨 Thèmes Créatifs (4)

9. **Glass** - Effet de verre avec transparence
10. **2D** - Couleurs géométriques vives
11. **Retro 80s** - Style rétro années 80
12. **Space** - Thème spatial mystérieux

### ⚡ Thèmes Spécialisés (5)

13. **Minimal** - Design minimaliste épuré
14. **Coffee** - Tons café chaleureux
15. **Vintage** - Style vintage classique
16. **Monokai** - Palette Monokai pour développeurs
17. **Pastel** - Couleurs douces et apaisantes

### 🌞 Thèmes Solarized (2)

18. **Solarized Light** - Palette Solarized claire
19. **Solarized Dark** - Palette Solarized sombre

### 💼 Thèmes Professionnels (1)

20. **Pro (FrappeUI)** - Thème professionnel

> **Note** : Pour une documentation complète des thèmes étendus, consultez [extended-themes.md](extended-themes.md).

## Structure des Fichiers

```
public/
├── css/
│   ├── themes.css          # Variables CSS de base
│   ├── themes-complete.css # Thèmes complets
│   ├── themes-extended.css # Thèmes étendus
│   └── themes-all.css      # Tous les thèmes (20 thèmes)
├── js/
│   └── themes-manager.js   # Gestionnaire JavaScript des thèmes
resources/
├── css/
│   └── themes/             # Fichiers CSS individuels des thèmes
└── views/
    ├── themes-manager.blade.php    # Interface de gestion des thèmes
    └── themes-showcase.blade.php   # Showcase des thèmes
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
