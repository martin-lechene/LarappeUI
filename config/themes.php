<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Catalogue des themes LarappeUI
|--------------------------------------------------------------------------
|
| Source unique de verite. Le ThemeController valide contre ce fichier, le
| layout injecte les palettes dans la page, et tests/Feature/ThemeCatalogTest
| verifie que resources/css/themes.css declare exactement le meme ensemble.
|
| Ne pas rederiver cette liste ailleurs : c'est la desynchronisation entre
| public/css/themes.css, public/js/themes-manager.js et resources/ qui rendait
| 22 themes inaccessibles et en faisait accepter 9 sans definition.
|
| 25 themes selectionnables, 34 palettes, 6 alias.
|
| Contraste : 99 des 102 paires texte/fond passent WCAG AA (>= 4.5:1).
| Les trois exceptions sont dans la famille solarized, dont les valeurs sont
| celles de la palette officielle d'Ethan Schoonover :
|   solarized-dark  texte/surface           4.11:1
|   solarized-light texte/surface           4.39:1
|   solarized-light texteSecondaire/surface 3.64:1
| Solarized est volontairement peu contraste ; corriger ces teintes reviendrait
| a ne plus livrer Solarized. Arbitrage assume, a revoir si l'accessibilite doit
| primer sur la fidelite de la palette.
|
*/

return [

    /*
     | Palettes completes, indexees par nom de theme. Chaque palette expose les
     | 12 roles de couleur consommes par themes-manager.js et par les vues.
     */
    'palettes' => [

        '2d' => [
            'primary' => '#ff6b6b',
            'secondary' => '#4ecdc4',
            'success' => '#2ecc71',
            'warning' => '#f1c40f',
            'danger' => '#e74c3c',
            'info' => '#3498db',
            'background' => '#ffffff',
            'surface' => '#f8f9fb',
            'text' => '#1f2937',
            'textSecondary' => '#6b7280',
            'border' => '#e5e7eb',
            'accent' => '#ffa502',
        ],

        '2d-dark' => [
            'primary' => '#ff8787',
            'secondary' => '#6fe3da',
            'success' => '#34d399',
            'warning' => '#facc15',
            'danger' => '#fb7185',
            'info' => '#60a5fa',
            'background' => '#0f172a',
            'surface' => '#111827',
            'text' => '#e5e7eb',
            'textSecondary' => '#9ca3af',
            'border' => '#374151',
            'accent' => '#ffb84d',
        ],

        'coffee' => [
            'primary' => '#92400e',
            'secondary' => '#a16207',
            'success' => '#059669',
            'warning' => '#d97706',
            'danger' => '#dc2626',
            'info' => '#0891b2',
            'background' => '#fef3c7',
            'surface' => '#fde68a',
            'text' => '#451a03',
            'textSecondary' => '#78350f',
            'border' => '#fbbf24',
            'accent' => '#b45309',
        ],

        'cyberpunk' => [
            'primary' => '#00ffff',
            'secondary' => '#ff00ff',
            'success' => '#00ff00',
            'warning' => '#ffff00',
            'danger' => '#ff0000',
            'info' => '#0000ff',
            'background' => '#000000',
            'surface' => '#1a1a1a',
            'text' => '#ffffff',
            'textSecondary' => '#cccccc',
            'border' => '#333333',
            'accent' => '#ff6600',
        ],

        'dark' => [
            'primary' => '#60a5fa',
            'secondary' => '#9ca3af',
            'success' => '#34d399',
            'warning' => '#fbbf24',
            'danger' => '#f87171',
            'info' => '#22d3ee',
            'background' => '#111827',
            'surface' => '#1f2937',
            'text' => '#f9fafb',
            'textSecondary' => '#d1d5db',
            'border' => '#374151',
            'accent' => '#fb923c',
        ],

        'enterprise' => [
            'primary' => '#1e40af',
            'secondary' => '#4b5563',
            'success' => '#047857',
            'warning' => '#b45309',
            'danger' => '#b91c1c',
            'info' => '#0e7490',
            'background' => '#ffffff',
            'surface' => '#f9fafb',
            'text' => '#111827',
            'textSecondary' => '#6b7280',
            'border' => '#d1d5db',
            'accent' => '#ea580c',
        ],

        'forest' => [
            'primary' => '#059669',
            'secondary' => '#6b7280',
            'success' => '#10b981',
            'warning' => '#f59e0b',
            'danger' => '#ef4444',
            'info' => '#06b6d4',
            'background' => '#f0fdf4',
            'surface' => '#ecfdf5',
            'text' => '#064e3b',
            'textSecondary' => '#065f46',
            'border' => '#bbf7d0',
            'accent' => '#16a34a',
        ],

        'forest-night' => [
            'primary' => '#10b981',
            'secondary' => '#6b7280',
            'success' => '#34d399',
            'warning' => '#fbbf24',
            'danger' => '#f87171',
            'info' => '#22d3ee',
            'background' => '#0f172a',
            'surface' => '#1e293b',
            'text' => '#f1f5f9',
            'textSecondary' => '#cbd5e1',
            'border' => '#334155',
            'accent' => '#059669',
        ],

        'glass' => [
            'primary' => 'rgba(59, 130, 246, 0.8)',
            'secondary' => 'rgba(107, 114, 128, 0.8)',
            'success' => 'rgba(16, 185, 129, 0.8)',
            'warning' => 'rgba(245, 158, 11, 0.8)',
            'danger' => 'rgba(239, 68, 68, 0.8)',
            'info' => 'rgba(6, 182, 212, 0.8)',
            'background' => 'rgba(255, 255, 255, 0.7)',
            'surface' => 'rgba(255, 255, 255, 0.55)',
            'text' => '#0f172a',
            'textSecondary' => '#475569',
            'border' => 'rgba(229, 231, 235, 0.4)',
            'accent' => 'rgba(245, 158, 66, 0.8)',
        ],

        'glass-dark' => [
            'primary' => 'rgba(96, 165, 250, 0.8)',
            'secondary' => 'rgba(156, 163, 175, 0.8)',
            'success' => 'rgba(52, 211, 153, 0.8)',
            'warning' => 'rgba(251, 191, 36, 0.8)',
            'danger' => 'rgba(248, 113, 113, 0.8)',
            'info' => 'rgba(34, 211, 238, 0.8)',
            'background' => 'rgba(15, 23, 42, 0.7)',
            'surface' => 'rgba(17, 24, 39, 0.55)',
            'text' => '#e2e8f0',
            'textSecondary' => '#94a3b8',
            'border' => 'rgba(55, 65, 81, 0.6)',
            'accent' => 'rgba(251, 146, 60, 0.8)',
        ],

        'light' => [
            'primary' => '#3b82f6',
            'secondary' => '#6b7280',
            'success' => '#10b981',
            'warning' => '#f59e0b',
            'danger' => '#ef4444',
            'info' => '#06b6d4',
            'background' => '#ffffff',
            'surface' => '#f9fafb',
            'text' => '#111827',
            'textSecondary' => '#6b7280',
            'border' => '#e5e7eb',
            'accent' => '#f59e42',
        ],

        'minimal' => [
            'primary' => '#000000',
            'secondary' => '#6b7280',
            'success' => '#000000',
            'warning' => '#000000',
            'danger' => '#000000',
            'info' => '#000000',
            'background' => '#ffffff',
            'surface' => '#f9fafb',
            'text' => '#000000',
            'textSecondary' => '#6b7280',
            'border' => '#e5e7eb',
            'accent' => '#000000',
        ],

        'modern' => [
            'primary' => '#8b5cf6',
            'secondary' => '#64748b',
            'success' => '#10b981',
            'warning' => '#f59e0b',
            'danger' => '#ef4444',
            'info' => '#06b6d4',
            'background' => '#ffffff',
            'surface' => '#f8fafc',
            'text' => '#0f172a',
            'textSecondary' => '#475569',
            'border' => '#e2e8f0',
            'accent' => '#a855f7',
        ],

        'monokai' => [
            'primary' => '#f92672',
            'secondary' => '#a6e22e',
            'success' => '#a6e22e',
            'warning' => '#fd971f',
            'danger' => '#f92672',
            'info' => '#66d9ef',
            'background' => '#272822',
            'surface' => '#3e3d32',
            'text' => '#f8f8f2',
            'textSecondary' => '#b3ae99',
            'border' => '#75715e',
            'accent' => '#ae81ff',
        ],

        'neon' => [
            'primary' => '#00ff88',
            'secondary' => '#ff00ff',
            'success' => '#00ff00',
            'warning' => '#ffff00',
            'danger' => '#ff0080',
            'info' => '#00ffff',
            'background' => '#000000',
            'surface' => '#1a1a1a',
            'text' => '#ffffff',
            'textSecondary' => '#cccccc',
            'border' => '#333333',
            'accent' => '#ff6600',
        ],

        'ocean' => [
            'primary' => '#0ea5e9',
            'secondary' => '#38bdf8',
            'success' => '#10b981',
            'warning' => '#f59e0b',
            'danger' => '#ef4444',
            'info' => '#06b6d4',
            'background' => '#f0f9ff',
            'surface' => '#e0f2fe',
            'text' => '#0c4a6e',
            'textSecondary' => '#0f766e',
            'border' => '#bae6fd',
            'accent' => '#0284c7',
        ],

        'ocean-dark' => [
            'primary' => '#38bdf8',
            'secondary' => '#7dd3fc',
            'success' => '#34d399',
            'warning' => '#fbbf24',
            'danger' => '#f87171',
            'info' => '#22d3ee',
            'background' => '#0b1020',
            'surface' => '#0f172a',
            'text' => '#e2e8f0',
            'textSecondary' => '#94a3b8',
            'border' => '#1f2a44',
            'accent' => '#22d3ee',
        ],

        'oldschool' => [
            'primary' => '#2d3436',
            'secondary' => '#636e72',
            'success' => '#00b894',
            'warning' => '#fdcb6e',
            'danger' => '#d63031',
            'info' => '#0984e3',
            'background' => '#ffffff',
            'surface' => '#f8f9fa',
            'text' => '#2d3436',
            'textSecondary' => '#636e72',
            'border' => '#dddddd',
            'accent' => '#0984e3',
        ],

        'oldschool-dark' => [
            'primary' => '#dfe6e9',
            'secondary' => '#b2bec3',
            'success' => '#55efc4',
            'warning' => '#ffeaa7',
            'danger' => '#ff7675',
            'info' => '#74b9ff',
            'background' => '#1a1a1a',
            'surface' => '#222222',
            'text' => '#ecf0f1',
            'textSecondary' => '#bdc3c7',
            'border' => '#333333',
            'accent' => '#74b9ff',
        ],

        'pastel' => [
            'primary' => '#ffb3ba',
            'secondary' => '#baffc9',
            'success' => '#bae1ff',
            'warning' => '#ffffba',
            'danger' => '#ffb3ba',
            'info' => '#b3d9ff',
            'background' => '#ffffff',
            'surface' => '#f8f9fa',
            'text' => '#2d3436',
            'textSecondary' => '#636e72',
            'border' => '#ddd',
            'accent' => '#ffcccb',
        ],

        'pro' => [
            'primary' => '#6366f1',
            'secondary' => '#64748b',
            'success' => '#059669',
            'warning' => '#d97706',
            'danger' => '#dc2626',
            'info' => '#0891b2',
            'background' => '#ffffff',
            'surface' => '#f8fafc',
            'text' => '#0f172a',
            'textSecondary' => '#475569',
            'border' => '#e2e8f0',
            'accent' => '#f97316',
        ],

        'retro' => [
            'primary' => '#ff6b35',
            'secondary' => '#f7931e',
            'success' => '#4ecdc4',
            'warning' => '#ffe66d',
            'danger' => '#ff6b6b',
            'info' => '#45b7d1',
            'background' => '#f7f1e3',
            'surface' => '#e8d5c4',
            'text' => '#2d3436',
            'textSecondary' => '#4f585b',
            'border' => '#ddd',
            'accent' => '#ffa502',
        ],

        'retro80s' => [
            'primary' => '#ff0080',
            'secondary' => '#00ffff',
            'success' => '#00ff00',
            'warning' => '#ffff00',
            'danger' => '#ff0000',
            'info' => '#0000ff',
            'background' => '#000000',
            'surface' => '#1a1a1a',
            'text' => '#ffffff',
            'textSecondary' => '#cccccc',
            'border' => '#333333',
            'accent' => '#ff6600',
        ],

        'sakura' => [
            'primary' => '#ec4899',
            'secondary' => '#f472b6',
            'success' => '#10b981',
            'warning' => '#fbbf24',
            'danger' => '#f87171',
            'info' => '#06b6d4',
            'background' => '#fdf2f8',
            'surface' => '#fce7f3',
            'text' => '#831843',
            'textSecondary' => '#be185d',
            'border' => '#fbcfe8',
            'accent' => '#db2777',
        ],

        'sea' => [
            'primary' => '#0ea5e9',
            'secondary' => '#64748b',
            'success' => '#10b981',
            'warning' => '#f59e0b',
            'danger' => '#ef4444',
            'info' => '#06b6d4',
            'background' => '#f0f9ff',
            'surface' => '#e0f2fe',
            'text' => '#0c4a6e',
            'textSecondary' => '#0f766e',
            'border' => '#bae6fd',
            'accent' => '#0284c7',
        ],

        'solarized-dark' => [
            'primary' => '#268bd2',
            'secondary' => '#839496',
            'success' => '#859900',
            'warning' => '#b58900',
            'danger' => '#dc322f',
            'info' => '#2aa198',
            'background' => '#002b36',
            'surface' => '#073642',
            'text' => '#839496',
            'textSecondary' => '#93a1a1',
            'border' => '#586e75',
            'accent' => '#cb4b16',
        ],

        'solarized-light' => [
            'primary' => '#268bd2',
            'secondary' => '#586e75',
            'success' => '#859900',
            'warning' => '#b58900',
            'danger' => '#dc322f',
            'info' => '#2aa198',
            'background' => '#fdf6e3',
            'surface' => '#eee8d5',
            'text' => '#586e75',
            'textSecondary' => '#657b83',
            'border' => '#93a1a1',
            'accent' => '#cb4b16',
        ],

        'space' => [
            'primary' => '#6366f1',
            'secondary' => '#8b5cf6',
            'success' => '#10b981',
            'warning' => '#f59e0b',
            'danger' => '#ef4444',
            'info' => '#06b6d4',
            'background' => '#0f172a',
            'surface' => '#1e293b',
            'text' => '#f1f5f9',
            'textSecondary' => '#cbd5e1',
            'border' => '#334155',
            'accent' => '#a855f7',
        ],

        'summer' => [
            'primary' => '#f59e0b',
            'secondary' => '#fbbf24',
            'success' => '#10b981',
            'warning' => '#f59e0b',
            'danger' => '#ef4444',
            'info' => '#06b6d4',
            'background' => '#fffbeb',
            'surface' => '#fef3c7',
            'text' => '#92400e',
            'textSecondary' => '#b45309',
            'border' => '#fed7aa',
            'accent' => '#d97706',
        ],

        'summer-dark' => [
            'primary' => '#fbbf24',
            'secondary' => '#fde68a',
            'success' => '#34d399',
            'warning' => '#f59e0b',
            'danger' => '#f87171',
            'info' => '#22d3ee',
            'background' => '#181204',
            'surface' => '#1f1403',
            'text' => '#fde68a',
            'textSecondary' => '#fcd34d',
            'border' => '#3b2f12',
            'accent' => '#f59e0b',
        ],

        'sunset' => [
            'primary' => '#f97316',
            'secondary' => '#6b7280',
            'success' => '#10b981',
            'warning' => '#f59e0b',
            'danger' => '#ef4444',
            'info' => '#06b6d4',
            'background' => '#fff7ed',
            'surface' => '#fed7aa',
            'text' => '#7c2d12',
            'textSecondary' => '#9a3412',
            'border' => '#fdba74',
            'accent' => '#ea580c',
        ],

        'vintage' => [
            'primary' => '#8b4513',
            'secondary' => '#a0522d',
            'success' => '#228b22',
            'warning' => '#daa520',
            'danger' => '#cd5c5c',
            'info' => '#4682b4',
            'background' => '#f5f5dc',
            'surface' => '#faf0e6',
            'text' => '#2f1b14',
            'textSecondary' => '#654321',
            'border' => '#deb887',
            'accent' => '#d2691e',
        ],

        'winter' => [
            'primary' => '#60a5fa',
            'secondary' => '#93c5fd',
            'success' => '#22c55e',
            'warning' => '#f59e0b',
            'danger' => '#f87171',
            'info' => '#0ea5e9',
            'background' => '#f8fafc',
            'surface' => '#f1f5f9',
            'text' => '#0f172a',
            'textSecondary' => '#475569',
            'border' => '#e2e8f0',
            'accent' => '#2563eb',
        ],

        'winter-dark' => [
            'primary' => '#93c5fd',
            'secondary' => '#bfdbfe',
            'success' => '#34d399',
            'warning' => '#fbbf24',
            'danger' => '#fb7185',
            'info' => '#38bdf8',
            'background' => '#0b1220',
            'surface' => '#0f172a',
            'text' => '#e2e8f0',
            'textSecondary' => '#94a3b8',
            'border' => '#1f2a44',
            'accent' => '#a5b4fc',
        ],

    ],

    /*
     | Alias historiques : `x-light` designe le theme clair `x`. Conserves pour
     | ne pas casser les sessions et les localStorage existants.
     */
    'aliases' => [
        '2d-light' => '2d',
        'glass-light' => 'glass',
        'ocean-light' => 'ocean',
        'oldschool-light' => 'oldschool',
        'summer-light' => 'summer',
        'winter-light' => 'winter',
    ],

    /*
     | Variante sombre de chaque theme qui en possede une. Pilote l'interrupteur
     | Light/Dark de la sidebar : les themes absents de cette table n'ont pas de
     | pendant sombre et l'interrupteur y est desactive.
     */
    'dark_of' => [
        'light' => 'dark',
        '2d' => '2d-dark',
        'glass' => 'glass-dark',
        'ocean' => 'ocean-dark',
        'oldschool' => 'oldschool-dark',
        'summer' => 'summer-dark',
        'winter' => 'winter-dark',
        'solarized-light' => 'solarized-dark',
        'forest' => 'forest-night',
    ],

    /*
     | Themes proposes dans le selecteur : toutes les palettes sauf les variantes
     | sombres, qui sont atteintes via l'interrupteur.
     */
    'selectable' => [
        '2d',
        'coffee',
        'cyberpunk',
        'enterprise',
        'forest',
        'glass',
        'light',
        'minimal',
        'modern',
        'monokai',
        'neon',
        'ocean',
        'oldschool',
        'pastel',
        'pro',
        'retro',
        'retro80s',
        'sakura',
        'sea',
        'solarized-light',
        'space',
        'summer',
        'sunset',
        'vintage',
        'winter',
    ],

    'default' => 'light',

];
