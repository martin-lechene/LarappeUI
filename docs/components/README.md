# Catalogue des composants

LarappeUI propose **92 composants Blade** organisés par catégorie pour couvrir tous les besoins d'UI.

## Catégories

| Catégorie | Fichier | Composants inclus |
|-----------|---------|-------------------|
| Formulaires | [form.md](form.md) | Input, Select, Checkbox, Switch, Textarea, Radio, Slider, Upload, TextEditor, Autocomplete, Combobox, Mentions |
| Layout | [layout.md](layout.md) | Card, Collapse, Divider, Drawer, Popover, Tooltip, Section Header, Modal, Masonry, Split Pane |
| Feedback | [feedback.md](feedback.md) | Badge, Empty, Progress, Spinner, Toast, Alert, Snackbar, Confirm Dialog, Progress Circular, Skeleton, Tooltip Arrow, Popover Arrow, Empty Premium |
| Data | [data.md](data.md) | Pagination, Statistic, Stepper, Timeline, Descriptions, Data Table, Data Table Pro, Kanban, Pagination Compact, Sparkline, Radial Gauge, Heatmap, Map Markers, JSON Viewer |
| Navigation | [navigation.md](navigation.md) | Affix, Anchor, Breadcrumbs, Sidebar, Dropdown, Tabs, Segmented Tabs, Vertical Tabs, Mega Menu, Breadcrumbs Overflow, Command Palette, Context Menu, Tree View, Table of Contents, Coachmarks |
| Media | [media.md](media.md) | Avatar, Image, Avatar Group, Gallery |
| Charts | [charts.md](charts.md) | Charts (line, bar, pie, doughnut, radar, polar), Sparkline |
| Extra (avancés) | [extra.md](extra.md) | OTP Input, Rating, Date Range, Time Picker, Dropzone, Tag Input, Phone Input, Slider Range, Markdown Editor, Select Async, Combobox Virtual, Select Tags |

## Composants de base

Ces composants sont disponibles directement à la racine (`x-<nom>`) :

| Composant | Usage |
|-----------|-------|
| `x-button` | Bouton avec variantes de couleur et taille |
| `x-input` | Champ de saisie global |
| `x-card` | Carte de base |
| `x-calendar` | Calendrier interactif |
| `x-dropdown` | Menu déroulant |
| `x-tag` | Étiquette/badge simple |

## Structure des fichiers

```
resources/views/components/
├── button.blade.php
├── calendar.blade.php
├── card.blade.php
├── dropdown.blade.php
├── input.blade.php
├── tag.blade.php
├── charts/
│   └── charts.blade.php
├── data/
│   ├── descriptions.blade.php
│   ├── pagination.blade.php
│   ├── statistic.blade.php
│   ├── stepper.blade.php
│   └── timeline.blade.php
├── extra/                    (46 composants avancés)
├── feedback/
│   ├── badge.blade.php
│   ├── empty.blade.php
│   ├── progress.blade.php
│   └── spinner.blade.php
├── form/
│   ├── autocomplete.blade.php
│   ├── checkbox.blade.php
│   ├── combobox.blade.php
│   ├── form.blade.php
│   ├── formcontrol.blade.php
│   ├── input.blade.php
│   ├── mentions.blade.php
│   ├── radio.blade.php
│   ├── select.blade.php
│   ├── slider.blade.php
│   ├── switch.blade.php
│   ├── textarea.blade.php
│   ├── texteditor.blade.php
│   └── upload.blade.php
├── layout/
│   ├── card.blade.php
│   ├── collapse.blade.php
│   ├── divider.blade.php
│   ├── drawer.blade.php
│   ├── popover.blade.php
│   └── tooltip.blade.php
├── media/
│   ├── avatar.blade.php
│   └── image.blade.php
└── navigation/
    ├── affix.blade.php
    ├── anchor.blade.php
    ├── breadcrumbs.blade.php
    └── sidebar.blade.php
```

Pour chaque composant, tu trouveras :
- Description
- Tableau des paramètres
- Slots/events disponibles
- Exemples d'utilisation
- Astuces ou cas d'usage avancés
