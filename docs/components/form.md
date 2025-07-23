# Composants — Formulaires

## `<x-form.input>`

Champ de saisie polyvalent, supporte préfixe/suffixe, effaçable, erreurs, aide, tous types HTML.

| Paramètre      | Type      | Défaut   | Description                                 |
|---------------|-----------|----------|---------------------------------------------|
| type          | string    | 'text'   | Type d’input HTML (text, email, number...)  |
| label         | string    | null     | Libellé affiché au-dessus                   |
| placeholder   | string    | null     | Texte d’exemple                             |
| value         | mixed     | null     | Valeur initiale                            |
| disabled      | bool      | false    | Désactive le champ                          |
| readonly      | bool      | false    | Lecture seule                               |
| error         | string/bool | null   | Message ou état d’erreur                    |
| helpText      | string    | null     | Texte d’aide                                |
| prefix        | HTML      | null     | Élément avant l’input                       |
| suffix        | HTML      | null     | Élément après l’input                       |
| clearable     | bool      | false    | Bouton pour effacer                         |
| autofocus     | bool      | false    | Autofocus                                   |
| maxlength     | int       | null     | Longueur max                                |
| minlength     | int       | null     | Longueur min                                |
| step          | int       | null     | Pas (pour number)                           |
| min           | int       | null     | Valeur min                                  |
| max           | int       | null     | Valeur max                                  |

**Exemple :**
```blade
<x-form.input label="Email" placeholder="Votre email" />
```

---

## `<x-form.select>`

Select avancé, supporte optgroup, recherche, multi, tags, loading, icônes, effaçable.

| Paramètre      | Type      | Défaut   | Description                                 |
|---------------|-----------|----------|---------------------------------------------|
| label         | string    | null     | Libellé affiché au-dessus                   |
| placeholder   | string    | null     | Texte d’exemple                             |
| value         | mixed     | null     | Valeur sélectionnée                         |
| disabled      | bool      | false    | Désactive le champ                          |
| error         | string/bool | null   | Message ou état d’erreur                    |
| clearable     | bool      | false    | Bouton pour effacer                         |
| searchable    | bool      | false    | Active la recherche                         |
| multiple      | bool      | false    | Sélection multiple                          |
| loading       | bool      | false    | Affiche un spinner                          |
| optionLabel   | string    | 'label'  | Clé pour le label dans options               |
| optionValue   | string    | 'value'  | Clé pour la valeur dans options              |
| options       | array     | []       | Liste des options ou optgroups               |
| taggable      | bool      | false    | Permet d’ajouter des tags                   |
| slot          | slot      |          | Slot pour options custom                     |

**Exemple :**
```blade
<x-form.select :options="['Option 1', 'Option 2']" />
```

---

## `<x-form.checkbox>`

Case à cocher, indéterminée, gestion d’erreur, label, nom, valeur.

| Paramètre      | Type      | Défaut   | Description                                 |
|---------------|-----------|----------|---------------------------------------------|
| label         | string    | null     | Texte du label                              |
| checked       | bool      | false    | Case cochée                                 |
| disabled      | bool      | false    | Désactive le champ                          |
| error         | string/bool | false  | Message ou état d’erreur                    |
| indeterminate | bool      | false    | État indéterminé                            |
| value         | mixed     | null     | Valeur envoyée                              |
| name          | string    | null     | Nom du champ                                |

**Exemple :**
```blade
<x-form.checkbox label="Accepter les conditions" />
```

---

## `<x-form.radio>`

Boutons radio, options [{label, value}], inline ou colonne, gestion d’erreur.

| Paramètre      | Type      | Défaut   | Description                                 |
|---------------|-----------|----------|---------------------------------------------|
| options       | array     | []       | Liste des options [{label, value}]           |
| label         | string    | null     | Texte du label                              |
| value         | mixed     | null     | Valeur sélectionnée                         |
| disabled      | bool      | false    | Désactive le champ                          |
| error         | string/bool | false  | Message ou état d’erreur                    |
| name          | string    | null     | Nom du champ                                |
| inline        | bool      | false    | Affichage en ligne                          |
| slot          | slot      |          | Slot pour options custom                    |

**Exemple :**
```blade
<x-form.radio :options="[['label'=>'Oui','value'=>1],['label'=>'Non','value'=>0]]" />
```

---

## `<x-form.switch>`

Switch on/off stylé, label, nom, valeur.

| Paramètre      | Type      | Défaut   | Description                                 |
|---------------|-----------|----------|---------------------------------------------|
| checked       | bool      | false    | Switch activé                               |
| label         | string    | null     | Texte du label                              |
| disabled      | bool      | false    | Désactive le champ                          |
| value         | mixed     | null     | Valeur envoyée                              |
| name          | string    | null     | Nom du champ                                |

**Exemple :**
```blade
<x-form.switch label="Actif" />
```

---

## `<x-form.textarea>`

Zone de texte multi-lignes, préfixe/suffixe, effaçable, erreurs, nombre de lignes.

| Paramètre      | Type      | Défaut   | Description                                 |
|---------------|-----------|----------|---------------------------------------------|
| label         | string    | null     | Libellé affiché au-dessus                   |
| value         | mixed     | null     | Valeur initiale                            |
| placeholder   | string    | null     | Texte d’exemple                             |
| disabled      | bool      | false    | Désactive le champ                          |
| readonly      | bool      | false    | Lecture seule                               |
| error         | string/bool | null   | Message ou état d’erreur                    |
| prefix        | HTML      | null     | Élément avant la textarea                   |
| suffix        | HTML      | null     | Élément après la textarea                   |
| clearable     | bool      | false    | Bouton pour effacer                         |
| maxlength     | int       | null     | Longueur max                                |
| minlength     | int       | null     | Longueur min                                |
| rows          | int       | 3        | Nombre de lignes                            |

**Exemple :**
```blade
<x-form.textarea label="Message" rows="5" />
``` 