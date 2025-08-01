<?php

// Script pour mettre à jour toutes les règles CSS avec les nouveaux thèmes
$cssFile = 'public/css/themes.css';
$cssContent = file_get_contents($cssFile);

// Liste de tous les thèmes (anciens + nouveaux)
$allThemes = [
    'light', 'dark', 'pro', 'enterprise', 'glass', 'neon', 'forest', 'forest-night',
    'sea', 'sakura', 'summer', 'sunset', 'modern', 'minimal', '2d', 'retro',
    'retro80s', 'cyberpunk', 'pastel', 'space', 'coffee', 'vintage', 'monokai',
    'solarized-light', 'solarized-dark'
];

// Règles CSS à mettre à jour
$cssRules = [
    'bg-blue-600' => 'background-color: var(--color-primary) !important;',
    'bg-gray-100' => 'background-color: var(--color-secondary) !important;',
    'bg-red-600' => 'background-color: var(--color-danger) !important;',
    'bg-green-600' => 'background-color: var(--color-success) !important;',
    'text-gray-900' => 'color: var(--color-text) !important;',
    'text-gray-600' => 'color: var(--color-textSecondary) !important;',
    'border-gray-300' => 'border-color: var(--color-border) !important;',
    'bg-white' => 'background-color: var(--color-surface) !important;',
    'hover:bg-blue-700:hover' => 'background-color: var(--color-primary) !important; opacity: 0.8;',
    'hover:bg-gray-200:hover' => 'background-color: var(--color-secondary) !important; opacity: 0.8;',
    'focus:ring-blue-500:focus' => '--tw-ring-color: var(--color-primary) !important;',
    'hover:text-gray-700:hover' => 'color: var(--color-text) !important;',
    'hover:text-gray-900:hover' => 'color: var(--color-text) !important;',
    'focus:ring-opacity-50:focus' => '--tw-ring-opacity: 0.5 !important;',
    'focus:border-blue-500:focus' => 'border-color: var(--color-primary) !important;',
    'shadow-sm' => 'box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;',
    'shadow-xl' => 'box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;',
    'transition-all' => 'transition-property: all !important; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important; transition-duration: 150ms !important;',
    'hover:scale-105:hover' => 'transform: scale(1.05) !important;',
    'hover:shadow-md:hover' => 'box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;',
    'ring-2' => '--tw-ring-color: var(--color-primary) !important;',
    'ring-blue-500' => '--tw-ring-color: var(--color-primary) !important;',
    'bg-gray-50' => 'background-color: var(--color-surface) !important;',
    'bg-gray-200' => 'background-color: var(--color-secondary) !important; opacity: 0.2;',
    'text-xs' => 'font-size: 0.75rem !important; line-height: 1rem !important;',
    'text-sm' => 'font-size: 0.875rem !important; line-height: 1.25rem !important;',
    'p-3' => 'padding: 0.75rem !important;',
    'p-6' => 'padding: 1.5rem !important;',
    'p-8' => 'padding: 2rem !important;',
    'p-10' => 'padding: 2.5rem !important;',
    'border-0' => 'border-width: 0px !important;',
    'shadow-none' => 'box-shadow: 0 0 #0000 !important;',
    'duration-200' => 'transition-duration: 200ms !important;',
    'focus:outline-none:focus' => 'outline: 2px solid transparent !important; outline-offset: 2px !important;',
    'focus:ring-2:focus' => '--tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color) !important; --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color) !important; box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000) !important;',
    'focus:ring-offset-2:focus' => '--tw-ring-offset-width: 2px !important;',
    'disabled:opacity-50:disabled' => 'opacity: 0.5 !important;',
    'disabled:pointer-events-none:disabled' => 'pointer-events: none !important;',
    'animate-spin' => 'animation: spin 1s linear infinite !important;',
    'text-gray-400' => 'color: var(--color-textSecondary) !important;',
    'hover:text-gray-600:hover' => 'color: var(--color-textSecondary) !important;',
    'text-blue-500' => 'color: var(--color-primary) !important;',
    'text-green-500' => 'color: var(--color-success) !important;',
    'text-red-500' => 'color: var(--color-danger) !important;',
    'text-yellow-500' => 'color: var(--color-warning) !important;',
    'border-gray-200' => 'border-color: var(--color-border) !important;',
    'text-gray-700' => 'color: var(--color-text) !important;',
    'text-gray-500' => 'color: var(--color-textSecondary) !important;',
    'hover:bg-gray-100:hover' => 'background-color: var(--color-secondary) !important; opacity: 0.1;',
    'shadow-lg' => 'box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;',
    'bg-blue-100' => 'background-color: var(--color-primary) !important; opacity: 0.1;',
    'bg-red-100' => 'background-color: var(--color-danger) !important; opacity: 0.1;',
    'bg-green-100' => 'background-color: var(--color-success) !important; opacity: 0.1;',
    'bg-yellow-100' => 'background-color: var(--color-warning) !important; opacity: 0.1;',
    'text-blue-800' => 'color: var(--color-primary) !important;',
    'text-red-800' => 'color: var(--color-danger) !important;',
    'text-green-800' => 'color: var(--color-success) !important;',
    'text-yellow-800' => 'color: var(--color-warning) !important;',
    'text-gray-800' => 'color: var(--color-text) !important;',
    'border-red-500' => 'border-color: var(--color-danger) !important;',
    'border-blue-500' => 'border-color: var(--color-primary) !important;'
];

// Mettre à jour chaque règle CSS
foreach ($cssRules as $rule => $property) {
    $pattern = '/\.theme-([a-zA-Z0-9_-]+)\s*\.' . str_replace([':', '\\'], ['\\:', '\\\\'], $rule) . '\s*\{[^}]*\}/';
    
    // Créer la nouvelle règle avec tous les thèmes
    $newRule = "/* Règles pour $rule */\n";
    foreach ($allThemes as $theme) {
        $newRule .= ".theme-$theme .$rule {\n    $property\n}\n\n";
    }
    
    // Remplacer l'ancienne règle
    $cssContent = preg_replace($pattern, $newRule, $cssContent);
}

// Écrire le fichier mis à jour
file_put_contents($cssFile, $cssContent);

echo "Fichier CSS mis à jour avec succès !\n";
echo "Nombre de thèmes traités : " . count($allThemes) . "\n";
echo "Nombre de règles mises à jour : " . count($cssRules) . "\n"; 