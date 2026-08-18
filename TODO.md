# LarappeUI - TODO

## 🔴 Critiques

### Sécurité
- [ ] **`.env` commité avec `APP_KEY`** — La clé de chiffrement est exposée dans l'historique git. Nettoyer l'historique avec `git filter-branch` ou BFG, régénérer la clé.
- [ ] **Routes `/theme/set` et `/theme/get` sans middleware `theme`** — La session peut ne pas être initialisée quand le controller lit/écrit le thème (`routes/web.php:33-34`).
- [ ] **Pas de `@csrf` dans le composant `<x-form>`** — Les formulaires POST utilisant ce composant n'ont pas de protection CSRF automatique (`resources/views/components/form/form.blade.php:28-33`).
- [ ] **`larastan/larastan": "*"` en wildcard** — Version non pinée dans `composer.json:15`, risque de pull majeur inattendu.

### Thèmes & CSS
- [ ] **Désync des variables CSS entre 3 systèmes** — `app.css` attend `var(--primary)`, `themes.css` définit `var(--color-primary)`, et les fichiers `themes/*.css` définissent `var(--primary)`. Le ThemeManager JS génère `--color-*` mais `app.css` attend le préfixe absent. Les styles ne s'appliquent pas au runtime.
- [ ] **`public/js/themes-manager.js` désynchronisé du source** — Contient 8 thèmes supplémentaires (`glass-dark`, `2d-dark`, `oldschool`, `ocean`, `winter`, etc.) absents de `resources/js/themes-manager.js` et de `themes.css`. De plus, le thème `2d` et `summer` sont définis en double dans le fichier public.
- [ ] **`themes.css` manque des thèmes dans les groupes de sélecteurs** — Les classes `.bg-gray-100`, `.bg-red-600`, `.bg-green-600`, `.text-gray-900`, `.text-gray-600`, `.border-gray-300`, `.bg-white` omettent les thèmes `forest-night`, `sakura`, `retro80s`, `pastel`, `space`, `coffee`, `vintage`, `monokai`, `solarized-dark`.
- [ ] **Thèmes `public/js/themes-manager.js` sans propriété `accent`** — `2d`, `2d-dark`, `oldschool`, `oldschool-dark`, `ocean`, `ocean-dark`, `winter`, `winter-dark` n'ont pas de couleur `accent`.
- [ ] **Supprimer `tailwind.config.js` obsolète** — Plugins v3 (`@tailwindcss/forms`, `@tailwindcss/typography`, `@tailwindcss/aspect-ratio`) non installés, incompatibles avec TailwindCSS v4. Tout le fichier est du code mort.

### Composants
- [ ] **Double initialisation de `ThemeManager`** — Deux instances créées quand `document.readyState === 'loading'` (`resources/js/themes-manager.js:508-518`).
- [ ] **`select-async` ignore la prop `endpoint`** — L'appel simulé avec `setTimeout` ne jamais l'endpoint déclaré (`resources/views/components/extra/select-async.blade.php:17-23`).
- [ ] **`dropzone` ne traite pas les fichiers déposés** — L'événement `drop` met `over=false` mais ne traite jamais les fichiers (`resources/views/components/extra/dropzone.blade.php:2`).
- [ ] **Catch vide dans `examples.blade.php`** — `catch (_) {}` absorbe silencieusement les erreurs (`resources/views/examples.blade.php:309`).

## 🟡 Moyens

### Documentation manquante
- [ ] Documenter les composants layout : `docs/components/layout.md`
- [ ] Documenter les composants feedback : `docs/components/feedback.md`
- [ ] Documenter les composants data : `docs/components/data.md`
- [ ] Documenter les composants navigation : `docs/components/navigation.md`
- [ ] Documenter les composants media : `docs/components/media.md`
- [ ] Documenter les composants charts : `docs/components/charts.md`
- [ ] Créer `docs/faq.md`
- [ ] Créer `docs/contribution.md` (ou rediriger vers `CONTRIBUTING.md` racine)
- [ ] Créer `docs/changelog.md` (ou rediriger vers `CHANGELOG.md` racine)
- [ ] Corriger les routes obsolètes dans `docs/themes/README.md:113-115` (`/themes-showcase`, `/test-themes`, `/themes-manager`)

### Accessibilité (a11y)
- [ ] Ajouter `alt` sur les `<img>` dans `components/extra/gallery.blade.php:5,9`
- [ ] Ajouter `role="menu"` + `role="menuitem"` sur `components/extra/context-menu.blade.php:3-6`
- [ ] Ajouter `aria-label` sur les boutons prev/next de `components/extra/pagination-compact.blade.php:3,6`
- [ ] Ajouter `aria-label` sur les boutons de suppression de tag dans `select-tags.blade.php:7,10` et `tag-input.blade.php:7,10`
- [ ] Ajouter `aria-label` sur le `<select>` de `components/extra/phone-input.blade.php:3`
- [ ] Ajouter `aria-label` sur les inputs OTP dans `components/extra/otp-input.blade.php:4`
- [ ] Ajouter `aria-label` par étoile dans `components/extra/rating.blade.php:4`
- [ ] Ajouter `aria-label` sur l'input de recherche dans `components/extra/command-palette.blade.php:6`
- [ ] Ajouter `aria-label="Fermer"` sur le bouton dismiss de `components/extra/alert.blade.php:18`
- [ ] Ajouter `role="dialog"` + `aria-modal` sur `components/extra/confirm-dialog.blade.php:3`
- [ ] Ajouter `role="tab"` sur les boutons de `components/extra/vertical-tabs.blade.php:5` et `segmented-tabs.blade.php:4`
- [ ] Ajouter `role="option"` sur les items de `components/extra/combobox-virtual.blade.php:6` et `select-async.blade.php:6`
- [ ] Ajouter `aria-label` sur les boutons pagination de `data-table.blade.php:38-39` et `data-table-pro.blade.php:60-61`
- [ ] Ajouter `role="status"` ou `role="alert"` sur `components/extra/snackbar.blade.php:2`
- [ ] Ajouter `aria-label` sur l'input file de `components/extra/dropzone.blade.php:4`
- [ ] Ajouter `aria-label` sur les `<nav>` de `mega-menu.blade.php:1`, `breadcrumbs-overflow.blade.php:1`, `table-of-contents.blade.php:2`
- [ ] Ajouter `<caption>` sur les `<table>` de `data-table.blade.php:8` et `data-table-pro.blade.php:28`

### Tests
- [ ] Ajouter des tests JavaScript pour `ThemeManager` (519 lignes, 0 couverture)
- [ ] Ajouter des tests unitaires pour les composants Blade (validation des props, rendu)
- [ ] Ajouter des tests frontend (comportement Alpine.js, formulaires interactifs)
- [ ] Revoir `tests/Unit/ExampleTest.php` — supprimer le test placeholder (`assertTrue(true)`)

### Infra & CI
- [ ] Synchroniser les branches avec les mises à jour de sécurité distantes (Laravel, Vite, PHPUnit)
- [ ] Mettre à jour la CI pour supporter PHP 8.3+ (`phpstan.neon` inclut `bootstrap/cache/*` qu'il faut exclure)
- [ ] Revoir la config PHPStan — `paths: vendor/*` analyse tout le dossier vendor, ce qui est inhabituel

### Dépendances
- [ ] Remplacer Prism.js CDN par une installation locale (bundle Vite) — `layouts/app.blade.php:20-22`
- [ ] Remplacer marked.js CDN par une installation locale — `components/extra/markdown-editor.blade.php:7`
- [ ] Supprimer l'import `bootstrap.js` / `window.axios` si axios n'est jamais utilisé (`resources/js/app.js:1`)
- [ ] Déplacer `concurrently` en devDependencies si ce n'est pas déjà fait

## 🟢 Petits correctifs

### Code quality
- [ ] Supprimer les `console.log` / `console.warn` dans `resources/js/themes-manager.js` (lignes 375, 404, 423, 450)
- [ ] Ajouter les types de retour manquants : `ThemeController::setTheme()`, `ThemeController::getTheme()`, `ContactController::store()` → `JsonResponse`
- [ ] Ajouter le type de retour de `ThemeMiddleware::handle()` → `Response`
- [ ] Réduire ou justifier les 13 `!important` restants dans `resources/css/app.css`
- [ ] Utiliser ou supprimer `@stack('styles')` dans le layout (`layouts/app.blade.php:24`, défini mais jamais utilisé)
- [ ] Aligner `.env` avec `.env.example` (SQLite recommandé, `SESSION_ENCRYPT=true`)

### Duplication de code
- [ ] Synchroniser `public/js/themes-manager.js` avec `resources/js/themes-manager.js` (ou supprimer le public et builder avec Vite)
- [ ] Dé-dupliquer les règles CSS dans `themes.css` — `.bg-white` (lignes 1217-1330 dupliquées 1498-1612) et `.text-gray-900` (lignes 872-985 dupliquées 1656-1769)
- [ ] Extraire la logique commune entre `data-table.blade.php` et `data-table-pro.blade.php` (fonctions JS quasi identiques)
- [ ] Extraire la logique commune entre `select-async.blade.php` et `combobox-virtual.blade.php` (pattern de filtrage similaire)

### Composants
- [ ] Ajouter `@props` sur les composants extra sans déclaration : `coachmarks`, `context-menu`, `snackbar`, `mega-menu`, `split-pane`, `breadcrumbs-overflow`
- [ ] Corriger le formulaire `examples.blade.php:120` — pas de `@csrf` pour la soumission AJAX (vérifier que les headers Axios sont bien définis)
- [ ] Remplacer `disabled` sur `<form>` (attribut non standard) par la désactivation des inputs enfants (`components/form/form.blade.php:28-33`)
- [ ] Corriger le composant `combobox-virtual` et `select-async` — la fonction JS est définie après `x-data`, risque d'erreur si le script échoue

### Infra
- [ ] Supprimer les routes obsolètes référencées dans `docs/themes/README.md` (`/themes-showcase`, `/test-themes`, `/themes-manager`)
- [ ] Nettoyer le fichier `public/js/` — ne garder que les artefacts de build Vite
