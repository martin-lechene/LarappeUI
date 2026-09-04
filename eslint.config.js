import globals from 'globals';

export default [
    {
        files: ['resources/js/**/*.js'],
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: 'module',
            globals: {
                ...globals.browser,
                Alpine: 'readonly',
                ThemeManager: 'readonly',
                Prism: 'readonly',
                LarappeUI: 'readonly',
            },
        },
        rules: {
            'no-unused-vars': 'warn',
            'no-undef': 'error',
        },
    },
    {
        // Fichiers de configuration : contexte Node, pas navigateur.
        files: ['*.config.js'],
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: 'module',
            globals: { ...globals.node },
        },
        rules: {
            'no-unused-vars': 'warn',
            'no-undef': 'error',
        },
    },
];
