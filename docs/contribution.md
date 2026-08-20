# Créer ou modifier un composant

Cette page complète le guide général [CONTRIBUTING.md](../CONTRIBUTING.md) (setup,
style de code, workflow de PR) en détaillant ce qui est propre aux composants LarappeUI.

---

## Anatomie d'un composant

Les composants vivent dans `resources/views/components/`, rangés par catégorie
(`form/`, `layout/`, `data/`, `navigation/`, `media/`, `charts/`, `extra/`). Le chemin
détermine le nom d'appel : `resources/views/components/extra/rating.blade.php` s'utilise
via `<x-extra.rating />`.

Chaque composant commence par la déclaration de ses props :

```blade
@props([
    'value' => 0,
    'max' => 5,
    'readonly' => false,
    'label' => 'Note',
])
```

Règles appliquées dans le dépôt :

- **Toujours déclarer `@props`**, même pour un composant sans option : c'est ce qui
  empêche les attributs de fuir dans le HTML et documente l'API du composant ;
- **Exposer un `label`** (ou `aria-label`) sur tout composant interactif, avec une valeur
  par défaut en français ;
- **Ne jamais coder en dur une couleur** : passer par les variables de thème
  (`var(--color-primary)`, `var(--text)`…), sinon le composant ne suivra pas les thèmes.

## Comportement JavaScript

Le JS d'un composant ne va **pas** dans une balise `<script>` de la vue Blade : un script
inline est ré-évalué à chaque rendu, échappe aux tests et peut être exécuté après
`Alpine.start()`.

Déclarez le composant Alpine dans `resources/js/alpine/index.js` :

```js
Alpine.data('rating', ({ max = 5 } = {}) => ({
  value: 0,
  max,
  select(index) {
    this.value = index;
  },
}));
```

puis référencez-le depuis la vue :

```blade
<div x-data="rating({ max: {{ (int) $max }} })">…</div>
```

La logique réutilisable entre plusieurs composants va dans un module dédié
(`filterable.js`, `data-table.js`) importé par `index.js`.

## Accessibilité

Le minimum exigé pour qu'un composant soit accepté :

| Cas | Attendu |
|-----|---------|
| Bouton sans texte (icône, croix, étoile) | `aria-label` explicite |
| Liste d'options | `role="listbox"` + `role="option"` + `aria-selected` |
| Onglets | `role="tablist"`, `role="tab"`, `aria-selected`, `role="tabpanel"` |
| Modale, palette, dialogue | `role="dialog"`, `aria-modal="true"`, libellé, fermeture par `Échap` |
| Message transitoire | `role="status"` (ou `role="alert"` si erreur) |
| Tableau | `<caption>` (au besoin `class="sr-only"`) et `scope` sur les `<th>` |
| Image | `alt` — décoratif : `alt=""` + `aria-hidden="true"` |

Ces garanties sont vérifiées par `tests/Feature/Components/ComponentRenderTest.php` :
ajoutez-y une entrée pour tout nouveau composant interactif.

## Tests

```bash
php artisan test    # rendu Blade + accessibilité + thèmes
npm test            # logique Alpine (Vitest)
```

Tout composant ajouté est automatiquement inclus dans le test de rendu par défaut : il
doit donc pouvoir s'afficher **sans aucune prop**. Si son rendu est vide par conception
(élément masqué tant qu'il n'est pas ouvert), déclarez-le dans la constante
`EXTRA_PROPS` du test.

## Thèmes

Pour ajouter un thème, voir la [FAQ](faq.md#comment-ajouter-un-thème) : palette dans
`resources/js/themes.js`, identifiant dans `config/themes.php`, puis
`npm run themes:build`. `resources/css/themes.css` est généré — ne l'éditez jamais à la
main.

## Documentation

Un nouveau composant doit apparaître dans :

- le fichier de catégorie correspondant (`docs/components/<catégorie>.md`) ;
- le tableau récapitulatif de [docs/components/README.md](components/README.md) ;
- la section `[Unreleased]` du [CHANGELOG](../CHANGELOG.md).

## Checklist de PR

- [ ] `@props` déclarés, valeurs par défaut sensées
- [ ] Aucune couleur codée en dur
- [ ] Attributs d'accessibilité présents et testés
- [ ] JS déclaré via `Alpine.data`, pas de `<script>` inline
- [ ] `php artisan test` et `npm test` au vert
- [ ] `vendor/bin/pint`, `npm run lint`, `npm run format:check` au vert
- [ ] Documentation et CHANGELOG mis à jour
