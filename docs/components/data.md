# Composants Data

Composants pour afficher et organiser des données.

## Pagination (`x-data.pagination`)

Navigation entre pages de résultats.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `total` | `int` | — | Nombre total d'éléments |
| `pageSize` | `int` | `10` | Éléments par page |
| `currentPage` | `int` | `1` | Page active |
| `onPageChange` | `string` | — | Callback JS lors du changement de page |

**Exemple :**
```blade
<x-data.pagination :total="200" :pageSize="10" :currentPage="3" />
```

---

## Statistic (`x-data.statistic`)

Affichage d'une valeur clé avec tendance.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Libellé |
| `value` | `mixed` | — | Valeur à afficher |
| `prefix` | `string` | — | Préfixe (ex: `€`) |
| `suffix` | `string` | — | Suffixe (ex: `%`) |
| `trend` | `string` | — | Tendance (`up`, `down`) |
| `trendValue` | `string` | — | Valeur de tendance (ex: `+12%`) |

**Exemple :**
```blade
<x-data.statistic title="Chiffre d'affaires" value="3 490" suffix="€" trend="up" trendValue="+12%" />
```

---

## Stepper (`x-data.stepper`)

Indicateur d'étapes d'un processus.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `steps` | `array` | — | Liste d'étapes `[['label' => '...'], ...]` |
| `current` | `int` | `1` | Étape active (base 1) |
| `vertical` | `bool` | `false` | Orientation verticale |

**Exemple :**
```blade
<x-data.stepper
    :steps="[['label'=>'Panier'], ['label'=>'Livraison'], ['label'=>'Paiement']]"
    :current="2"
/>
```

---

## Timeline (`x-data.timeline`)

Liste d'événements chronologiques.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `items` | `array` | — | Événements `[['label'=>'...','content'=>'...'], ...]` |
| `reverse` | `bool` | `false` | Afficher du plus récent au plus ancien |

**Exemple :**
```blade
<x-data.timeline :items="[
    ['label' => '09:00', 'content' => 'Ouverture du ticket'],
    ['label' => '11:30', 'content' => 'Prise en charge'],
    ['label' => '14:00', 'content' => 'Résolu'],
]" />
```

---

## Descriptions (`x-data.descriptions`)

Tableau clé-valeur pour afficher les détails d'un objet.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `items` | `array` | — | Paires `[['label'=>'...','content'=>'...'], ...]` |
| `columns` | `int` | `2` | Nombre de colonnes |
| `bordered` | `bool` | `false` | Avec bordures |

**Exemple :**
```blade
<x-data.descriptions :items="[
    ['label' => 'Nom', 'content' => 'Alice Dupont'],
    ['label' => 'Email', 'content' => 'alice@example.com'],
    ['label' => 'Ville', 'content' => 'Paris'],
]" :columns="2" />
```

---

## Data Table (`x-extra.data-table`)

Tableau de données avec tri et sélection.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `columns` | `array` | — | Colonnes `[['key'=>'...','label'=>'...'], ...]` |
| `rows` | `array` | — | Données à afficher |
| `selectable` | `bool` | `false` | Cases à cocher par ligne |
| `sortable` | `bool` | `true` | Tri par colonne |

**Exemple :**
```blade
<x-extra.data-table
    :columns="[['key'=>'name','label'=>'Nom'],['key'=>'email','label'=>'Email']]"
    :rows="[['name'=>'Alice','email'=>'alice@ex.com'],['name'=>'Bob','email'=>'bob@ex.com']]"
/>
```

---

## Data Table Pro (`x-extra.data-table-pro`)

Tableau avancé avec filtres, pagination et export.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `columns` | `array` | — | Colonnes |
| `rows` | `array` | — | Données |
| `searchable` | `bool` | `true` | Barre de recherche |
| `exportable` | `bool` | `false` | Bouton d'export CSV |
| `pageSize` | `int` | `10` | Lignes par page |

**Exemple :**
```blade
<x-extra.data-table-pro
    :columns="[['key'=>'name','label'=>'Nom'],['key'=>'role','label'=>'Rôle']]"
    :rows="$users"
    :searchable="true"
    :exportable="true"
/>
```

---

## Kanban (`x-extra.kanban`)

Tableau Kanban avec colonnes glissables.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `columns` | `array` | — | Colonnes `[['title'=>'...','items'=>[...]], ...]` |
| `draggable` | `bool` | `true` | Activer le drag & drop |

**Exemple :**
```blade
<x-extra.kanban :columns="[
    ['title' => 'À faire', 'items' => ['Tâche 1', 'Tâche 2']],
    ['title' => 'En cours', 'items' => ['Tâche 3']],
    ['title' => 'Terminé', 'items' => []],
]" />
```

---

## Pagination Compact (`x-extra.pagination-compact`)

Pagination minimaliste avec entrée directe de numéro.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `page` | `int` | `1` | Page courante |
| `pages` | `int` | — | Nombre total de pages |

**Exemple :**
```blade
<x-extra.pagination-compact :page="3" :pages="20" />
```

---

## Sparkline (`x-extra.sparkline`)

Mini-graphique linéaire en ligne.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `data` | `array<number>` | — | Série de valeurs |
| `width` | `int` | `120` | Largeur en pixels |
| `height` | `int` | `40` | Hauteur en pixels |
| `color` | `string` | `primary` | Couleur de la courbe |

**Exemple :**
```blade
<x-extra.sparkline :data="[1, 3, 2, 5, 4, 7, 6]" />
```

---

## Radial Gauge (`x-extra.radial-gauge`)

Jauge circulaire de type compteur.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `value` | `int` | `0` | Valeur (0–100) |
| `size` | `int` | `120` | Diamètre en pixels |
| `label` | `string` | — | Étiquette sous la valeur |

**Exemple :**
```blade
<x-extra.radial-gauge :value="65" label="Performance" />
```

---

## Heatmap (`x-extra.heatmap`)

Carte de chaleur pour visualiser l'intensité.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `data` | `array<array<number>>` | — | Matrice de valeurs |
| `colorScale` | `string` | `blue` | Palette de couleurs |

**Exemple :**
```blade
<x-extra.heatmap :data="[[1,2,3],[2,5,1],[4,3,2]]" />
```

---

## Map Markers (`x-extra.map-markers`)

Carte interactive avec marqueurs.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `markers` | `array` | — | Marqueurs `[['lat'=>...,'lng'=>...,'label'=>'...'], ...]` |
| `zoom` | `int` | `10` | Niveau de zoom initial |
| `center` | `array` | — | Centre de la carte `['lat'=>...,'lng'=>...]` |

**Exemple :**
```blade
<x-extra.map-markers :markers="[
    ['lat' => 48.85, 'lng' => 2.35, 'label' => 'Paris'],
    ['lat' => 45.75, 'lng' => 4.83, 'label' => 'Lyon'],
]" />
```

---

## JSON Viewer (`x-extra.json-viewer`)

Visualiseur JSON arborescent et interactif.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `data` | `array` | — | Données à afficher |
| `expanded` | `bool` | `true` | Tous les nœuds ouverts |
| `theme` | `string` | `light` | Thème de coloration (`light`, `dark`) |

**Exemple :**
```blade
<x-extra.json-viewer :data="['user' => ['name' => 'Alice', 'role' => 'admin']]" />
```
