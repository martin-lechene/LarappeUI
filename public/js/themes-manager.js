/**
 * ThemeManager - Gestionnaire de thèmes pour LarappeUI
 */
class ThemeManager {
    constructor() {
        this.currentTheme = 'light';
        this.themes = {
            light: {
                primary: '#3b82f6',
                secondary: '#6b7280',
                success: '#10b981',
                warning: '#f59e0b',
                danger: '#ef4444',
                info: '#06b6d4',
                background: '#ffffff',
                surface: '#f9fafb',
                text: '#111827',
                textSecondary: '#6b7280',
                border: '#e5e7eb',
                accent: '#f59e42'
            },
            dark: {
                primary: '#60a5fa',
                secondary: '#9ca3af',
                success: '#34d399',
                warning: '#fbbf24',
                danger: '#f87171',
                info: '#22d3ee',
                background: '#111827',
                surface: '#1f2937',
                text: '#f9fafb',
                textSecondary: '#d1d5db',
                border: '#374151',
                accent: '#fb923c'
            },
            pro: {
                primary: '#6366f1',
                secondary: '#64748b',
                success: '#059669',
                warning: '#d97706',
                danger: '#dc2626',
                info: '#0891b2',
                background: '#ffffff',
                surface: '#f8fafc',
                text: '#0f172a',
                textSecondary: '#475569',
                border: '#e2e8f0',
                accent: '#f97316'
            },
            enterprise: {
                primary: '#1e40af',
                secondary: '#4b5563',
                success: '#047857',
                warning: '#b45309',
                danger: '#b91c1c',
                info: '#0e7490',
                background: '#ffffff',
                surface: '#f9fafb',
                text: '#111827',
                textSecondary: '#6b7280',
                border: '#d1d5db',
                accent: '#ea580c'
            },
            glass: {
                primary: 'rgba(59, 130, 246, 0.8)',
                secondary: 'rgba(107, 114, 128, 0.8)',
                success: 'rgba(16, 185, 129, 0.8)',
                warning: 'rgba(245, 158, 11, 0.8)',
                danger: 'rgba(239, 68, 68, 0.8)',
                info: 'rgba(6, 182, 212, 0.8)',
                background: 'rgba(255, 255, 255, 0.1)',
                surface: 'rgba(249, 250, 251, 0.1)',
                text: '#111827',
                textSecondary: '#6b7280',
                border: 'rgba(229, 231, 235, 0.3)',
                accent: 'rgba(245, 158, 66, 0.8)'
            },
            neon: {
                primary: '#00ff88',
                secondary: '#ff00ff',
                success: '#00ff00',
                warning: '#ffff00',
                danger: '#ff0080',
                info: '#00ffff',
                background: '#000000',
                surface: '#1a1a1a',
                text: '#ffffff',
                textSecondary: '#cccccc',
                border: '#333333',
                accent: '#ff6600'
            },
            forest: {
                primary: '#059669',
                secondary: '#6b7280',
                success: '#10b981',
                warning: '#f59e0b',
                danger: '#ef4444',
                info: '#06b6d4',
                background: '#f0fdf4',
                surface: '#ecfdf5',
                text: '#064e3b',
                textSecondary: '#065f46',
                border: '#bbf7d0',
                accent: '#16a34a'
            },
            sea: {
                primary: '#0ea5e9',
                secondary: '#64748b',
                success: '#10b981',
                warning: '#f59e0b',
                danger: '#ef4444',
                info: '#06b6d4',
                background: '#f0f9ff',
                surface: '#e0f2fe',
                text: '#0c4a6e',
                textSecondary: '#0f766e',
                border: '#bae6fd',
                accent: '#0284c7'
            },
            sunset: {
                primary: '#f97316',
                secondary: '#6b7280',
                success: '#10b981',
                warning: '#f59e0b',
                danger: '#ef4444',
                info: '#06b6d4',
                background: '#fff7ed',
                surface: '#fed7aa',
                text: '#7c2d12',
                textSecondary: '#9a3412',
                border: '#fdba74',
                accent: '#ea580c'
            },
            modern: {
                primary: '#8b5cf6',
                secondary: '#64748b',
                success: '#10b981',
                warning: '#f59e0b',
                danger: '#ef4444',
                info: '#06b6d4',
                background: '#ffffff',
                surface: '#f8fafc',
                text: '#0f172a',
                textSecondary: '#475569',
                border: '#e2e8f0',
                accent: '#a855f7'
            },
            minimal: {
                primary: '#000000',
                secondary: '#6b7280',
                success: '#000000',
                warning: '#000000',
                danger: '#000000',
                info: '#000000',
                background: '#ffffff',
                surface: '#f9fafb',
                text: '#000000',
                textSecondary: '#6b7280',
                border: '#e5e7eb',
                accent: '#000000'
            },
            '2d': {
                primary: '#ff6b6b',
                secondary: '#4ecdc4',
                success: '#45b7d1',
                warning: '#f7b731',
                danger: '#ee5a24',
                info: '#a55eea',
                background: '#ffffff',
                surface: '#f8f9fa',
                text: '#2d3436',
                textSecondary: '#636e72',
                border: '#ddd',
                accent: '#ffa502'
            },
            retro: {
                primary: '#ff6b35',
                secondary: '#f7931e',
                success: '#4ecdc4',
                warning: '#ffe66d',
                danger: '#ff6b6b',
                info: '#45b7d1',
                background: '#f7f1e3',
                surface: '#e8d5c4',
                text: '#2d3436',
                textSecondary: '#636e72',
                border: '#ddd',
                accent: '#ffa502'
            },
            cyberpunk: {
                primary: '#00ffff',
                secondary: '#ff00ff',
                success: '#00ff00',
                warning: '#ffff00',
                danger: '#ff0000',
                info: '#0000ff',
                background: '#000000',
                surface: '#1a1a1a',
                text: '#ffffff',
                textSecondary: '#cccccc',
                border: '#333333',
                accent: '#ff6600'
            },
            pastel: {
                primary: '#ffb3ba',
                secondary: '#baffc9',
                success: '#bae1ff',
                warning: '#ffffba',
                danger: '#ffb3ba',
                info: '#b3d9ff',
                background: '#ffffff',
                surface: '#f8f9fa',
                text: '#2d3436',
                textSecondary: '#636e72',
                border: '#ddd',
                accent: '#ffcccb'
            }
        };
        
        this.init();
    }

    init() {
        // Charger le thème sauvegardé
        const savedTheme = localStorage.getItem('theme') || 'light';
        this.applyTheme(savedTheme);
        
        // Exposer la classe globalement
        window.ThemeManager = this;
    }

    applyTheme(themeName) {
        if (!this.themes[themeName]) {
            console.warn(`Thème "${themeName}" non trouvé, utilisation du thème light`);
            themeName = 'light';
        }

        this.currentTheme = themeName;
        const theme = this.themes[themeName];

        // Sauvegarder dans localStorage
        localStorage.setItem('theme', themeName);

        // Appliquer les variables CSS
        const root = document.documentElement;
        
        Object.entries(theme).forEach(([key, value]) => {
            root.style.setProperty(`--color-${key}`, value);
        });

        // Ajouter la classe du thème au body
        document.body.className = document.body.className.replace(/theme-\w+/g, '');
        document.body.classList.add(`theme-${themeName}`);

        // Déclencher un événement personnalisé
        const event = new CustomEvent('themeChanged', {
            detail: { theme: themeName, colors: theme }
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
            ...colors // Remplacer avec les couleurs personnalisées
        };
        
        return customTheme;
    }

    // Méthode pour appliquer un thème personnalisé
    applyCustomTheme(colors) {
        const customTheme = this.createCustomTheme(colors);
        
        // Appliquer temporairement
        const root = document.documentElement;
        Object.entries(customTheme).forEach(([key, value]) => {
            root.style.setProperty(`--color-${key}`, value);
        });
    }
}

// Initialiser le gestionnaire de thèmes quand le DOM est prêt
document.addEventListener('DOMContentLoaded', () => {
    new ThemeManager();
});

// Initialiser immédiatement si le DOM est déjà chargé
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        new ThemeManager();
    });
} else {
    new ThemeManager();
} 