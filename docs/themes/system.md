# Système de Thèmes - LarappeUI

## Vue d'ensemble

Le système de thèmes de LarappeUI permet de personnaliser l'apparence de l'application en temps réel. Il utilise un gestionnaire unifié qui synchronise les thèmes entre le client et le serveur.

## Architecture

### 1. Gestionnaire de Thèmes Unifié

Le système utilise un seul gestionnaire de thèmes (`ThemeManager`) qui :
- Applique l'attribut `theme` sur l'élément HTML
- Synchronise avec le serveur via des API REST
- Persiste les préférences en localStorage
- Gère les variables CSS personnalisées

### 2. Persistance Multi-niveaux

- **Client** : localStorage pour la persistance côté navigateur
- **Serveur** : Session Laravel pour la persistance côté serveur
- **HTML** : Attribut `theme` sur l'élément `<html>`

### 3. Thèmes Disponibles

- **Light** : Thème clair par défaut
- **Dark** : Thème sombre élégant
- **Pro** : Thème professionnel inspiré de FrappeUI
- **Enterprise** : Thème entreprise sobre
- **Glass** : Effet de verre avec transparence
- **Neon** : Thème néon avec couleurs vives
- **Forest** : Thème forestier avec tons verts
- **Sea** : Thème marin avec bleus océaniques
- **Sunset** : Thème coucher de soleil
- **Modern** : Thème moderne vibrant
- **Minimal** : Thème minimaliste noir/blanc
- **2D** : Thème 2D géométrique
- **Retro** : Thème rétro années 80
- **Cyberpunk** : Thème cyberpunk futuriste
- **Pastel** : Thème pastel doux

## Utilisation

### Application Automatique

Le thème est appliqué automatiquement au chargement de la page :

```javascript
// Le thème est chargé depuis le serveur puis localStorage
const savedTheme = localStorage.getItem('theme') || 'light';
ThemeManager.applyTheme(savedTheme);
```

### Changement de Thème

```javascript
// Changer de thème
ThemeManager.applyTheme('dark');

// Écouter les changements
document.addEventListener('themeChanged', (event) => {
    console.log('Nouveau thème:', event.detail.theme);
});
```

### Sélecteurs de Thème

Les sélecteurs de thème utilisent l'attribut `data-theme-selector` :

```html
<select data-theme-selector>
    <option value="light">Light</option>
    <option value="dark">Dark</option>
    <!-- ... -->
</select>
```

## Variables CSS

Chaque thème définit des variables CSS personnalisées :

```css
:root {
    --color-primary: #3b82f6;
    --color-secondary: #6b7280;
    --color-success: #10b981;
    --color-warning: #f59e0b;
    --color-danger: #ef4444;
    --color-info: #06b6d4;
    --color-background: #ffffff;
    --color-surface: #f9fafb;
    --color-text: #111827;
    --color-text-secondary: #6b7280;
    --color-border: #e5e7eb;
    --color-accent: #f59e42;
}
```

## API Serveur

### Endpoints

- `GET /theme/get` : Récupérer le thème actuel
- `POST /theme/set` : Définir un nouveau thème

### Exemple d'utilisation

```javascript
// Récupérer le thème
const response = await fetch('/theme/get');
const data = await response.json();
console.log('Thème actuel:', data.theme);

// Changer le thème
await fetch('/theme/set', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({ theme: 'dark' })
});
```

## Middleware

Le `ThemeMiddleware` gère automatiquement :
- L'initialisation du thème par défaut
- Le partage du thème avec toutes les vues
- La persistance en session

## Thèmes Personnalisés

Il est possible de créer des thèmes personnalisés :

```javascript
// Créer un thème personnalisé
const customColors = {
    primary: '#ff0000',
    background: '#ffffff',
    text: '#000000'
};

// Appliquer temporairement
ThemeManager.applyCustomTheme(customColors);
```

## Compatibilité

Le système est compatible avec :
- Tous les navigateurs modernes
- Les variables CSS personnalisées
- Les sessions Laravel
- Le localStorage

## Dépannage

### Problèmes Courants

1. **Thème ne s'applique pas** : Vérifier que le fichier `themes-manager.js` est chargé
2. **Persistance ne fonctionne pas** : Vérifier les permissions de localStorage
3. **Synchronisation serveur échoue** : Vérifier le token CSRF

### Debug

```javascript
// Vérifier le thème actuel
console.log('Thème actuel:', ThemeManager.getCurrentTheme());

// Lister tous les thèmes
console.log('Thèmes disponibles:', ThemeManager.getAllThemes());

// Vérifier les variables CSS
console.log('Variables CSS:', getComputedStyle(document.documentElement));
``` 