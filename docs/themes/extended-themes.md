# Thèmes Étendus - LarappeUI

## Vue d'ensemble

LarappeUI propose maintenant **20 thèmes** organisés en 6 catégories distinctes pour répondre à tous les besoins de design.

## Catégories de Thèmes

### 🎯 Thèmes de Base (3)

-   **Light** - Thème clair par défaut avec des couleurs modernes
-   **Dark** - Thème sombre élégant pour une expérience nocturne
-   **Pro (FrappeUI)** - Thème professionnel inspiré de FrappeUI

### 🌿 Thèmes Naturels (5)

-   **Forest** - Tons verts naturels
-   **Forest Night** - Version nocturne du thème forest
-   **Sea** - Bleus océaniques
-   **Sakura** - Thème floral japonais avec des tons roses
-   **Summer** - Couleurs estivales chaleureuses

### 🎨 Thèmes Créatifs (4)

-   **Glass** - Effet de verre avec transparence
-   **2D** - Couleurs géométriques vives
-   **Retro 80s** - Style rétro années 80
-   **Space** - Thème spatial mystérieux

### ⚡ Thèmes Spécialisés (5)

-   **Minimal** - Design minimaliste épuré
-   **Coffee** - Tons café chaleureux
-   **Vintage** - Style vintage classique
-   **Monokai** - Palette Monokai pour développeurs
-   **Pastel** - Couleurs douces et apaisantes

### 🌞 Thèmes Solarized (2)

-   **Solarized Light** - Palette Solarized claire
-   **Solarized Dark** - Palette Solarized sombre

### 💼 Thèmes Professionnels (1)

-   **Pro (FrappeUI)** - Thème professionnel

## Utilisation

### Via JavaScript

```javascript
// Appliquer un thème
window.ThemeManager.applyTheme("forest");

// Obtenir le thème actuel
const currentTheme = window.ThemeManager.getCurrentTheme();

// Obtenir tous les thèmes
const allThemes = window.ThemeManager.getAllThemes();
```

### Via HTML

```html
<!-- Appliquer un thème directement -->
<html class="theme-forest">
    <!-- contenu -->
</html>
```

### Via PHP/Laravel

```php
// Définir le thème dans la session
session(['theme' => 'forest']);

// Dans la vue Blade
<html class="theme-{{ session('theme', 'light') }}">
```

## Variables CSS

Chaque thème définit les variables CSS suivantes :

```css
:root {
    --color-primary: #22c55e;
    --color-primary-hover: #16a34a;
    --color-secondary: #84cc16;
    --color-secondary-hover: #65a30d;
    --color-success: #16a34a;
    --color-success-hover: #15803d;
    --color-warning: #ca8a04;
    --color-warning-hover: #a16207;
    --color-danger: #dc2626;
    --color-danger-hover: #b91c1c;
    --color-info: #0891b2;
    --color-info-hover: #0e7490;
    --color-background: #f0fdf4;
    --color-surface: #ffffff;
    --color-text: #14532d;
    --color-textSecondary: #166534;
    --color-border: #bbf7d0;
    --color-accent: #a3e635;
}
```

## Classes Utilitaires

### Couleurs de fond

```html
<div class="bg-primary">Primary background</div>
<div class="bg-secondary">Secondary background</div>
<div class="bg-success">Success background</div>
<div class="bg-warning">Warning background</div>
<div class="bg-danger">Danger background</div>
<div class="bg-info">Info background</div>
```

### Couleurs de texte

```html
<span class="text-primary">Primary text</span>
<span class="text-secondary">Secondary text</span>
<span class="text-success">Success text</span>
<span class="text-warning">Warning text</span>
<span class="text-danger">Danger text</span>
<span class="text-info">Info text</span>
```

### Boutons

```html
<button class="btn btn-primary">Primary Button</button>
<button class="btn btn-secondary">Secondary Button</button>
<button class="btn btn-success">Success Button</button>
<button class="btn btn-warning">Warning Button</button>
<button class="btn btn-danger">Danger Button</button>
<button class="btn btn-info">Info Button</button>
```

## Personnalisation

### Créer un nouveau thème

1. Ajoutez les variables CSS dans `resources/css/themes-all.css` :

```css
.theme-custom {
    --color-primary: #your-color;
    --color-primary-hover: #your-hover-color;
    /* ... autres variables */
}
```

2. Ajoutez la palette dans `resources/js/themes.js` :

```javascript
{
    key: 'custom',
    name: 'Custom Theme',
    class: 'theme-custom',
    colors: {
        primary: '#your-color',
        primaryHover: '#your-hover-color',
        // ... autres couleurs
    },
    description: 'Description de votre thème'
}
```

## Compatibilité

-   ✅ Laravel 12+
-   ✅ PHP 8.3+
-   ✅ Tailwind CSS
-   ✅ Alpine.js
-   ✅ Responsive Design
-   ✅ Accessibilité (WCAG 2.1)

## Performance

-   Les thèmes sont chargés de manière optimisée
-   Utilisation de variables CSS pour une performance maximale
-   Pas de JavaScript supplémentaire requis pour le changement de thème
-   Support du localStorage pour la persistance

## Support

Pour toute question ou suggestion concernant les thèmes, consultez la documentation complète ou contactez l'équipe de développement.
