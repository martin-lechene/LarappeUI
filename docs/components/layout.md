# Composants Layout

Composants de mise en page pour structurer vos interfaces.

## Card (`x-layout.card`)

Conteneur avec ombre et bordure arrondie.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Titre affiché en en-tête |
| `footer` | `string` | — | Contenu du pied de carte (slot) |

**Exemple :**
```blade
<x-layout.card title="Mon titre">
    Contenu de la carte
</x-layout.card>
```

---

## Collapse (`x-layout.collapse`)

Section pliable/dépliable.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Titre de l'accordéon |
| `open` | `bool` | `false` | Ouvert par défaut |

**Exemple :**
```blade
<x-layout.collapse title="Détails">
    Contenu masqué
</x-layout.collapse>
```

---

## Divider (`x-layout.divider`)

Séparateur horizontal ou vertical.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `label` | `string` | — | Texte centré sur le séparateur |
| `vertical` | `bool` | `false` | Mode vertical |

**Exemple :**
```blade
<x-layout.divider label="ou" />
```

---

## Drawer (`x-layout.drawer`)

Panneau latéral coulissant.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Titre du tiroir |
| `side` | `string` | `left` | Côté d'ouverture (`left`, `right`, `top`, `bottom`) |
| `width` | `string` | `w-80` | Classe Tailwind de largeur |

**Exemple :**
```blade
<x-layout.drawer title="Menu">
    <div class="p-4">Contenu du drawer</div>
</x-layout.drawer>
```

---

## Popover (`x-layout.popover`)

Bulle d'information contextuelle.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `text` | `string` | — | Texte du déclencheur |
| `placement` | `string` | `bottom` | Position (`top`, `bottom`, `left`, `right`) |

**Exemple :**
```blade
<x-layout.popover text="Plus d'infos">
    Texte du popover
</x-layout.popover>
```

---

## Tooltip (`x-layout.tooltip`)

Infobulle au survol.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `text` | `string` | — | Texte de l'infobulle |
| `placement` | `string` | `top` | Position (`top`, `bottom`, `left`, `right`) |

**Exemple :**
```blade
<x-layout.tooltip text="Indice utile">
    Survolez-moi
</x-layout.tooltip>
```

---

## Section Header (`x-extra.section-header`)

En-tête de section avec titre et sous-titre.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Titre de la section |
| `subtitle` | `string` | — | Description courte |
| `action` | `string` | — | Texte du bouton d'action |

**Exemple :**
```blade
<x-extra.section-header title="Utilisateurs" subtitle="Gérer les comptes" />
```

---

## Modal (`x-extra.modal`)

Fenêtre modale.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Titre de la modale |
| `size` | `string` | `md` | Taille (`sm`, `md`, `lg`, `xl`, `full`) |

**Exemple :**
```blade
<x-extra.modal title="Confirmation">
    <div class="p-4">Contenu de la modale</div>
</x-extra.modal>
```

---

## Masonry (`x-extra.masonry`)

Grille en maçonnerie (colonnes de hauteur variable).

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `cols` | `int` | `3` | Nombre de colonnes |
| `gap` | `string` | `4` | Espacement entre éléments |

**Exemple :**
```blade
<x-extra.masonry :cols="3">
    <div>...</div>
    <div>...</div>
</x-extra.masonry>
```

---

## Split Pane (`x-extra.split-pane`)

Vue divisée en deux panneaux redimensionnables.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `direction` | `string` | `horizontal` | Sens de division (`horizontal`, `vertical`) |
| `initial` | `int` | `50` | Taille initiale (%) du premier panneau |

**Exemple :**
```blade
<x-extra.split-pane>
    <x-slot name="left"><div class="p-4">Panneau gauche</div></x-slot>
    <x-slot name="right"><div class="p-4">Panneau droit</div></x-slot>
</x-extra.split-pane>
```
