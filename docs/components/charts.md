# Composants Charts

Composants de visualisation de données graphiques.

## Charts (`x-charts.charts`)

Composant de graphiques polyvalent basé sur Chart.js ou une librairie similaire.

| Paramètre | Type | Défaut | Description |
|-----------|------|--------|-------------|
| `type` | `string` | `line` | Type de graphique (`line`, `bar`, `pie`, `doughnut`, `radar`, `polar`) |
| `data` | `array` | — | Données du graphique |
| `labels` | `array` | — | Étiquettes de l'axe X |
| `height` | `int` | `300` | Hauteur du conteneur en pixels |
| `title` | `string` | — | Titre du graphique |
| `legend` | `bool` | `true` | Afficher la légende |
| `colors` | `array` | — | Palette de couleurs personnalisée |

**Exemple :**
```blade
<x-charts.charts
    type="bar"
    :labels="['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun']"
    :data="[
        ['label' => 'Ventes 2024', 'values' => [120, 190, 150, 210, 180, 240]],
        ['label' => 'Ventes 2023', 'values' => [100, 140, 130, 170, 160, 200]],
    ]"
    title="Évolution des ventes"
/>
```

**Types de graphiques :**

### Courbe (line)
```blade
<x-charts.charts type="line" :labels="['Lun','Mar','Mer','Jeu','Ven']" :data="[[
    'label' => 'Visites', 'values' => [150, 230, 180, 290, 210]
]]" />
```

### Barres (bar)
```blade
<x-charts.charts type="bar" :labels="['Q1','Q2','Q3','Q4']" :data="[[
    'label' => 'CA', 'values' => [45000, 62000, 58000, 71000]
]]" />
```

### Circulaire (pie / doughnut)
```blade
<x-charts.charts type="doughnut" :labels="['Chrome','Firefox','Safari','Autre']" :data="[[
    'label' => 'Parts de marché', 'values' => [62, 17, 14, 7]
]]" />
```

---

## Sparkline (`x-extra.sparkline`)

Mini-graphique intégrable dans des tableaux ou cartes de statistiques.

> Voir aussi la documentation dans [data.md](data.md#sparkline-xextrasparkline).

**Exemple d'utilisation combinée avec Statistic :**
```blade
<x-data.statistic title="Revenus" value="3 490 €" trend="up">
    <x-extra.sparkline :data="[30, 45, 28, 55, 43, 70, 65]" />
</x-data.statistic>
```
