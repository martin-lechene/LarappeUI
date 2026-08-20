# Changelog

Toutes les modifications notables de LarappeUI seront documentées dans ce fichier.

Le format est basé sur [Keep a Changelog](https://keepachangelog.com/).

## [Unreleased]

### Sécurité
- `<x-form.form>` injecte automatiquement le jeton CSRF dès que la méthode n'est pas `GET`, et émet `_method` pour `PUT`/`PATCH`/`DELETE`
- Routes `/theme/set` et `/theme/get` déplacées sous le middleware `theme` (session garantie initialisée)
- `larastan/larastan` pinée en `^3.10` (était en wildcard `*`)
- Correction des 3 vulnérabilités npm remontées par `npm audit`, dont `shell-quote` (critique)
- Nouveau job CI `security-audit` : `composer audit` + `npm audit --audit-level=high`
- Ajout du middleware `SecurityHeaders` (X-Content-Type-Options, X-Frame-Options, X-XSS-Protection, Referrer-Policy, Permissions-Policy)
- Rate limiting sur la route `/contact` (5 requêtes/minute)
- `SESSION_ENCRYPT=true` dans `.env.example`

### Ajouté
- Générateur de thèmes `scripts/build-themes.mjs` (`npm run themes:build` / `themes:check`) : `resources/css/themes.css` est désormais produit depuis `resources/js/themes.js`
- `config/themes.php` + `App\Support\ThemeRegistry` : liste des thèmes exposée à PHP
- Composants Alpine partagés (`resources/js/alpine/`) : filtrage, tableaux de données, dropzone
- Tests JS avec Vitest + jsdom (`npm test`, 25 tests) couvrant `ThemeManager` et les composants Alpine
- Tests de rendu de **tous** les composants Blade et de leurs attributs d'accessibilité
- `tests/Feature/ThemeConsistencyTest.php` : échoue si PHP, JS et CSS divergent
- Documentation : `docs/faq.md`, `docs/contribution.md`, `docs/changelog.md`
- CI : vérification de la synchronisation des thèmes et exécution des tests JS
- Alpine.js 3.14.3 intégré dans le build Vite (plus de CDN)
- 6 thèmes manquants créés : enterprise, neon, retro, cyberpunk, sunset, modern
- Font loading optimisé avec `preconnect` Google Fonts
- `prefers-reduced-motion` pour l'accessibilité
- ESLint + Prettier pour le JavaScript
- PHPStan/Larastan pour l'analyse statique PHP
- Tests : ThemeController, ContactController, ThemeMiddleware
- CI enrichie : Pint + PHPStan + ESLint + Prettier
- Docker healthcheck

### Accessibilité
- Modal : `role="dialog"`, `aria-modal`, `aria-labelledby`, `Escape` pour fermer, `@click.outside`
- Tabs : `role="tablist/tab/tabpanel"`, `aria-selected`, navigation clavier (flèches, Home, End)
- Dropdown : Alpine.js toggle (plus de `group-hover`), `role="menu/menuitem"`, `aria-label`, `Escape`
- Drawer : `role="dialog"`, `aria-modal`, `aria-labelledby`, `Escape`
- Collapse : `aria-expanded`, `aria-controls`, `role="region"`, syntaxe Alpine corrigée
- Pagination : `aria-current="page"`, `aria-label` sur tous les boutons
- Form Input : `aria-describedby` liant helpText/error, `aria-invalid`, `role="alert"` sur erreurs

### Changé
- Thèmes : source unique (`resources/js/themes.js`) ; `resources/css/themes.css` passe de 9 105 à 1 572 lignes, sans énumération par thème ni doublon
- Prism.js et marked.js installés via npm et inclus dans le bundle (plus aucun CDN runtime)
- `resources/js/bootstrap.js` et la dépendance `axios` supprimés (inutilisés)
- `tailwind.config.js` (v3, plugins non installés) supprimé au profit du bloc `@theme` de Tailwind v4
- `public/css/themes.css` et `public/js/themes-manager.js` supprimés : les feuilles passent par `@vite`
- Sélecteur de thème de la barre latérale : liste les 25 thèmes réels au lieu d'un couple base + toggle Dark
- `!important` de `app.css` : 13 → 4, limités au bloc `prefers-reduced-motion`
- `phpstan.neon` réécrit (`paths` / `excludePaths` / extension Larastan) ; projet reformaté avec Pint
- Layout : suppression du CDN Tailwind (300KB+ runtime), utilisation du build Vite
- Tailwind config : `primary`, `surface`, `success` mappés sur CSS variables du thème
- CSS : suppression des 60+ `!important` abusifs et des overrides trop larges
- Thèmes : la liste sidebar affiche tous les thèmes disponibles (plus de filtre hardcodé)

### Corrigé
- `routes/web.php` référençait `Illuminate\Support\RateLimiting\Limit`, classe inexistante : toute requête passant par le rate limiter renvoyait une erreur 500
- Variables CSS désynchronisées : chaque thème expose désormais la palette `--color-*` **et** les alias sémantiques attendus par `app.css`, sur `.theme-<nom>` comme sur `[theme='<nom>']`
- `ThemeManager` n'était instancié qu'une fois (deux instances étaient créées quand le document était encore en chargement)
- `select-async` interroge réellement l'`endpoint` fourni (la recherche était simulée par un `setTimeout`)
- `dropzone` traite les fichiers déposés (l'évènement `drop` les ignorait)
- `data-table-pro` notifie les actions groupées via le snackbar au lieu d'un `alert()` bloquant
- `disabled` sur `<form>` (attribut invalide) remplacé par un `<fieldset disabled>`
- Réponse non-JSON du formulaire de contact : message explicite au lieu d'un `catch` vide
- Accessibilité : `alt`, `aria-label`, `role` et `<caption>` ajoutés sur 17 composants
- Bug `solarized-light.css` : sélecteur `[theme="solarized"]` → `[theme="solarized-light"]`
- Thèmes CSS/JS synchronisés (25 thèmes dans les deux)
- CI : `chmod 775` au lieu de `777`

## [1.0.0] - 2025-01-01

### Ajouté
- Version initiale
- 25+ thèmes
- 90+ composants Blade
- Système de thèmes avec session + localStorage
- Pages Components et Examples
- Docker multi-stage
- GitHub Actions CI
