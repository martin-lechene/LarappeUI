# Documentation des Thèmes - LarappeUI

## Vue d'ensemble

LarappeUI propose un système de thèmes complet avec **25 thèmes** disponibles, organisés en 6 catégories pour répondre à tous les besoins d'interface utilisateur.

## 📚 Documentation

### [Système de Thèmes](system.md)

Documentation complète du système de thèmes, incluant l'architecture, l'API et les bonnes pratiques.

### [Nouveaux Thèmes](new-themes.md)

Guide détaillé des nouveaux thèmes ajoutés au système, avec descriptions et exemples d'utilisation.

### [Thèmes Étendus](extended-themes.md)

Documentation des fonctionnalités avancées et des thèmes personnalisés.

### [Corrections et Améliorations](corrections.md)

Historique des corrections et améliorations apportées au système de thèmes.

## 🎨 Thèmes Disponibles

### Thèmes de Base (3)

-   **Light** : Thème clair par défaut
-   **Dark** : Thème sombre élégant
-   **Pro** : Thème professionnel inspiré de FrappeUI

### Thèmes Naturels (6)

-   **Forest** : Tons verts naturels
-   **Forest Night** : Version nocturne du thème forest
-   **Sea** : Bleus océaniques
-   **Sakura** : Thème floral japonais
-   **Summer** : Couleurs estivales chaleureuses
-   **Sunset** : Couleurs du coucher de soleil

### Thèmes Créatifs (7)

-   **Glass** : Effet de verre avec transparence
-   **2D** : Couleurs géométriques vives
-   **Retro** : Style rétro classique
-   **Retro 80s** : Style rétro années 80
-   **Space** : Thème spatial mystérieux
-   **Neon** : Couleurs néon vibrantes
-   **Cyberpunk** : Thème cyberpunk futuriste

### Thèmes Spéciaux (5)

-   **Minimal** : Design minimaliste épuré
-   **Coffee** : Tons café chaleureux
-   **Vintage** : Style vintage classique
-   **Monokai** : Palette Monokai pour développeurs
-   **Pastel** : Couleurs douces et apaisantes

### Thèmes Solarized (2)

-   **Solarized Light** : Palette Solarized claire
-   **Solarized Dark** : Palette Solarized sombre

### Thèmes Professionnels (2)

-   **Enterprise** : Thème entreprise sobre
-   **Modern** : Thème moderne vibrant

## 🚀 Utilisation Rapide

### Application d'un thème

```javascript
// Changer de thème
ThemeManager.applyTheme("forest-night");
```

### Sélecteur HTML

```html
<select data-theme-selector>
    <option value="light">Light</option>
    <option value="dark">Dark</option>
    <!-- ... tous les thèmes -->
</select>
```

### Variables CSS

```css
.theme-forest-night {
    --color-primary: #10b981;
    --color-background: #0f172a;
    --color-surface: #1e293b;
    --color-text: #f1f5f9;
}
```

## 🔧 Fonctionnalités

-   ✅ **25 thèmes** prêts à l'emploi
-   ✅ **Changement en temps réel** sans rechargement
-   ✅ **Persistance** côté client et serveur
-   ✅ **API REST** pour la synchronisation
-   ✅ **Thèmes personnalisés** supportés
-   ✅ **Accessibilité** optimisée
-   ✅ **Responsive** design
-   ✅ **Documentation** complète

## 📖 Pages de Test

-   **Showcase** : `/themes-showcase` - Aperçu de tous les thèmes
-   **Test** : `/test-themes` - Tests individuels des thèmes
-   **Gestionnaire** : `/themes-manager` - Interface de gestion

## 🤝 Contribution

Pour ajouter de nouveaux thèmes :

1. Définir les variables CSS dans `public/css/themes.css`
2. Ajouter la configuration dans `public/js/themes-manager.js`
3. Mettre à jour les interfaces utilisateur
4. Documenter dans `docs/themes/new-themes.md`

## 📝 Notes de Version

### Version 2.0 (Actuelle)

-   ✅ Ajout de 10 nouveaux thèmes
-   ✅ Mise à jour complète du système CSS
-   ✅ Documentation étendue
-   ✅ Interface utilisateur améliorée

### Version 1.0

-   ✅ Système de thèmes de base
-   ✅ 15 thèmes initiaux
-   ✅ Gestionnaire JavaScript
-   ✅ API serveur

## 🔗 Liens Utiles

-   [Système de Thèmes](system.md)
-   [Nouveaux Thèmes](new-themes.md)
-   [Thèmes Étendus](extended-themes.md)
-   [Corrections](corrections.md)
