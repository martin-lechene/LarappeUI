# LarappeUI

Une collection complète de composants UI pour **Laravel 12+** & **TailwindCSS 4**, offrant un système de thèmes avancé (clair/sombre & 25+ thèmes custom) et deux pages prêtes à l'emploi : **Components** et **Examples**.

---

## Fonctionnalités principales

- Système de thèmes global (clair, sombre, 25+ custom) avec persistance (`session` et `localStorage`)
- Aperçu live des composants avec switch "Aperçu/Code" et liste de paramètres ajustables
- 90+ composants Blade organisés par catégorie
- Exemples UI réels : header, hero, CTA, formulaire AJAX, étapes, tables, etc.
- CI GitHub Actions : Pint + PHPStan + ESLint + Prettier + PHPUnit
- Docker multi-stage avec healthcheck

## Stack technique

| Technologie | Version |
|---|---|
| Laravel | 12.x |
| PHP | >= 8.2 |
| TailwindCSS | 4.x |
| Alpine.js | 3.14.3 |
| Vite | 7.x |
| PHPUnit | 12.x |

## Installation (développement)

1. Dépendances
   ```bash
   composer install
   npm install
   ```
2. Préparer l'environnement
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Lancer le projet
   ```bash
   composer dev
   ```

## Linting & Analyse

```bash
# PHP
composer pint          # Code style (Laravel Pint)
composer analyse       # Static analysis (PHPStan/Larastan)

# JavaScript
npm run lint           # ESLint
npm run format:check   # Prettier
npm run lint:fix       # ESLint auto-fix
npm run format         # Prettier auto-format
```

## Tests

```bash
composer test
```

## Docker

```bash
docker compose up --build
# Accessible sur http://localhost:8555
```

## Composants

### Formulaires
`input`, `select`, `checkbox`, `switch`, `radio`, `textarea`, `slider`, `upload`, `texteditor`, `autocomplete`, `combobox`, `mentions`, `form`, `formcontrol`

### Données
`pagination`, `statistic`, `stepper`, `timeline`, `descriptions`

### Navigation
`sidebar`, `breadcrumbs`, `anchor`, `affix`

### Feedback
`badge`, `empty`, `progress`, `spinner`

### Mise en page
`card`, `collapse`, `divider`, `drawer`, `popover`, `tooltip`

### Média
`avatar`, `image`

### Avancés
`modal`, `tabs`, `dropdown`, `data-table`, `data-table-pro`, `command-palette`, `kanban`, `gallery`, `heatmap`, `tree-view`, `markdown-editor`, `snackbar`, `toast`, `skeleton`, et 30+ autres.

## Thèmes

25+ thèmes disponibles : light, dark, pro, enterprise, glass, neon, forest, forest-night, sea, sakura, summer, sunset, modern, minimal, 2d, retro, retro80s, cyberpunk, pastel, space, coffee, vintage, monokai, solarized-light, solarized-dark.

Le sélecteur de thèmes est disponible dans la sidebar. Les thèmes sont persistés en session côté serveur et en `localStorage` côté client.

## Structure

```
resources/
├── css/
│   ├── app.css              # Entry point CSS (Tailwind + styles de base)
│   ├── themes.css           # GÉNÉRÉ (npm run themes:build)
│   └── themes/              # Partiels sources : utilitaires + surcharges
├── js/
│   ├── app.js               # Entry point JS (Alpine, Prism, marked)
│   ├── themes.js            # Palettes des thèmes — source de vérité
│   ├── themes-manager.js    # Application du thème au runtime
│   └── alpine/              # Composants Alpine (tableaux, combobox, dropzone)
└── views/
    ├── layouts/app.blade.php
    ├── components.blade.php
    ├── examples.blade.php
    └── components/           # 90+ composants Blade
config/themes.php            # Liste des thèmes exposée à PHP
scripts/build-themes.mjs     # Générateur de resources/css/themes.css
tests/js/                    # Tests Vitest
```

## Contribuer

Voir [CONTRIBUTING.md](CONTRIBUTING.md).

## License

MIT
