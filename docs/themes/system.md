# Système de Thèmes LarappeUI

## Vue d'ensemble

LarappeUI intègre un système de thèmes avancé permettant de changer l'apparence globale de l'interface en temps réel. Le système utilise des variables CSS personnalisées et un gestionnaire JavaScript pour une expérience utilisateur fluide.

## Architecture

### Fichiers principaux

- `resources/js/themes-manager.js` - Gestionnaire JavaScript principal
- `resources/css/themes-complete.css` - Styles CSS pour tous les thèmes
- `resources/views/layouts/app.blade.php` - Layout principal avec intégration des thèmes
- `resources/views/themes-manager.blade.php` - Interface de gestion des thèmes

### Structure des thèmes

Chaque thème est défini avec :
- **key** : Identifiant unique du thème
- **name** : Nom affiché dans l'interface
- **class** : Classe CSS appliquée à l'élément `<html>`
- **colors** : Objet contenant toutes les variables de couleur
- **description** : Description du thème

## Thèmes disponibles

### Thèmes de base
- **Light** : Thème clair par défaut avec des couleurs modernes
- **Dark** : Thème sombre élégant pour une expérience nocturne
- **Pro (FrappeUI)** : Thème professionnel inspiré de FrappeUI
- **Enterprise** : Thème entreprise avec des couleurs sobres

### Thèmes créatifs
- **Glass** : Effet de verre avec transparence et flou
- **Neon** : Thème néon avec des couleurs vives et lumineuses
- **Cyberpunk** : Thème cyberpunk futuriste

### Thèmes naturels
- **Forest** : Thème forestier avec des tons verts naturels
- **Sea** : Thème marin avec des bleus océaniques
- **Sunset** : Thème coucher de soleil avec des oranges chaleureux

### Thèmes modernes
- **Modern** : Thème moderne avec des couleurs vibrantes
- **Minimal** : Thème minimaliste en noir et blanc
- **2D** : Thème 2D avec des couleurs vives et géométriques
- **Retro** : Thème rétro avec des couleurs des années 80
- **Pastel** : Thème pastel doux et apaisant

## Variables CSS

Chaque thème définit les variables CSS suivantes :

```css
--color-primary: #3b82f6;
--color-primary-hover: #2563eb;
--color-secondary: #6b7280;
--color-secondary-hover: #4b5563;
--color-success: #10b981;
--color-success-hover: #059669;
--color-warning: #f59e0b;
--color-warning-hover: #d97706;
--color-danger: #ef4444;
--color-danger-hover: #dc2626;
--color-info: #06b6d4;
--color-info-hover: #0891b2;
--color-background: #ffffff;
--color-surface: #f9fafb;
--color-text: #111827;
--color-textSecondary: #6b7280;
--color-border: #e5e7eb;
--color-accent: #f59e42;
```

## Utilisation

### Changement de thème via l'interface

1. Utilisez le sélecteur de thème dans la navigation
2. Le thème est automatiquement appliqué et sauvegardé
3. La persistance est gérée via localStorage

### Changement programmatique

```javascript
// Appliquer un thème
window.ThemeManager.applyTheme('dark');

// Obtenir le thème actuel
const currentTheme = window.ThemeManager.getCurrentTheme();

// Obtenir les informations d'un thème
const themeInfo = window.ThemeManager.getTheme('pro');
```

### Écouter les changements de thème

```javascript
document.addEventListener('themeChanged', (event) => {
  console.log('Thème changé:', event.detail.theme);
  console.log('Données du thème:', event.detail.themeData);
});
```

## Classes utilitaires

### Couleurs de fond
- `.bg-primary` - Fond couleur primaire
- `.bg-secondary` - Fond couleur secondaire
- `.bg-success` - Fond couleur succès
- `.bg-warning` - Fond couleur avertissement
- `.bg-danger` - Fond couleur danger
- `.bg-info` - Fond couleur info
- `.bg-background` - Fond principal
- `.bg-surface` - Fond surface

### Couleurs de texte
- `.text-primary` - Texte couleur primaire
- `.text-secondary` - Texte couleur secondaire
- `.text-success` - Texte couleur succès
- `.text-warning` - Texte couleur avertissement
- `.text-danger` - Texte couleur danger
- `.text-info` - Texte couleur info
- `.text-text` - Texte principal
- `.text-textSecondary` - Texte secondaire

### Bordures
- `.border-primary` - Bordure couleur primaire
- `.border-secondary` - Bordure couleur secondaire
- `.border-success` - Bordure couleur succès
- `.border-warning` - Bordure couleur avertissement
- `.border-danger` - Bordure couleur danger
- `.border-info` - Bordure couleur info
- `.border-border` - Bordure par défaut

### Boutons
- `.btn-primary` - Bouton primaire
- `.btn-secondary` - Bouton secondaire
- `.btn-success` - Bouton succès
- `.btn-warning` - Bouton avertissement
- `.btn-danger` - Bouton danger
- `.btn-info` - Bouton info

### Formulaires
- `.form-input` - Champ de saisie stylisé

## Effets spéciaux

### Thème Glass
- Effet de flou (backdrop-filter)
- Transparence sur les éléments

### Thème Neon
- Ombres lumineuses sur les boutons
- Animation de pulsation

### Thème Cyberpunk
- Ombres colorées intenses
- Effets de lueur sur le texte

## Création d'un nouveau thème

### 1. Ajouter le thème dans themes-manager.js

```javascript
{
  key: 'mon-theme',
  name: 'Mon Thème',
  class: 'theme-mon-theme',
  colors: {
    primary: '#7c3aed',
    secondary: '#6b7280',
    // ... autres couleurs
  },
  description: 'Description de mon thème'
}
```

### 2. Ajouter les styles CSS

```css
.theme-mon-theme {
  --color-primary: #7c3aed;
  --color-primary-hover: #6d28d9;
  /* ... autres variables */
}
```

### 3. Ajouter au sélecteur

Dans `resources/views/layouts/app.blade.php` :

```html
<option value="mon-theme">Mon Thème</option>
```

## Persistance

Le système utilise localStorage pour sauvegarder le thème sélectionné :

- **Clé** : `theme`
- **Valeur** : Clé du thème (ex: `dark`, `pro`, etc.)
- **Fallback** : `light` si aucun thème n'est sauvegardé

## Performance

- Les transitions sont optimisées pour une expérience fluide
- Les variables CSS sont appliquées directement au DOM
- Pas de rechargement de page lors du changement de thème

## Accessibilité

- Support des préférences de réduction de mouvement
- Contraste approprié pour tous les thèmes
- Focus visible sur tous les éléments interactifs

## Compatibilité

- Support complet des navigateurs modernes
- Fallback gracieux pour les navigateurs plus anciens
- Compatible avec Tailwind CSS
- Intégration Alpine.js pour la réactivité

## Dépannage

### Le thème ne change pas
1. Vérifiez que `themes-manager.js` est chargé
2. Vérifiez la console pour les erreurs JavaScript
3. Vérifiez que les classes CSS sont bien appliquées

### Les couleurs ne s'appliquent pas
1. Vérifiez que `themes-complete.css` est chargé
2. Vérifiez que les variables CSS sont définies
3. Vérifiez que les classes utilitaires sont utilisées

### Problème de persistance
1. Vérifiez que localStorage est disponible
2. Vérifiez la clé `theme` dans localStorage
3. Vérifiez que le thème par défaut est défini 