# LarappeUI

Une collection de composants UI pour Laravel 12+ & TailwindCSS 4, avec un système de thèmes complet (light/dark et +) et deux pages prêtes à l’emploi: Components et Examples.

---

## Pages

- Components: aperçu live des composants par blocs (2/3 largeur) avec un onglet Aperçu/Code et, à droite, la liste des paramètres (1/3).
- Examples: exemples complets (header, hero, CTA, formulaire de contact AJAX, multi-step, table) en pleine largeur avec onglet Aperçu/Code.

## Thèmes

- Sélecteur de thème global (sidebar). Persistance via session + localStorage. Classes `theme-<name>` appliquées au `<body>`.
- Fichiers: `public/css/themes.css` et `public/js/themes-manager.js`.

## Installation (dev)

1. Composer et NPM
   ```bash
   composer install
   npm install
   ```
2. Environnement
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Lancer
   ```bash
   php artisan serve &
   npm run dev
   ```

## CI

- Workflow GitHub Actions: tests PHP 8.2 + build front Node 20.

## Objectif package

Ce dépôt est structuré pour devenir un package ré-installable dans tout projet Laravel 12. Les vues Blade des composants sont dans `resources/views/components/*`. Le système de thèmes est indépendant et peut être copié/téléversé via assets.
