# Système de Thèmes - LarappeUI

## Vue d'ensemble

Le système de thèmes de LarappeUI permet de personnaliser l'apparence de l'application avec différents thèmes prédéfinis et la possibilité de créer des thèmes personnalisés.

LarappeUI propose **34 thèmes** (classes CSS) organisés en catégories.

## Thèmes Disponibles

### 🎯 Thèmes de Base (3)

| Classe CSS | Nom | Description |
|-----------|-----|-------------|
| `theme-light` | Light | Thème clair par défaut avec des couleurs modernes |
| `theme-dark` | Dark | Thème sombre élégant pour une expérience nocturne |
| `theme-pro` | Pro (FrappeUI) | Thème professionnel inspiré de FrappeUI |

### 🌿 Thèmes Naturels (7)

| Classe CSS | Nom | Description |
|-----------|-----|-------------|
| `theme-forest` | Forest | Tons verts naturels |
| `theme-forest-night` | Forest Night | Version nocturne du thème forest |
| `theme-sea` | Sea | Bleus océaniques |
| `theme-sakura` | Sakura | Thème floral japonais avec des tons roses |
| `theme-summer` | Summer | Couleurs estivales chaleureuses |
| `theme-summer-dark` | Summer Dark | Version sombre du thème Summer |
| `theme-ocean` | Ocean | Tons bleu-cyan océan |
| `theme-ocean-dark` | Ocean Dark | Version sombre du thème Ocean |
| `theme-winter` | Winter | Tons bleus glacials hivernaux |
| `theme-winter-dark` | Winter Dark | Version sombre du thème Winter |

### 🎨 Thèmes Créatifs (7)

| Classe CSS | Nom | Description |
|-----------|-----|-------------|
| `theme-glass` | Glass | Effet de verre avec transparence |
| `theme-glass-dark` | Glass Dark | Version sombre du thème Glass |
| `theme-2d` | 2D | Couleurs géométriques vives |
| `theme-2d-dark` | 2D Dark | Version sombre du thème 2D |
| `theme-retro80s` | Retro 80s | Style rétro années 80 |
| `theme-retro` | Retro | Tons orange et turquoise rétro |
| `theme-space` | Space | Thème spatial mystérieux |
| `theme-neon` | Neon | Couleurs néon fluo sur fond sombre |
| `theme-sunset` | Sunset | Dégradés orangés coucher de soleil |

### ⚡ Thèmes Spécialisés (8)

| Classe CSS | Nom | Description |
|-----------|-----|-------------|
| `theme-minimal` | Minimal | Design minimaliste épuré |
| `theme-coffee` | Coffee | Tons café chaleureux |
| `theme-vintage` | Vintage | Style vintage classique |
| `theme-monokai` | Monokai | Palette Monokai pour développeurs |
| `theme-pastel` | Pastel | Couleurs douces et apaisantes |
| `theme-cyberpunk` | Cyberpunk | Neons cyan/magenta sur fond noir |
| `theme-enterprise` | Enterprise | Tons bleu marine professionnels |
| `theme-modern` | Modern | Violet moderne et épuré |
| `theme-oldschool` | Oldschool | Style sombre classique |
| `theme-oldschool-dark` | Oldschool Dark | Version sombre Oldschool |

### 🌞 Thèmes Solarized (2)

| Classe CSS | Nom | Description |
|-----------|-----|-------------|
| `theme-solarized-light` | Solarized Light | Palette Solarized claire |
| `theme-solarized-dark` | Solarized Dark | Palette Solarized sombre |

## Structure des Fichiers

```
public/
├── css/
│   └── themes.css          # Toutes les variables CSS des thèmes
├── js/
│   └── themes-manager.js   # Gestionnaire JavaScript des thèmes
```

## Variables CSS

Chaque thème définit les variables CSS suivantes :

```css
.theme-<nom> {
    --color-primary: #3b82f6;       /* Couleur principale */
    --color-secondary: #6b7280;     /* Couleur secondaire */
    --color-success: #10b981;       /* Succès */
    --color-warning: #f59e0b;       /* Avertissement */
    --color-danger: #ef4444;        /* Danger/erreur */
    --color-info: #06b6d4;          /* Information */
    --color-background: #ffffff;    /* Arrière-plan de page */
    --color-surface: #f9fafb;       /* Arrière-plan de surface (cartes…) */
    --color-text: #111827;          /* Texte principal */
    --color-textSecondary: #6b7280; /* Texte secondaire */
    --color-border: #e5e7eb;        /* Bordures */
    --color-accent: #f59e42;        /* Accentuation */
}
```

## Utilisation

### Dans les vues Blade

```html
<button class="bg-primary text-white">Bouton Principal</button>
<div class="bg-success text-white">Message de succès</div>
<p class="text-danger">Message d'erreur</p>
```

### Via JavaScript

```javascript
// Changer de thème
window.ThemeManager.applyTheme('dark');

// Obtenir le thème actuel
const current = window.ThemeManager.getCurrentTheme();

// Obtenir tous les thèmes disponibles
const allThemes = window.ThemeManager.getAllThemes();
```

### Via l'API Laravel

```php
// Enregistrer le thème en session
POST /theme/set  →  { theme: 'dark' }

// Lire le thème courant
GET  /theme/get
```

## Gestionnaire de Thèmes

Le fichier `themes-manager.js` gère :
- **Changement de thème** : `applyTheme(themeName)`
- **Persistance** : Sauvegarde automatique dans `localStorage` et session Laravel
- **Événements** : Déclenche `themeChanged` lors du changement
- **Thèmes personnalisés** : Support via `applyCustomTheme(colors)`

## Personnalisation

### Créer un thème personnalisé

1. Ajouter les variables dans `public/css/themes.css` :

```css
.theme-moncustom {
    --color-primary: #ff6b6b;
    --color-secondary: #4ecdc4;
    --color-success: #45b7d1;
    --color-warning: #f7dc6f;
    --color-danger: #e74c3c;
    --color-info: #3498db;
    --color-background: #fafafa;
    --color-surface: #ffffff;
    --color-text: #2c3e50;
    --color-textSecondary: #7f8c8d;
    --color-border: #ecf0f1;
    --color-accent: #9b59b6;
}
```

2. Enregistrer dans `themes-manager.js` :

```javascript
// Dans la section this.themes = { ... }
moncustom: {
    primary: '#ff6b6b',
    secondary: '#4ecdc4',
    // ...
}
```

## Compatibilité

- **Navigateurs** : Tous les navigateurs modernes supportant les variables CSS
- **Laravel** : Compatible Laravel 12+
- **Alpine.js** : Utilisé pour l'interactivité du sélecteur de thème

> Pour plus de détails sur la création de thèmes, consultez [themes/new-themes.md](themes/new-themes.md).
