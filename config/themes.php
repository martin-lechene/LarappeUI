<?php

/*
|--------------------------------------------------------------------------
| Thèmes LarappeUI
|--------------------------------------------------------------------------
|
| Source de vérité de la liste des thèmes disponibles. Elle doit rester
| synchronisée avec `resources/js/themes.js` (palettes JS) et
| `resources/css/themes.css` (variables CSS). Le test
| `tests/Feature/ThemeConsistencyTest.php` échoue si les trois divergent.
|
*/

return [

    'default' => 'light',

    'available' => [
        'light',
        'dark',
        'pro',
        'enterprise',
        'glass',
        'neon',
        'forest',
        'forest-night',
        'sea',
        'sakura',
        'summer',
        'sunset',
        'modern',
        'minimal',
        '2d',
        'retro',
        'retro80s',
        'cyberpunk',
        'pastel',
        'space',
        'coffee',
        'vintage',
        'monokai',
        'solarized-light',
        'solarized-dark',
    ],

];
