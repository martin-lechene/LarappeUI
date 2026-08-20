# FAQ

Réponses aux questions les plus fréquentes sur LarappeUI.

---

## Installation et démarrage

### Quels sont les prérequis ?

PHP 8.4.1+, Node 20+ et Composer 2. Le détail est dans [installation.md](installation.md).

### `npm run dev` tourne mais la page n'a aucun style

Le layout charge les feuilles via `@vite`. Si le serveur Vite n'est pas lancé (ou si
`public/hot` traîne après un arrêt brutal), aucun style n'est injecté. Relancez
`npm run dev`, ou générez les assets avec `npm run build` pour servir la version compilée.

### Faut-il une base de données ?

Pour la vitrine, non : les sessions utilisent le driver configuré dans `.env`. Les tests
tournent sur SQLite en mémoire.

---

## Thèmes

### Comment ajouter un thème ?

Trois fichiers, dans cet ordre :

1. `resources/js/themes.js` — ajoutez la palette (12 couleurs + `dark: true|false`) ;
2. `config/themes.php` — ajoutez l'identifiant dans `available` ;
3. `npm run themes:build` — régénère `resources/css/themes.css`.

Le test `ThemeConsistencyTest` échoue si l'une des trois étapes est oubliée.

### Pourquoi ne faut-il pas éditer `resources/css/themes.css` ?

Il est **généré**. Toute modification manuelle est écrasée au prochain
`npm run themes:build`, et la CI (`npm run themes:check`) refuse un fichier
désynchronisé de ses sources. Les règles écrites à la main vivent dans
`resources/css/themes/_utilities.css` et `_theme-<nom>.css`.

### Quelle est la différence entre `--color-primary` et `--primary` ?

`--color-*` est la palette brute (consommée par les vues et les utilitaires Tailwind
rethémés). Les variables sans préfixe sont des alias sémantiques (`--background`,
`--text`, `--tooltip-bg`…) utilisés par `resources/css/app.css` et les composants. Les
deux sont générés pour chaque thème et restent donc toujours cohérents.

### Où est stocké le thème choisi ?

En session côté serveur (`ThemeMiddleware`) et dans `localStorage` côté navigateur. Au
chargement, `ThemeManager` interroge `/theme/get` et retombe sur `localStorage` si le
serveur est injoignable.

---

## Composants

### Comment désactiver tous les champs d'un formulaire ?

`<x-form.form :disabled="true">`. Le composant enveloppe le contenu dans un
`<fieldset disabled>` : `disabled` n'est pas un attribut valide sur `<form>` et n'aurait
aucun effet.

### Le jeton CSRF est-il ajouté automatiquement ?

Oui, dès que la méthode n'est pas `GET`. Les verbes `PUT`, `PATCH` et `DELETE` sont
également émis via le champ `_method`. Pour forcer le comportement : `:csrf="false"`.

### Comment brancher `select-async` sur mes données ?

Passez l'endpoint : `<x-extra.select-async endpoint="/api/villes" />`. Il est appelé avec
`?q=<recherche>` et doit répondre `[{"label": "...", "value": "..."}]` (ou
`{"data": [...]}`).

### Puis-je utiliser les composants sans Alpine ?

Non. Les composants interactifs (tableaux, combobox, dropzone, modales) s'appuient sur
Alpine, chargé par `resources/js/app.js`.

---

## Tests et qualité

### Comment lancer la suite complète ?

```bash
php artisan test   # tests PHP (rendu des composants, thèmes, contrôleurs)
npm test           # tests JS (ThemeManager, composants Alpine)
```

### `ThemeConsistencyTest` échoue, que faire ?

Le message indique la divergence. Dans la quasi-totalité des cas :
`npm run themes:build` puis relancez les tests.

---

## Divers

### Y a-t-il des dépendances chargées depuis un CDN ?

Non. Prism et marked sont installés en dépendances npm et inclus dans le bundle Vite.
Seule la police Instrument Sans est encore servie par Google Fonts.

### Où signaler un bug ?

Sur le [dépôt GitHub](https://github.com/martin-lechene/LarappeUI/issues). Voir aussi
[contribution.md](contribution.md).
