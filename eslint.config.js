import globals from "globals";

export default [
    {
        files: ["resources/js/**/*.js"],
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: "module",
            globals: {
                ...globals.browser,
                Alpine: "readonly",
                ThemeManager: "readonly",
                Prism: "readonly",
            },
        },
        rules: {
            "no-unused-vars": "warn",
            "no-undef": "error",
        },
    },
    {
        // Scripts de build : exécutés par Node, pas par le navigateur.
        files: ["scripts/**/*.mjs", "*.config.js"],
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: "module",
            globals: {
                ...globals.node,
            },
        },
        rules: {
            "no-unused-vars": "warn",
            "no-undef": "error",
        },
    },
    {
        files: ["tests/js/**/*.js"],
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: "module",
            globals: {
                ...globals.browser,
                ...globals.node,
            },
        },
        rules: {
            "no-unused-vars": "warn",
            "no-undef": "error",
        },
    },
];
