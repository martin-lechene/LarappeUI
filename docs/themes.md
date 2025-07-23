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

## Nouveaux thèmes disponibles

- **Solarized Light** : Palette claire inspirée du thème Solarized, idéale pour le confort visuel.
- **Solarized Dark** : Version sombre du Solarized, pour les amateurs de dark mode.
- **Monokai** : Couleurs vives et contrastées, inspiré des éditeurs de code.
- **Pastel** : Couleurs douces et désaturées, ambiance légère et apaisante.
- **Minimal** : Blanc, gris, noir, pour une interface ultra épurée.
- **Coffee** : Tons bruns et beiges, ambiance chaleureuse de café.
- **Sakura** : Rose pâle et blanc, inspiration florale japonaise.
- **Forest Night** : Verts foncés et marrons, ambiance forêt nocturne.
- **Retro 80s** : Violet, turquoise, rose flashy, style années 80.
- **Space** : Bleu nuit, violet, touches d’étoiles/blanc, ambiance cosmique.
- **Vintage** : Jaune pâle, vert olive, orange doux, style rétro années 70.
- **Dark** : Désormais full noir, toutes les surfaces, fonds, accents et éléments sont noirs ou gris très foncés, avec un texte blanc pour un contraste maximal.

Pour utiliser un thème, sélectionnez-le dans le menu déroulant en haut à droite de l’interface. Chaque thème applique automatiquement sa palette de couleurs à l’ensemble de l’UI.

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