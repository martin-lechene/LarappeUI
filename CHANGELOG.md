# Changelog

Toutes les modifications notables de LarappeUI seront documentées dans ce fichier.

Le format est basé sur [Keep a Changelog](https://keepachangelog.com/).

## [Unreleased]

### Sécurité
- Ajout du middleware `SecurityHeaders` (X-Content-Type-Options, X-Frame-Options, X-XSS-Protection, Referrer-Policy, Permissions-Policy)
- Rate limiting sur la route `/contact` (5 requêtes/minute)
- `SESSION_ENCRYPT=true` dans `.env.example`

### Ajouté
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
- Layout : suppression du CDN Tailwind (300KB+ runtime), utilisation du build Vite
- Tailwind config : `primary`, `surface`, `success` mappés sur CSS variables du thème
- CSS : suppression des 60+ `!important` abusifs et des overrides trop larges
- Thèmes : la liste sidebar affiche tous les thèmes disponibles (plus de filtre hardcodé)

### Corrigé
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
