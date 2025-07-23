# Démarrage rapide

## Lancer le projet en local

- **Développement (tout en un)**
  ```bash
  composer dev
  ```
  (Lance le serveur Laravel, Vite, la queue et les logs en parallèle)

- **Ou séparément**
  ```bash
  php artisan serve
  npm run dev
  ```

- **Build production**
  ```bash
  npm run build
  ```

- **Tests**
  ```bash
  composer test
  ```

## Structure des dossiers

- `resources/views/components/` : Tous les composants Blade (classés par type : form, layout, feedback, data, etc.)
- `resources/views/welcome.blade.php` : Showcase/documentation interactive de tous les composants
- `resources/views/layouts/app.blade.php` : Layout principal (header, footer, thème)
- `database/migrations/` : Migrations Laravel classiques (users, cache, jobs)
- `app/Models/User.php` : Modèle utilisateur par défaut
- `routes/web.php` : Routes principales (accueil, démo) 