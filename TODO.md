# LarappeUI - TODO

> **Point de situation (20 août 2026).** Tous les items listés ci-dessous ont été traités
> sur la branche `chore/todo-cleanup`. Les cases restent visibles pour tracer ce qui a été
> fait et comment. La seule action restant à la main d'un développeur est signalée dans
> [À faire côté poste de développement](#à-faire-côté-poste-de-développement).

## 🔴 Critiques

### Sécurité

- [x] **`.env` commité avec `APP_KEY`** — Vérification faite : le fichier n'est ni suivi
      (`git ls-files`) ni présent dans l'historique (`git log --all -- .env`). Seul
      `.env.example` est versionné et `.env` figure dans `.gitignore`. **Aucun nettoyage
      d'historique nécessaire.**
- [x] **Routes `/theme/set` et `/theme/get` sans middleware `theme`** — déplacées dans le
      groupe `Route::middleware(['theme'])` (`routes/web.php`).
- [x] **Pas de `@csrf` dans le composant `<x-form>`** — jeton injecté automatiquement dès
      que la méthode n'est pas `GET`, avec spoofing `PUT`/`PATCH`/`DELETE` via `@method`.
      Surchargeable par `:csrf="false"`. Couvert par `ComponentRenderTest`.
- [x] **`larastan/larastan": "*"` en wildcard** — pinée en `^3.10` ; `composer.lock`
      régénéré.
- [x] **Bonus — `routes/web.php` référençait `Illuminate\Support\RateLimiting\Limit`**,
      classe inexistante : toute requête passant par le rate limiter levait une erreur 500
      (5 tests en échec sur `main`). Corrigé en `Illuminate\Cache\RateLimiting\Limit`,
      limite désormais appliquée par IP.

### Thèmes & CSS

- [x] **Désync des variables CSS entre 3 systèmes** — un seul pipeline désormais :
      `resources/js/themes.js` (palettes) → `scripts/build-themes.mjs` →
      `resources/css/themes.css`. Chaque thème émet la palette `--color-*` **et** les
      alias sémantiques (`--primary`, `--background`, `--tooltip-bg`…) attendus par
      `app.css`, sur `.theme-<nom>` comme sur `[theme='<nom>']`.
- [x] **`public/js/themes-manager.js` désynchronisé du source** — fichier mort (référencé
      par aucune vue) : supprimé, ainsi que `public/css/themes.css`. Les feuilles passent
      toutes par `@vite`.
- [x] **`themes.css` manque des thèmes dans les groupes de sélecteurs** — les 8 700 lignes
      d'énumérations `.theme-x .utilitaire` (25 copies identiques par règle) sont
      remplacées par une règle unique par utilitaire, valable pour tous les thèmes. Plus
      aucun thème ne peut être oublié. Fichier : 9 105 → 1 572 lignes.
- [x] **Thèmes `public/js/themes-manager.js` sans propriété `accent`** — sans objet après
      suppression du fichier ; un test vérifie que chaque palette déclare `accent` et les
      mêmes clés.
- [x] **Supprimer `tailwind.config.js` obsolète** — supprimé. Les couleurs sémantiques
      (`bg-primary`, `text-success`, `border-primary`…) sont désormais déclarées via le
      bloc `@theme` de Tailwind v4 dans `app.css`, et pointent sur les variables de thème.

### Composants

- [x] **Double initialisation de `ThemeManager`** — une seule instance, quel que soit
      l'état du document (test dédié).
- [x] **`select-async` ignore la prop `endpoint`** — l'endpoint est réellement appelé
      (`?q=`), avec état de chargement et remontée d'erreur.
- [x] **`dropzone` ne traite pas les fichiers déposés** — les fichiers déposés alimentent
      l'input (via `DataTransfer`), sont listés et retirables.
- [x] **Catch vide dans `examples.blade.php`** — le corps de réponse est lu en texte puis
      décodé ; un JSON invalide produit un message explicite au lieu d'être avalé.

## 🟡 Moyens

### Documentation manquante

- [x] Documenter les composants layout : `docs/components/layout.md` *(déjà présent, 181 lignes)*
- [x] Documenter les composants feedback : `docs/components/feedback.md` *(déjà présent, 230 lignes)*
- [x] Documenter les composants data : `docs/components/data.md` *(déjà présent, 269 lignes)*
- [x] Documenter les composants navigation : `docs/components/navigation.md` *(déjà présent, 276 lignes)*
- [x] Documenter les composants media : `docs/components/media.md` *(déjà présent, 90 lignes)*
- [x] Documenter les composants charts : `docs/components/charts.md` *(déjà présent, 68 lignes)*
- [x] Créer `docs/faq.md`
- [x] Créer `docs/contribution.md` — guide dédié aux composants (props, Alpine, a11y, tests)
- [x] Créer `docs/changelog.md` — redirige vers le `CHANGELOG.md` racine
- [x] Corriger les routes obsolètes dans `docs/themes/README.md` — ainsi que
      `docs/themes.md`, `docs/themes/new-themes.md`, `docs/themes/extended-themes.md` et
      la structure décrite dans `README.md`. `docs/themes/corrections.md` est conservé
      comme historique, avec un avertissement en tête.

### Accessibilité (a11y)

- [x] `alt` sur les `<img>` de `gallery` (les entrées acceptent `['src' => …, 'alt' => …]`)
- [x] `role="menu"` + `role="menuitem"` sur `context-menu`
- [x] `aria-label` sur les boutons prev/next de `pagination-compact`
- [x] `aria-label` sur les boutons de suppression de tag (`select-tags`, `tag-input`)
- [x] `aria-label` sur le `<select>` de `phone-input`
- [x] `aria-label` sur les inputs OTP (`Chiffre n sur N`)
- [x] `aria-label` par étoile dans `rating` (+ `aria-pressed`)
- [x] `aria-label` sur l'input de recherche de `command-palette`
- [x] `aria-label="Fermer"` sur le bouton dismiss de `alert`
- [x] `role="dialog"` + `aria-modal` sur `confirm-dialog`
- [x] `role="tab"` sur `vertical-tabs` et `segmented-tabs` (+ `tablist`, `tabpanel`)
- [x] `role="option"` sur `combobox-virtual` et `select-async` (+ `listbox`, `combobox`)
- [x] `aria-label` sur les boutons de pagination de `data-table` et `data-table-pro`
- [x] `role="status"` sur `snackbar` (et `role="alert"` sur les alertes d'erreur)
- [x] `aria-label` sur l'input file de `dropzone`
- [x] `aria-label` sur les `<nav>` de `mega-menu`, `breadcrumbs-overflow`, `table-of-contents`
- [x] `<caption>` sur les `<table>` de `data-table` et `data-table-pro` (+ `scope`, `aria-sort`)

> Ces garanties sont figées par `tests/Feature/Components/ComponentRenderTest.php` : une
> régression d'accessibilité fait échouer la suite.

### Tests

- [x] Tests JavaScript pour `ThemeManager` — Vitest + jsdom, 25 tests
      (`tests/js/`) : instance unique, application du thème, fallback `localStorage`,
      évènement `themeChanged`, thème personnalisé.
- [x] Tests unitaires pour les composants Blade — **chaque** composant est rendu avec ses
      props par défaut, plus les assertions d'accessibilité et de CSRF.
- [x] Tests frontend (comportement Alpine) — filtrage, `select-async`, data-tables,
      dropzone.
- [x] Revoir `tests/Unit/ExampleTest.php` — placeholder supprimé, remplacé par
      `tests/Unit/ThemeRegistryTest.php`.

**Bilan : 15 tests PHP → 139 (211 assertions), plus 25 tests JS.**

### Infra & CI

- [x] Synchroniser les mises à jour de sécurité — `npm audit` remontait 3 vulnérabilités
      (dont `shell-quote`, critique) : **0 restante**. `composer audit` est clean. Un job
      CI `security-audit` exécute désormais les deux à chaque PR.
- [x] Mettre à jour la CI — `phpstan.neon` était inversé (`includes:` listait des dossiers,
      `paths:` pointait sur `vendor/*`) : réécrit avec `paths` sur le code applicatif,
      `excludePaths` sur `bootstrap/cache` et `vendor`, et l'extension Larastan. La CI
      appelle `vendor/bin/phpstan` (et non un binaire global absent).
- [x] Revoir la config PHPStan — analyse verte au niveau 5.
- [x] CI enrichie : `npm run themes:check` (refuse un CSS désynchronisé de ses sources) et
      `npm test` (Vitest).
- [x] **Bonus — `pint --test` échouait déjà sur `main`** (7 fichiers) : le projet est
      reformaté, Pint passe.

### Dépendances

- [x] Prism.js CDN → installation locale (`prismjs` + thème importés par Vite)
- [x] marked.js CDN → installation locale (`marked`)
- [x] Import `bootstrap.js` / `window.axios` supprimé (axios n'était utilisé nulle part)
- [x] `concurrently` — déjà en `devDependencies`, vérifié
- [x] `vite-plugin-static-copy` retiré : il ne copiait que les fichiers de thèmes devenus
      inutiles

**Plus aucune dépendance runtime n'est chargée depuis un CDN** (seule la police Instrument
Sans reste servie par Google Fonts).

## 🟢 Petits correctifs

### Code quality

- [x] `console.log` / `console.warn` supprimés de `resources/js/themes-manager.js`
- [x] Types de retour ajoutés : `ThemeController::setTheme()`, `getTheme()`,
      `ContactController::store()` → `JsonResponse`
- [x] `ThemeMiddleware::handle()` → `Response`
- [x] `!important` de `resources/css/app.css` : 13 → 4, tous dans le bloc
      `prefers-reduced-motion` (où ils sont requis par WCAG 2.3.3). Les utilitaires
      rethémés ne sont plus dupliqués entre `app.css` et `themes.css`.
- [x] `@stack('styles')` supprimé du layout (défini, jamais alimenté)
- [x] `.env` aligné sur `.env.example` — voir la note ci-dessous

### Duplication de code

- [x] `public/js/themes-manager.js` supprimé au profit du seul source buildé par Vite
- [x] Doublons CSS de `themes.css` (`.bg-white`, `.text-gray-900`) éliminés : le fichier
      est généré, une règle par utilitaire
- [x] Logique commune `data-table` / `data-table-pro` extraite dans
      `resources/js/alpine/data-table.js`
- [x] Logique commune `select-async` / `combobox-virtual` extraite dans
      `resources/js/alpine/filterable.js`

### Composants

- [x] `@props` ajoutés à `coachmarks`, `context-menu`, `snackbar`, `mega-menu`,
      `split-pane`, `breadcrumbs-overflow`
- [x] Formulaire AJAX de `examples.blade.php` — vérification faite : il envoie déjà
      l'en-tête `X-CSRF-TOKEN` lu depuis la balise meta. Aucun changement nécessaire.
- [x] `disabled` sur `<form>` remplacé par un `<fieldset disabled>`
- [x] `combobox-virtual` et `select-async` — plus de `<script>` inline : les composants
      sont enregistrés via `Alpine.data()` avant `Alpine.start()`
- [x] **Bonus — `data-table-pro` ouvrait un `alert()`** sur les actions groupées :
      remplacé par un évènement `show-snackbar`
- [x] **Bonus — le toggle Light/Dark de la barre latérale** produisait des noms de thèmes
      inexistants (`pro-dark`, `sakura-dark`…) et retombait silencieusement sur `light` :
      remplacé par un sélecteur listant les 25 thèmes réels, alimenté par le serveur

### Infra

- [x] Routes obsolètes retirées de la documentation
- [x] `public/js/` supprimé — `public/` ne contient plus que `build/` (Vite),
      `index.php`, `favicon.ico` et `robots.txt`

---

## À faire côté poste de développement

Le fichier `.env` n'est pas versionné : l'alignement effectué ici ne concerne que la copie
de travail. Sur un poste existant, `.env` peut encore pointer vers MySQL
(`DB_CONNECTION=mysql`, port 3300) — ce qui renvoie une **erreur 500 sur toutes les pages**
si le serveur n'est pas démarré, la session étant stockée en base. Alignez-le sur
`.env.example` :

```dotenv
DB_CONNECTION=sqlite
SESSION_ENCRYPT=true
```

puis `touch database/database.sqlite && php artisan migrate`.

---

## Commandes utiles

```bash
npm run themes:build     # régénère resources/css/themes.css depuis les palettes
npm run themes:check     # échoue si le CSS est désynchronisé (exécuté en CI)
php artisan test         # 139 tests
npm test                 # 25 tests JS (Vitest)
vendor/bin/pint          # formatage PHP
npm run lint             # ESLint
```
