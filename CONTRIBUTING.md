# Contribuer à LarappeUI

Merci de votre intérêt pour contribuer à LarappeUI !

## Prérequis

- PHP >= 8.2
- Node.js >= 20
- Composer
- npm

## Setup

```bash
git clone https://github.com/your-org/larappeui.git
cd larappeui
composer install
npm install
cp .env.example .env
php artisan key:generate
composer dev
```

## Code style

### PHP
Le projet utilise **Laravel Pint** pour le formatage PHP :
```bash
composer pint          # Vérifier
composer pint --fix    # Corriger automatiquement
```

### JavaScript
Le projet utilise **ESLint** + **Prettier** :
```bash
npm run lint           # Vérifier
npm run lint:fix       # Corriger ESLint
npm run format         # Formater avec Prettier
```

### CSS
Le projet utilise **TailwindCSS 4**. Utilisez les classes utility existantes autant que possible.

## Tests

```bash
composer test
```

Ajoutez des tests pour toute nouvelle fonctionnalité ou correction de bug.

## Ajouter un composant

1. Créer le fichier Blade dans `resources/views/components/<categorie>/<nom>.blade.php`
2. Utiliser `@props` pour définir les props du composant
3. Utiliser `$attributes->merge()` pour la flexibilité
4. Ajouter un aperçu dans `resources/views/components.blade.php`
5. Ajouter des tests si applicable

## Proposer une modification

1. Créer une branche depuis `main`
2. Faire vos modifications
3. S'assurer que les tests passent (`composer test`)
4. S'assurer que le linting passe (`composer pint` + `npm run lint`)
5. Créer une Pull Request

## Signaler un bug

Ouvrez une issue avec :
- Description du bug
- Étapes pour reproduire
- Comportement attendu vs obtenu
- Version de PHP/Laravel/Node
