# LarappeUI

Une collection de composants UI inspirés de FrappeUI pour Laravel 12+ & TailwindCSS 4

---

## Présentation

LarappeUI est une librairie de composants Blade réutilisables pour Laravel 12+, conçue pour accélérer le développement d'interfaces modernes et élégantes. Elle s'inspire de FrappeUI et exploite pleinement TailwindCSS. Idéal pour prototyper ou bâtir des applications Laravel robustes avec une expérience utilisateur soignée.

---

## Prérequis

- PHP >= 8.2
- [Composer](https://getcomposer.org/)
- Node.js >= 18.x & NPM >= 9.x
- [Laravel 12+](https://laravel.com/)
- Extensions PHP classiques (pdo, mbstring, etc.)

---

## Installation

1. **Cloner le dépôt**
   ```bash
   git clone <repo-url>
   cd LarappeUI
   ```
2. **Installer les dépendances backend**
   ```bash
   composer install
   ```
3. **Installer les dépendances frontend**
   ```bash
   npm install
   ```
4. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   # Adapter la config DB si besoin puis :
   php artisan migrate
   ```

---

## Lancement du projet

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

---

## Structure du projet

- `resources/views/components/` : Tous les composants Blade (classés par type : form, layout, feedback, data, etc.)
- `resources/views/welcome.blade.php` : Showcase/documentation interactive de tous les composants
- `resources/views/layouts/app.blade.php` : Layout principal (header, footer, thème)
- `database/migrations/` : Migrations Laravel classiques (users, cache, jobs)
- `app/Models/User.php` : Modèle utilisateur par défaut
- `routes/web.php` : Routes principales (accueil, démo)

---

## Utilisation des composants

Chaque composant est documenté et illustré dans la page d'accueil (`/`).

**Exemple d'utilisation dans une vue Blade :**
```blade
<x-button color="primary">Valider</x-button>
<x-form.input label="Email" placeholder="Votre email" />
<x-form.select :options="['Option 1', 'Option 2']" />
```

- Les paramètres, slots et variantes sont détaillés dans la page d'accueil.
- Pour voir tous les composants et leurs options, lance le projet et visite `/`.

---

## Système de thèmes

LarappeUI intègre un système de thèmes visuels permettant de changer l’apparence globale de l’interface en un clic, directement depuis le sélecteur de thème situé dans l’en-tête (header).

### Thèmes disponibles par défaut

- Pro (FrappeUI)
- Light
- Dark
- Glass
- Forest
- Sea
- Summer
- 2D

Chaque thème applique des couleurs et styles différents à l’ensemble de l’application via des attributs HTML (`<html theme="...">`) et des variables CSS.

### Changer de thème

Dans l’interface, utilise le menu déroulant “Thème” dans le header pour basculer instantanément entre les thèmes. Le thème sélectionné modifie l’attribut `theme` sur la balise `<html>`, ce qui applique les styles correspondants définis dans le layout principal (`resources/views/layouts/app.blade.php`).

### Créer un thème personnalisé

1. **Définir le style dans le layout**
   
   Dans `resources/views/layouts/app.blade.php`, ajoute une nouvelle règle CSS dans le bloc `<style>` :
   
   ```html
   [theme="mon-theme"] {
       background-color: #f0e6ff;
       color: #3b0764;
       /* Ajoute ici tes variables ou styles personnalisés */
   }
   ```

2. **Ajouter le thème au sélecteur**
   
   Dans le `<select id="theme-select">`, ajoute une nouvelle option :
   
   ```html
   <option value="mon-theme">Mon Thème</option>
   ```

3. **(Optionnel) Ajouter des variables CSS personnalisées**
   
   Tu peux définir des variables CSS pour les couleurs, backgrounds, etc. Exemple :
   
   ```css
   [theme="mon-theme"] {
       --color-primary: #7c3aed;
       --color-bg: #f0e6ff;
       --color-text: #3b0764;
       background-color: var(--color-bg);
       color: var(--color-text);
   }
   ```
   Utilise ensuite ces variables dans tes composants ou ton CSS.

4. **Utiliser le thème**
   
   Relance l’application, sélectionne “Mon Thème” dans le menu, et vérifie le rendu.

**Astuce :** Tu peux t’inspirer des thèmes existants dans le layout pour la structure et la syntaxe.

---

## Ajouter ou modifier un composant

- Ajoute/modifie le fichier Blade dans `resources/views/components/` (dans le bon sous-dossier)
- Documente l'usage dans la page d'accueil si c'est un nouveau composant
- Respecte la convention d'organisation (un composant = un fichier, pas de Livewire inutile)
- Si tu ajoutes une migration, complète la migration existante si elle correspond, sinon crée-en une nouvelle dans `database/migrations/`
- Mets à jour la doc si nécessaire

---

## Contribution

- Fork, branche, PR bienvenues !
- Tests : place-les dans `tests/`
- Respecte la structure et les conventions du projet
- Pour toute question, consulte la page d'accueil ou le code source des composants

---

## Liens utiles

- [Laravel Documentation](https://laravel.com/docs)
- [TailwindCSS](https://tailwindcss.com/)
- [FrappeUI](https://ui.frappe.io/)
- [Vite](https://vitejs.dev/)

---

## Auteur

Martin Lechêne — [LinkedIn](https://linkedin.com/in/martin-lechene/) — [Github](https://github.com/martin-lechene/LarappeUI)

---

## Licence

MIT
