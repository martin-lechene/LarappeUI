# FAQ

## Thèmes

### Combien de thèmes LarappeUI propose-t-il ?

**25 thèmes sélectionnables**, dont 9 possèdent une variante sombre, soit **34 palettes** au total. Six noms hérités (`2d-light`, `glass-light`, `ocean-light`, `oldschool-light`, `summer-light`, `winter-light`) sont conservés comme alias de leur thème clair, ce qui porte à **40 le nombre de noms acceptés** par `POST /theme/set`.

### Où est définie la liste des thèmes ?

Dans `config/themes.php`, et nulle part ailleurs. Ce fichier alimente :

- la validation serveur (`ThemeController`) ;
- l'injection dans la page (`window.LarappeUI`, posée par le layout) ;
- la génération de `resources/css/themes.css`.

`tests/Feature/ThemeCatalogTest` échoue si l'une de ces sources diverge.

### Pourquoi mon nouveau thème n'apparaît-il pas ?

Ajoutez-le à `config/themes.php`, puis régénérez `resources/css/themes.css` et relancez `npm run build`. N'éditez pas le CSS à la main : il est généré, et le test de parité le détectera.

### L'interrupteur Light/Dark est grisé, est-ce normal ?

Oui, si le thème courant n'a pas de variante sombre. Seuls les thèmes listés dans `config/themes.php` sous `dark_of` en possèdent une.

### Les couleurs respectent-elles les contrastes WCAG ?

99 des 102 paires texte/fond du catalogue passent le niveau AA (ratio ≥ 4,5:1). Les trois exceptions appartiennent à la famille `solarized`, dont les valeurs sont celles de la palette officielle d'Ethan Schoonover — volontairement peu contrastée. C'est un arbitrage assumé en faveur de la fidélité de la palette.

## Composants

### Comment ajouter un composant à la galerie ?

Créez le fichier Blade dans `resources/views/components/`, puis ajoutez une entrée dans `componentBlocks` de `resources/views/components.blade.php`.

### Pourquoi le bloc `<script>` de la page Composants est-il dans `@verbatim` ?

Parce que Blade compile les balises `<x-...>` **même à l'intérieur d'un `<script>`**. Sans cette protection, les balises figurant dans les chaînes `code:` sont remplacées par le HTML rendu du composant, ce qui peut injecter un backtick et casser tout le script. `tests/Feature/ComponentsPageTest` valide la syntaxe du JavaScript généré pour empêcher la régression.

N'écrivez jamais le nom de cette directive dans un commentaire Blade : `storeVerbatimBlocks()` s'exécute avant `compileComments()` et l'interpréterait comme la vraie directive.

### Pourquoi les classes Tailwind ne sont-elles jamais construites par interpolation ?

Le scanner de Tailwind v4 lit les sources en texte et ne résout aucune interpolation. Une classe écrite `"bg-{$couleur}-600"` n'est jamais générée. Toutes les combinaisons doivent apparaître littéralement — voir `resources/views/components/button.blade.php`.

## Installation

### `composer install` échoue sur `doganddev/laravel-observability`

Ce paquet est hébergé dans un dépôt privé. Il n'est requis que pour l'observabilité (Sentry, PostHog). Si vous n'y avez pas accès, retirez-le de `composer.json` ou demandez l'accès au dépôt.

### Quelles versions sont nécessaires ?

PHP ≥ 8.4, Node ≥ 24, Laravel 13, TailwindCSS 4, Vite 8.

## Accessibilité

### LarappeUI gère-t-il la navigation clavier ?

Oui. Les onglets suivent le motif ARIA (`tablist` / `tab` / `tabpanel`, tabindex mobile, flèches gauche/droite), les modales piègent le focus et se ferment avec Échap, et les menus se parcourent aux flèches.

### Existe-t-il des rôles utilisateur (admin, éditeur…) ?

Non. LarappeUI est une bibliothèque de composants : elle n'embarque ni authentification, ni système de rôles. Le seul profil est le visiteur.
