# Composants Navigation

Composants de navigation et d'orientation dans l'interface.

## Affix (`x-navigation.affix`)

Élément épinglé à une position fixe lors du défilement.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `offset` | `int` | `0` | Distance du bord (px) avant activation |
| `position` | `string` | `top` | Position (`top`, `bottom`) |

**Exemple :**
```blade
<x-navigation.affix :offset="64">
    <nav>Barre de navigation fixe</nav>
</x-navigation.affix>
```

---

## Anchor (`x-navigation.anchor`)

Lien hypertexte stylisé.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `href` | `string` | `#` | URL cible |
| `external` | `bool` | `false` | Ouvrir dans un nouvel onglet |
| `color` | `string` | `primary` | Couleur du lien |

**Exemple :**
```blade
<x-navigation.anchor href="https://example.com" :external="true">
    Voir le site
</x-navigation.anchor>
```

---

## Breadcrumbs (`x-navigation.breadcrumbs`)

Fil d'Ariane pour la navigation hiérarchique.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `items` | `array` | — | Éléments `[['label'=>'...','href'=>'...'], ...]` |
| `separator` | `string` | `/` | Séparateur entre les éléments |

**Exemple :**
```blade
<x-navigation.breadcrumbs :items="[
    ['label' => 'Accueil', 'href' => '/'],
    ['label' => 'Produits', 'href' => '/products'],
    ['label' => 'Détail'],
]" />
```

---

## Sidebar (`x-navigation.sidebar`)

Menu latéral de navigation.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `items` | `array` | — | Éléments `[['label'=>'...','href'=>'...','icon'=>'...'], ...]` |
| `collapsible` | `bool` | `false` | Sidebar réductible |
| `active` | `string` | — | Label de l'élément actif |

**Exemple :**
```blade
<x-navigation.sidebar :items="[
    ['label' => 'Tableau de bord', 'href' => '/'],
    ['label' => 'Utilisateurs', 'href' => '/users'],
    ['label' => 'Paramètres', 'href' => '/settings'],
]" active="Tableau de bord" />
```

---

## Dropdown (`x-dropdown`)

Menu déroulant avec déclencheur personnalisable.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `trigger` | `slot` | — | Contenu du déclencheur |
| `placement` | `string` | `bottom-start` | Position du menu |
| `width` | `string` | `w-48` | Largeur du menu |

**Exemple :**
```blade
<x-dropdown>
    <x-slot name="trigger">
        <x-button>Options</x-button>
    </x-slot>
    <a class="block px-4 py-2 hover:bg-gray-50">Éditer</a>
    <a class="block px-4 py-2 hover:bg-gray-50 text-danger">Supprimer</a>
</x-dropdown>
```

---

## Tabs (`x-extra.tabs`)

Onglets horizontaux.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `tabs` | `array<string>` | — | Liste des noms d'onglets |
| `active` | `int` | `0` | Index de l'onglet actif |

**Exemple :**
```blade
<x-extra.tabs :tabs="['Vue d\'ensemble', 'Analytiques', 'Paramètres']">
    Contenu de l'onglet actif
</x-extra.tabs>
```

---

## Segmented Tabs (`x-extra.segmented-tabs`)

Sélecteur en segments (style pill).

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `tabs` | `array<string>` | — | Options |
| `active` | `int` | `0` | Index actif |

**Exemple :**
```blade
<x-extra.segmented-tabs :tabs="['Jour', 'Semaine', 'Mois']" />
```

---

## Vertical Tabs (`x-extra.vertical-tabs`)

Onglets disposés verticalement.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `tabs` | `array<string>` | — | Liste des onglets |
| `active` | `int` | `0` | Index actif |

**Exemple :**
```blade
<x-extra.vertical-tabs :tabs="['Profil', 'Sécurité', 'Notifications']">
    Contenu de l'onglet
</x-extra.vertical-tabs>
```

---

## Mega Menu (`x-extra.mega-menu`)

Menu de navigation multi-colonnes étendu.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `items` | `array` | — | Sections avec sous-liens |
| `trigger` | `slot` | — | Déclencheur d'ouverture |

**Exemple :**
```blade
<x-extra.mega-menu />
```

---

## Breadcrumbs Overflow (`x-extra.breadcrumbs-overflow`)

Fil d'Ariane avec troncature automatique pour longs chemins.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `items` | `array` | — | Éléments du fil d'Ariane |
| `maxVisible` | `int` | `3` | Nombre max d'éléments visibles |

**Exemple :**
```blade
<x-extra.breadcrumbs-overflow :items="$breadcrumbs" :maxVisible="3" />
```

---

## Command Palette (`x-extra.command-palette`)

Palette de commande rapide (style ⌘K).

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `placeholder` | `string` | `Rechercher...` | Texte indicatif |
| `commands` | `array` | — | Liste de commandes `[['label'=>'...','action'=>'...'], ...]` |
| `shortcut` | `string` | `Ctrl+K` | Raccourci clavier |

**Exemple :**
```blade
<x-extra.command-palette />
```

---

## Context Menu (`x-extra.context-menu`)

Menu contextuel au clic droit.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `items` | `array` | — | Actions `[['label'=>'...','action'=>'...'], ...]` |

**Exemple :**
```blade
<x-extra.context-menu>
    <div class="p-8 border rounded bg-gray-50">Zone clic droit</div>
</x-extra.context-menu>
```

---

## Tree View (`x-extra.tree-view`)

Arborescence hiérarchique dépliable.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `nodes` | `array` | — | Nœuds `[['label'=>'...','children'=>[...]], ...]` |
| `expanded` | `bool` | `false` | Tout déplié par défaut |

**Exemple :**
```blade
<x-extra.tree-view :nodes="[
    ['label' => 'src', 'children' => [
        ['label' => 'app.js'],
        ['label' => 'utils.js'],
    ]],
    ['label' => 'package.json'],
]" />
```

---

## Table of Contents (`x-extra.table-of-contents`)

Sommaire automatique basé sur les titres de la page.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `selector` | `string` | `h2,h3` | Sélecteur CSS des titres |
| `sticky` | `bool` | `false` | Position fixe |

**Exemple :**
```blade
<x-extra.table-of-contents :sticky="true" />
```

---

## Coachmarks (`x-extra.coachmarks`)

Guide interactif pas-à-pas pour onboarding.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `steps` | `array` | — | Étapes `[['target'=>'#id','title'=>'...','content'=>'...'], ...]` |
| `autoStart` | `bool` | `false` | Démarrer automatiquement |

**Exemple :**
```blade
<x-extra.coachmarks :steps="[
    ['target' => '#btn-create', 'title' => 'Créer', 'content' => 'Cliquez ici pour commencer.'],
]" />
```
