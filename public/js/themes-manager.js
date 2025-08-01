/**
 * ThemeManager - Gestionnaire de thèmes unifié pour LarappeUI
 */
class ThemeManager {
    constructor() {
        this.currentTheme = "light";
        this.themes = {
            light: {
                primary: "#3b82f6",
                secondary: "#6b7280",
                success: "#10b981",
                warning: "#f59e0b",
                danger: "#ef4444",
                info: "#06b6d4",
                background: "#ffffff",
                surface: "#f9fafb",
                text: "#111827",
                textSecondary: "#6b7280",
                border: "#e5e7eb",
                accent: "#f59e42",
            },
            dark: {
                primary: "#60a5fa",
                secondary: "#9ca3af",
                success: "#34d399",
                warning: "#fbbf24",
                danger: "#f87171",
                info: "#22d3ee",
                background: "#111827",
                surface: "#1f2937",
                text: "#f9fafb",
                textSecondary: "#d1d5db",
                border: "#374151",
                accent: "#fb923c",
            },
            pro: {
                primary: "#6366f1",
                secondary: "#64748b",
                success: "#059669",
                warning: "#d97706",
                danger: "#dc2626",
                info: "#0891b2",
                background: "#ffffff",
                surface: "#f8fafc",
                text: "#0f172a",
                textSecondary: "#475569",
                border: "#e2e8f0",
                accent: "#f97316",
            },
            enterprise: {
                primary: "#1e40af",
                secondary: "#4b5563",
                success: "#047857",
                warning: "#b45309",
                danger: "#b91c1c",
                info: "#0e7490",
                background: "#ffffff",
                surface: "#f9fafb",
                text: "#111827",
                textSecondary: "#6b7280",
                border: "#d1d5db",
                accent: "#ea580c",
            },
            glass: {
                primary: "rgba(59, 130, 246, 0.8)",
                secondary: "rgba(107, 114, 128, 0.8)",
                success: "rgba(16, 185, 129, 0.8)",
                warning: "rgba(245, 158, 11, 0.8)",
                danger: "rgba(239, 68, 68, 0.8)",
                info: "rgba(6, 182, 212, 0.8)",
                background: "rgba(255, 255, 255, 0.1)",
                surface: "rgba(249, 250, 251, 0.1)",
                text: "#111827",
                textSecondary: "#6b7280",
                border: "rgba(229, 231, 235, 0.3)",
                accent: "rgba(245, 158, 66, 0.8)",
            },
            neon: {
                primary: "#00ff88",
                secondary: "#ff00ff",
                success: "#00ff00",
                warning: "#ffff00",
                danger: "#ff0080",
                info: "#00ffff",
                background: "#000000",
                surface: "#1a1a1a",
                text: "#ffffff",
                textSecondary: "#cccccc",
                border: "#333333",
                accent: "#ff6600",
            },
            forest: {
                primary: "#059669",
                secondary: "#6b7280",
                success: "#10b981",
                warning: "#f59e0b",
                danger: "#ef4444",
                info: "#06b6d4",
                background: "#f0fdf4",
                surface: "#ecfdf5",
                text: "#064e3b",
                textSecondary: "#065f46",
                border: "#bbf7d0",
                accent: "#16a34a",
            },
            "forest-night": {
                primary: "#10b981",
                secondary: "#6b7280",
                success: "#34d399",
                warning: "#fbbf24",
                danger: "#f87171",
                info: "#22d3ee",
                background: "#0f172a",
                surface: "#1e293b",
                text: "#f1f5f9",
                textSecondary: "#cbd5e1",
                border: "#334155",
                accent: "#059669",
            },
            sea: {
                primary: "#0ea5e9",
                secondary: "#64748b",
                success: "#10b981",
                warning: "#f59e0b",
                danger: "#ef4444",
                info: "#06b6d4",
                background: "#f0f9ff",
                surface: "#e0f2fe",
                text: "#0c4a6e",
                textSecondary: "#0f766e",
                border: "#bae6fd",
                accent: "#0284c7",
            },
            sakura: {
                primary: "#ec4899",
                secondary: "#f472b6",
                success: "#10b981",
                warning: "#fbbf24",
                danger: "#f87171",
                info: "#06b6d4",
                background: "#fdf2f8",
                surface: "#fce7f3",
                text: "#831843",
                textSecondary: "#be185d",
                border: "#fbcfe8",
                accent: "#db2777",
            },
            summer: {
                primary: "#f59e0b",
                secondary: "#fbbf24",
                success: "#10b981",
                warning: "#f59e0b",
                danger: "#ef4444",
                info: "#06b6d4",
                background: "#fffbeb",
                surface: "#fef3c7",
                text: "#92400e",
                textSecondary: "#b45309",
                border: "#fed7aa",
                accent: "#d97706",
            },
            sunset: {
                primary: "#f97316",
                secondary: "#6b7280",
                success: "#10b981",
                warning: "#f59e0b",
                danger: "#ef4444",
                info: "#06b6d4",
                background: "#fff7ed",
                surface: "#fed7aa",
                text: "#7c2d12",
                textSecondary: "#9a3412",
                border: "#fdba74",
                accent: "#ea580c",
            },
            modern: {
                primary: "#8b5cf6",
                secondary: "#64748b",
                success: "#10b981",
                warning: "#f59e0b",
                danger: "#ef4444",
                info: "#06b6d4",
                background: "#ffffff",
                surface: "#f8fafc",
                text: "#0f172a",
                textSecondary: "#475569",
                border: "#e2e8f0",
                accent: "#a855f7",
            },
            minimal: {
                primary: "#000000",
                secondary: "#6b7280",
                success: "#000000",
                warning: "#000000",
                danger: "#000000",
                info: "#000000",
                background: "#ffffff",
                surface: "#f9fafb",
                text: "#000000",
                textSecondary: "#6b7280",
                border: "#e5e7eb",
                accent: "#000000",
            },
            "2d": {
                primary: "#ff6b6b",
                secondary: "#4ecdc4",
                success: "#45b7d1",
                warning: "#f7b731",
                danger: "#ee5a24",
                info: "#a55eea",
                background: "#ffffff",
                surface: "#f8f9fa",
                text: "#2d3436",
                textSecondary: "#636e72",
                border: "#ddd",
                accent: "#ffa502",
            },
            retro: {
                primary: "#ff6b35",
                secondary: "#f7931e",
                success: "#4ecdc4",
                warning: "#ffe66d",
                danger: "#ff6b6b",
                info: "#45b7d1",
                background: "#f7f1e3",
                surface: "#e8d5c4",
                text: "#2d3436",
                textSecondary: "#636e72",
                border: "#ddd",
                accent: "#ffa502",
            },
            retro80s: {
                primary: "#ff0080",
                secondary: "#00ffff",
                success: "#00ff00",
                warning: "#ffff00",
                danger: "#ff0000",
                info: "#0000ff",
                background: "#000000",
                surface: "#1a1a1a",
                text: "#ffffff",
                textSecondary: "#cccccc",
                border: "#333333",
                accent: "#ff6600",
            },
            cyberpunk: {
                primary: "#00ffff",
                secondary: "#ff00ff",
                success: "#00ff00",
                warning: "#ffff00",
                danger: "#ff0000",
                info: "#0000ff",
                background: "#000000",
                surface: "#1a1a1a",
                text: "#ffffff",
                textSecondary: "#cccccc",
                border: "#333333",
                accent: "#ff6600",
            },
            pastel: {
                primary: "#ffb3ba",
                secondary: "#baffc9",
                success: "#bae1ff",
                warning: "#ffffba",
                danger: "#ffb3ba",
                info: "#b3d9ff",
                background: "#ffffff",
                surface: "#f8f9fa",
                text: "#2d3436",
                textSecondary: "#636e72",
                border: "#ddd",
                accent: "#ffcccb",
            },
            space: {
                primary: "#6366f1",
                secondary: "#8b5cf6",
                success: "#10b981",
                warning: "#f59e0b",
                danger: "#ef4444",
                info: "#06b6d4",
                background: "#0f172a",
                surface: "#1e293b",
                text: "#f1f5f9",
                textSecondary: "#cbd5e1",
                border: "#334155",
                accent: "#a855f7",
            },
            coffee: {
                primary: "#92400e",
                secondary: "#a16207",
                success: "#059669",
                warning: "#d97706",
                danger: "#dc2626",
                info: "#0891b2",
                background: "#fef3c7",
                surface: "#fde68a",
                text: "#451a03",
                textSecondary: "#78350f",
                border: "#fbbf24",
                accent: "#b45309",
            },
            vintage: {
                primary: "#8b4513",
                secondary: "#a0522d",
                success: "#228b22",
                warning: "#daa520",
                danger: "#cd5c5c",
                info: "#4682b4",
                background: "#f5f5dc",
                surface: "#faf0e6",
                text: "#2f1b14",
                textSecondary: "#654321",
                border: "#deb887",
                accent: "#d2691e",
            },
            monokai: {
                primary: "#f92672",
                secondary: "#a6e22e",
                success: "#a6e22e",
                warning: "#fd971f",
                danger: "#f92672",
                info: "#66d9ef",
                background: "#272822",
                surface: "#3e3d32",
                text: "#f8f8f2",
                textSecondary: "#75715e",
                border: "#75715e",
                accent: "#ae81ff",
            },
            "solarized-light": {
                primary: "#268bd2",
                secondary: "#586e75",
                success: "#859900",
                warning: "#b58900",
                danger: "#dc322f",
                info: "#2aa198",
                background: "#fdf6e3",
                surface: "#eee8d5",
                text: "#586e75",
                textSecondary: "#657b83",
                border: "#93a1a1",
                accent: "#cb4b16",
            },
            "solarized-dark": {
                primary: "#268bd2",
                secondary: "#839496",
                success: "#859900",
                warning: "#b58900",
                danger: "#dc322f",
                info: "#2aa198",
                background: "#002b36",
                surface: "#073642",
                text: "#839496",
                textSecondary: "#93a1a1",
                border: "#586e75",
                accent: "#cb4b16",
            },
        };

        this.init();
    }

    async init() {
        // Charger le thème depuis le serveur d'abord, puis localStorage
        try {
            const response = await fetch("/theme/get");
            if (response.ok) {
                const data = await response.json();
                this.currentTheme = data.theme;
            } else {
                // Fallback vers localStorage
                this.currentTheme = localStorage.getItem("theme") || "light";
            }
        } catch (error) {
            console.warn(
                "Impossible de charger le thème depuis le serveur, utilisation du localStorage"
            );
            this.currentTheme = localStorage.getItem("theme") || "light";
        }

        // Appliquer le thème
        this.applyTheme(this.currentTheme);

        // Exposer la classe globalement
        window.ThemeManager = this;

        // Initialiser les sélecteurs de thème
        this.initThemeSelectors();
    }

    initThemeSelectors() {
        // Initialiser tous les sélecteurs de thème sur la page
        const themeSelectors = document.querySelectorAll(
            "[data-theme-selector], select[data-theme-selector]"
        );
        themeSelectors.forEach((selector) => {
            selector.value = this.currentTheme;
            selector.addEventListener("change", (e) => {
                this.applyTheme(e.target.value);
            });
        });
    }

    async applyTheme(themeName) {
        if (!this.themes[themeName]) {
            console.warn(
                `Thème "${themeName}" non trouvé, utilisation du thème light`
            );
            themeName = "light";
        }

        this.currentTheme = themeName;
        const theme = this.themes[themeName];

        // Synchroniser avec le serveur
        try {
            await fetch("/theme/set", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN":
                        document
                            .querySelector('meta[name="csrf-token"]')
                            ?.getAttribute("content") || "",
                },
                body: JSON.stringify({ theme: themeName }),
            });
        } catch (error) {
            console.warn("Impossible de synchroniser le thème avec le serveur");
        }

        // Appliquer l'attribut theme sur l'élément HTML
        const html = document.documentElement;
        html.setAttribute("theme", themeName);

        // Supprimer toutes les classes de thème existantes du body
        document.body.className = document.body.className.replace(
            /theme-\w+/g,
            ""
        );

        // Ajouter la classe du thème au body
        document.body.classList.add(`theme-${themeName}`);

        // Mettre à jour tous les sélecteurs de thème
        const themeSelectors = document.querySelectorAll(
            "[data-theme-selector], select[data-theme-selector]"
        );
        themeSelectors.forEach((selector) => {
            selector.value = themeName;
        });

        // Déclencher un événement personnalisé
        const event = new CustomEvent("themeChanged", {
            detail: { theme: themeName, colors: theme },
        });
        document.dispatchEvent(event);

        console.log(`Thème appliqué: ${themeName}`);
    }

    getCurrentTheme() {
        return this.currentTheme;
    }

    getThemeColors(themeName = null) {
        const theme = themeName || this.currentTheme;
        return this.themes[theme] || this.themes.light;
    }

    getAllThemes() {
        return Object.keys(this.themes);
    }

    // Méthode pour créer un thème personnalisé
    createCustomTheme(colors) {
        const customTheme = {
            ...this.themes.light, // Base sur le thème light
            ...colors, // Remplacer avec les couleurs personnalisées
        };

        return customTheme;
    }

    // Méthode pour appliquer un thème personnalisé
    applyCustomTheme(colors) {
        const customTheme = this.createCustomTheme(colors);

        // Créer une classe CSS temporaire pour le thème personnalisé
        const styleId = "custom-theme-style";
        let styleElement = document.getElementById(styleId);

        if (!styleElement) {
            styleElement = document.createElement("style");
            styleElement.id = styleId;
            document.head.appendChild(styleElement);
        }

        // Générer le CSS pour le thème personnalisé
        const cssRules = Object.entries(customTheme)
            .map(([key, value]) => `--color-${key}: ${value};`)
            .join("\n    ");

        styleElement.textContent = `
            .theme-custom {
                ${cssRules}
            }
        `;

        // Appliquer la classe custom au body
        document.body.className = document.body.className.replace(
            /theme-\w+/g,
            ""
        );
        document.body.classList.add("theme-custom");
    }
}

// Initialiser le gestionnaire de thèmes quand le DOM est prêt
document.addEventListener("DOMContentLoaded", () => {
    new ThemeManager();
});

// Initialiser immédiatement si le DOM est déjà chargé
if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
        new ThemeManager();
    });
} else {
    new ThemeManager();
}
