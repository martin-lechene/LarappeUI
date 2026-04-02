# Composants Feedback

Composants pour informer l'utilisateur sur l'état de l'application.

## Badge (`x-feedback.badge`)

Étiquette colorée pour statuts, compteurs ou labels.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `color` | `string` | `primary` | Couleur (`primary`, `secondary`, `success`, `warning`, `danger`, `info`) |
| `size` | `string` | `md` | Taille (`sm`, `md`, `lg`) |
| `rounded` | `bool` | `false` | Badge arrondi en pilule |

**Exemple :**
```blade
<x-feedback.badge color="success">Actif</x-feedback.badge>
<x-feedback.badge color="danger">Erreur</x-feedback.badge>
```

---

## Empty (`x-feedback.empty`)

État vide avec illustration et message.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Titre de l'état vide |
| `description` | `string` | — | Description/conseil |
| `icon` | `string` | — | Icône SVG ou classe |

**Exemple :**
```blade
<x-feedback.empty title="Aucun résultat" description="Modifiez vos filtres." />
```

---

## Progress (`x-feedback.progress`)

Barre de progression linéaire.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `value` | `int` | `0` | Valeur actuelle (0–100) |
| `color` | `string` | `primary` | Couleur de la barre |
| `label` | `bool` | `false` | Afficher le pourcentage |
| `size` | `string` | `md` | Hauteur (`sm`, `md`, `lg`) |

**Exemple :**
```blade
<x-feedback.progress :value="75" color="success" :label="true" />
```

---

## Spinner (`x-feedback.spinner`)

Indicateur de chargement animé.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `size` | `string` | `md` | Taille (`sm`, `md`, `lg`, `xl`) |
| `color` | `string` | `primary` | Couleur |

**Exemple :**
```blade
<x-feedback.spinner size="lg" color="info" />
```

---

## Toast (`x-extra.toast`)

Notification temporaire non intrusive.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `type` | `string` | `info` | Type (`info`, `success`, `warning`, `error`) |
| `title` | `string` | — | Titre du toast |
| `duration` | `int` | `3000` | Durée d'affichage en ms |
| `position` | `string` | `top-right` | Position sur l'écran |

**Exemple :**
```blade
<x-extra.toast type="success" title="Sauvegardé !" />
```

---

## Alert (`x-extra.alert`)

Message d'alerte contextuel.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `type` | `string` | `info` | Type (`info`, `success`, `warning`, `error`) |
| `title` | `string` | — | Titre de l'alerte |
| `dismissible` | `bool` | `false` | Bouton de fermeture |

**Exemple :**
```blade
<x-extra.alert type="warning" title="Attention">
    Veuillez vérifier vos données.
</x-extra.alert>
```

---

## Snackbar (`x-extra.snackbar`)

Notification en bas d'écran (Material-style).

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `message` | `string` | — | Message à afficher |
| `action` | `string` | — | Texte du bouton d'action |
| `duration` | `int` | `4000` | Durée en ms |

**Exemple :**
```blade
<x-extra.snackbar message="Fichier supprimé" action="Annuler" />
```

---

## Confirm Dialog (`x-extra.confirm-dialog`)

Boîte de dialogue de confirmation.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Titre de la confirmation |
| `confirm` | `string` | `Confirmer` | Texte du bouton de confirmation |
| `cancel` | `string` | `Annuler` | Texte du bouton d'annulation |
| `type` | `string` | `warning` | Type visuel (`info`, `warning`, `danger`) |

**Exemple :**
```blade
<x-extra.confirm-dialog title="Supprimer l'article ?">
    Cette action est irréversible.
</x-extra.confirm-dialog>
```

---

## Progress Circular (`x-extra.progress-circular`)

Indicateur de progression circulaire.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `value` | `int` | `0` | Valeur (0–100) |
| `size` | `int` | `80` | Diamètre en pixels |
| `color` | `string` | `primary` | Couleur de l'arc |
| `label` | `bool` | `true` | Afficher le % au centre |

**Exemple :**
```blade
<x-extra.progress-circular :value="72" :size="100" color="success" />
```

---

## Skeleton (`x-extra.skeleton`)

Placeholder animé pendant le chargement.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `lines` | `int` | `3` | Nombre de lignes |
| `avatar` | `bool` | `false` | Afficher un avatar placeholder |
| `image` | `bool` | `false` | Afficher un bloc image placeholder |

**Exemple :**
```blade
<x-extra.skeleton :lines="4" :avatar="true" />
```

---

## Tooltip Arrow (`x-extra.tooltip-arrow`)

Infobulle avec flèche directionnelle.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `text` | `string` | — | Texte de l'infobulle |
| `placement` | `string` | `top` | Position (`top`, `bottom`, `left`, `right`) |

**Exemple :**
```blade
<x-extra.tooltip-arrow text="Aide contextuelle">?</x-extra.tooltip-arrow>
```

---

## Popover Arrow (`x-extra.popover-arrow`)

Popover avec flèche et contenu riche.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Titre du popover |
| `placement` | `string` | `bottom` | Position |

**Exemple :**
```blade
<x-extra.popover-arrow title="Détails">
    Contenu du popover avec flèche.
</x-extra.popover-arrow>
```

---

## Empty Premium (`x-extra.empty-premium`)

État vide enrichi avec illustration et CTA.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `title` | `string` | — | Titre |
| `description` | `string` | — | Description |
| `action` | `string` | — | Texte du bouton d'action |

**Exemple :**
```blade
<x-extra.empty-premium title="Aucun projet" description="Créez votre premier projet." action="Nouveau projet" />
```
