# Composants Media

Composants pour afficher des médias visuels.

## Avatar (`x-media.avatar`)

Photo de profil ou initiales d'un utilisateur.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `name` | `string` | — | Nom complet (génère les initiales) |
| `src` | `string` | — | URL de l'image |
| `size` | `string` | `md` | Taille (`xs`, `sm`, `md`, `lg`, `xl`) |
| `shape` | `string` | `circle` | Forme (`circle`, `square`) |
| `color` | `string` | — | Couleur d'arrière-plan (si pas d'image) |

**Exemple :**
```blade
<x-media.avatar name="Alice Dupont" size="lg" />
<x-media.avatar src="/storage/avatars/alice.jpg" name="Alice" size="md" />
```

---

## Image (`x-media.image`)

Image responsive avec ratio et fallback.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `src` | `string` | — | URL de l'image |
| `alt` | `string` | — | Texte alternatif |
| `ratio` | `string` | — | Ratio d'aspect (ex: `16/9`, `4/3`, `1/1`) |
| `rounded` | `bool` | `false` | Coins arrondis |
| `shadow` | `bool` | `false` | Ombre portée |
| `fit` | `string` | `cover` | Ajustement (`cover`, `contain`, `fill`) |

**Exemple :**
```blade
<x-media.image
    src="https://example.com/photo.jpg"
    alt="Photo de couverture"
    ratio="16/9"
    :rounded="true"
/>
```

---

## Avatar Group (`x-extra.avatar-group`)

Groupe d'avatars empilés avec compteur de surplus.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `users` | `array` | — | Utilisateurs `[['name'=>'...','src'=>'...'], ...]` |
| `max` | `int` | `4` | Nombre max d'avatars visibles |
| `size` | `string` | `md` | Taille des avatars |

**Exemple :**
```blade
<x-extra.avatar-group :users="[
    ['name' => 'Alice', 'src' => '/img/alice.jpg'],
    ['name' => 'Bob'],
    ['name' => 'Charlie', 'src' => '/img/charlie.jpg'],
    ['name' => 'Diana'],
    ['name' => 'Evan'],
]" :max="3" />
```

---

## Gallery (`x-extra.gallery`)

Galerie d'images avec lightbox intégré.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `images` | `array` | — | Images `[['src'=>'...','alt'=>'...','caption'=>'...'], ...]` |
| `cols` | `int` | `3` | Nombre de colonnes de la grille |
| `lightbox` | `bool` | `true` | Activer l'aperçu en plein écran |

**Exemple :**
```blade
<x-extra.gallery :images="[
    ['src' => '/img/1.jpg', 'alt' => 'Photo 1', 'caption' => 'Première photo'],
    ['src' => '/img/2.jpg', 'alt' => 'Photo 2'],
    ['src' => '/img/3.jpg', 'alt' => 'Photo 3'],
]" :cols="3" />
```
