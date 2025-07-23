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

### Tableau des composants par catégorie

#### Composants globaux

| Composant         | Paramètres                                                                                                   | Détails/Description                                                                                 |
|-------------------|-------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------|
| `<x-button>`      | label (string, slot), color (string, 'primary'), size (string, 'md'), icon (HTML), loading (bool, false), disabled (bool, false), outline (bool, false), block (bool, false), type (string, 'button') | Bouton stylé, supporte icône, loading, outline, block, tailles sm/md/lg, couleurs primary/secondary/danger |
| `<x-tag>`         | label (string, slot), color (string, 'gray'), closable (bool, false), icon (HTML), onClose (JS/callback)    | Tag/Badge coloré, option icône, closable, couleurs gray/blue/red/green/yellow                        |
| `<x-dropdown>`    | options (array), trigger (string, 'click'), open (bool, false), position (string, 'bottom'), disabled (bool, false), slot | Dropdown custom, options [{label, value}], position top/right/bottom/left, trigger click/hover/focus |
| `<x-calendar>`    | value, events (array), onChange (callback), onSelect (callback), disabledDates (array), minDate, maxDate, slot | Calendrier personnalisable, gestion d'événements, dates désactivées, callbacks                      |

#### Formulaires (`form`)

| Composant             | Paramètres                                                                                                                        | Détails/Description                                                                                 |
|-----------------------|-----------------------------------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------|
| `<x-form.input>`      | type (string, 'text'), label (string), placeholder (string), value, disabled (bool), readonly (bool), error (string/bool), helpText (string), prefix (HTML), suffix (HTML), clearable (bool), autofocus (bool), maxlength (int), minlength (int), step (int), min (int), max (int) | Champ de saisie polyvalent, supporte préfixe/suffixe, effaçable, erreurs, aide, tous types HTML      |
| `<x-form.select>`     | label (string), placeholder (string), value, disabled (bool), error (string/bool), clearable (bool), searchable (bool), multiple (bool), loading (bool), optionLabel (string), optionValue (string), options (array), taggable (bool), slot | Select avancé, supporte optgroup, recherche, multi, tags, loading, icônes, effaçable                |
| `<x-form.checkbox>`   | label (string), checked (bool), disabled (bool), error (string/bool), indeterminate (bool), value, name                           | Case à cocher, indéterminée, gestion d’erreur, label, nom, valeur                                   |
| `<x-form.radio>`      | options (array), label (string), value, disabled (bool), error (string/bool), name (string), inline (bool), slot                 | Boutons radio, options [{label, value}], inline ou colonne, gestion d’erreur                        |
| `<x-form.switch>`     | checked (bool), label (string), disabled (bool), value, name                                                                      | Switch on/off stylé, label, nom, valeur                                                             |
| `<x-form.textarea>`   | label (string), value, placeholder (string), disabled (bool), readonly (bool), error (string/bool), prefix (HTML), suffix (HTML), clearable (bool), maxlength (int), minlength (int), rows (int, 3) | Zone de texte multi-lignes, préfixe/suffixe, effaçable, erreurs, nombre de lignes                   |

#### Autres catégories (extrait, à compléter selon besoin)

- **layout** : `<x-layout.card>`, `<x-layout.collapse>`, `<x-layout.divider>`, `<x-layout.drawer>`, `<x-layout.popover>`, `<x-layout.tooltip>`
- **feedback** : `<x-feedback.badge>`, `<x-feedback.empty>`, `<x-feedback.progress>`, `<x-feedback.spinner>`
- **data** : `<x-data.pagination>`, `<x-data.statistic>`, `<x-data.stepper>`, `<x-data.timeline>`, `<x-data.descriptions>`
- **navigation** : `<x-navigation.breadcrumbs>`, `<x-navigation.sidebar>`, `<x-navigation.affix>`, `<x-navigation.anchor>`
- **media** : `<x-media.avatar>`, `<x-media.image>`
- **charts** : `<x-charts.charts>`

> Pour chaque composant, consulte la page d’accueil (`/`) pour voir tous les paramètres, slots, variantes et exemples visuels.

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
