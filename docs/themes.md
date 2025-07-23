# Système de thèmes

LarappeUI intègre un système de thèmes visuels permettant de changer l’apparence globale de l’interface en un clic, directement depuis le sélecteur de thème situé dans l’en-tête (header).

## Thèmes disponibles par défaut

- Pro (FrappeUI)
- Light
- Dark
- Glass
- Forest
- Sea
- Summer
- 2D

Chaque thème applique des couleurs et styles différents à l’ensemble de l’application via des attributs HTML (`<html theme="...">`) et des variables CSS.

## Changer de thème

Dans l’interface, utilise le menu déroulant “Thème” dans le header pour basculer instantanément entre les thèmes. Le thème sélectionné modifie l’attribut `theme` sur la balise `<html>`, ce qui applique les styles correspondants définis dans le layout principal (`resources/views/layouts/app.blade.php`).

## Créer un thème personnalisé

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