// Gestionnaire de thèmes pour LarappeUI
window.ThemeManager = {
  // Thèmes disponibles
  themes: [
    // Thèmes de base
    {
      key: 'light',
      name: 'Light',
      class: 'theme-light',
      colors: {
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
        accent: '#f59e42',
      },
      description: 'Thème clair par défaut avec des couleurs modernes'
    },
    {
      key: 'dark',
      name: 'Dark',
      class: 'theme-dark',
      colors: {
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
        accent: '#fbbf24',
      },
      description: 'Thème sombre élégant pour une expérience nocturne'
    },
    {
      key: 'pro',
      name: 'Pro (FrappeUI)',
      class: 'theme-pro',
      colors: {
        primary: '#2563eb',
        secondary: '#64748b',
        success: '#059669',
        warning: '#d97706',
        danger: '#dc2626',
        info: '#0891b2',
        background: '#f8fafc',
        surface: '#ffffff',
        text: '#1e293b',
        textSecondary: '#64748b',
        border: '#e2e8f0',
        accent: '#fbbf24',
      },
      description: 'Thème professionnel inspiré de FrappeUI'
    },
    
    // Thèmes naturels
    {
      key: 'forest',
      name: 'Forest',
      class: 'theme-forest',
      colors: {
        primary: '#22c55e',
        secondary: '#84cc16',
        success: '#16a34a',
        warning: '#ca8a04',
        danger: '#dc2626',
        info: '#0891b2',
        background: '#f0fdf4',
        surface: '#ffffff',
        text: '#14532d',
        textSecondary: '#166534',
        border: '#bbf7d0',
        accent: '#a3e635',
      },
      description: 'Thème forestier avec des tons verts naturels'
    },
    {
      key: 'forest-night',
      name: 'Forest Night',
      class: 'theme-forest-night',
      colors: {
        primary: '#22c55e',
        secondary: '#84cc16',
        success: '#16a34a',
        warning: '#ca8a04',
        danger: '#dc2626',
        info: '#0891b2',
        background: '#0f172a',
        surface: '#1e293b',
        text: '#f0fdf4',
        textSecondary: '#bbf7d0',
        border: '#14532d',
        accent: '#a3e635',
      },
      description: 'Version nocturne du thème forest'
    },
    {
      key: 'sea',
      name: 'Sea',
      class: 'theme-sea',
      colors: {
        primary: '#0ea5e9',
        secondary: '#38bdf8',
        success: '#10b981',
        warning: '#f59e0b',
        danger: '#ef4444',
        info: '#06b6d4',
        background: '#e0f2fe',
        surface: '#ffffff',
        text: '#0c4a6e',
        textSecondary: '#0369a1',
        border: '#bae6fd',
        accent: '#38bdf8',
      },
      description: 'Thème marin avec des bleus océaniques'
    },
    {
      key: 'sakura',
      name: 'Sakura',
      class: 'theme-sakura',
      colors: {
        primary: '#f472b6',
        secondary: '#f9a8d4',
        success: '#10b981',
        warning: '#f59e0b',
        danger: '#ef4444',
        info: '#06b6d4',
        background: '#fdf2f8',
        surface: '#ffffff',
        text: '#831843',
        textSecondary: '#be185d',
        border: '#fce7f3',
        accent: '#ec4899',
      },
      description: 'Thème floral japonais avec des tons roses'
    },
    {
      key: 'summer',
      name: 'Summer',
      class: 'theme-summer',
      colors: {
        primary: '#f59e0b',
        secondary: '#fbbf24',
        success: '#10b981',
        warning: '#f59e0b',
        danger: '#ef4444',
        info: '#06b6d4',
        background: '#fffbeb',
        surface: '#ffffff',
        text: '#92400e',
        textSecondary: '#b45309',
        border: '#fed7aa',
        accent: '#fbbf24',
      },
      description: 'Couleurs estivales chaleureuses'
    },
    
    // Thèmes créatifs
    {
      key: 'glass',
      name: 'Glass',
      class: 'theme-glass',
      colors: {
        primary: '#a5b4fc',
        secondary: '#c7d2fe',
        success: '#86efac',
        warning: '#fde047',
        danger: '#fca5a5',
        info: '#67e8f9',
        background: 'rgba(255,255,255,0.6)',
        surface: 'rgba(255,255,255,0.8)',
        text: '#374151',
        textSecondary: '#6b7280',
        border: 'rgba(255,255,255,0.3)',
        accent: '#f472b6',
      },
      description: 'Effet de verre avec transparence et flou'
    },
    {
      key: '2d',
      name: '2D',
      class: 'theme-2d',
      colors: {
        primary: '#f43f5e',
        secondary: '#a21caf',
        success: '#22c55e',
        warning: '#f59e0b',
        danger: '#ef4444',
        info: '#06b6d4',
        background: '#f1f5f9',
        surface: '#ffffff',
        text: '#0f172a',
        textSecondary: '#475569',
        border: '#cbd5e1',
        accent: '#a21caf',
      },
      description: 'Thème 2D avec des couleurs vives et géométriques'
    },
    {
      key: 'retro80s',
      name: 'Retro 80s',
      class: 'theme-retro80s',
      colors: {
        primary: '#ff6b6b',
        secondary: '#4ecdc4',
        success: '#45b7d1',
        warning: '#f7b731',
        danger: '#ee5a52',
        info: '#a55eea',
        background: '#f8f9fa',
        surface: '#ffffff',
        text: '#2d3436',
        textSecondary: '#636e72',
        border: '#ddd',
        accent: '#f7b731',
      },
      description: 'Style rétro années 80'
    },
    {
      key: 'space',
      name: 'Space',
      class: 'theme-space',
      colors: {
        primary: '#6366f1',
        secondary: '#8b5cf6',
        success: '#10b981',
        warning: '#f59e0b',
        danger: '#ef4444',
        info: '#06b6d4',
        background: '#0f172a',
        surface: '#1e293b',
        text: '#f1f5f9',
        textSecondary: '#cbd5e1',
        border: '#334155',
        accent: '#8b5cf6',
      },
      description: 'Thème spatial mystérieux'
    },
    
    // Thèmes spécialisés
    {
      key: 'minimal',
      name: 'Minimal',
      class: 'theme-minimal',
      colors: {
        primary: '#000000',
        secondary: '#6b7280',
        success: '#10b981',
        warning: '#f59e0b',
        danger: '#ef4444',
        info: '#06b6d4',
        background: '#ffffff',
        surface: '#fafafa',
        text: '#000000',
        textSecondary: '#6b7280',
        border: '#e5e7eb',
        accent: '#f59e0b',
      },
      description: 'Design minimaliste épuré'
    },
    {
      key: 'coffee',
      name: 'Coffee',
      class: 'theme-coffee',
      colors: {
        primary: '#7c4a1e',
        secondary: '#a89f91',
        success: '#b7bfa6',
        warning: '#e2b07a',
        danger: '#a9746e',
        info: '#bfae9c',
        background: '#f5f3ef',
        surface: '#ede6db',
        text: '#4b2e19',
        textSecondary: '#a89f91',
        border: '#d6cfc7',
        accent: '#c69c6d',
      },
      description: 'Tons café chaleureux'
    },
    {
      key: 'vintage',
      name: 'Vintage',
      class: 'theme-vintage',
      colors: {
        primary: '#8b4513',
        secondary: '#cd853f',
        success: '#228b22',
        warning: '#daa520',
        danger: '#b22222',
        info: '#4682b4',
        background: '#f5f5dc',
        surface: '#faf0e6',
        text: '#2f4f4f',
        textSecondary: '#696969',
        border: '#deb887',
        accent: '#daa520',
      },
      description: 'Style vintage classique'
    },
    {
      key: 'monokai',
      name: 'Monokai',
      class: 'theme-monokai',
      colors: {
        primary: '#f92672',
        secondary: '#a6e22e',
        success: '#a6e22e',
        warning: '#f4bf75',
        danger: '#f92672',
        info: '#66d9ef',
        background: '#272822',
        surface: '#3e3d32',
        text: '#f8f8f2',
        textSecondary: '#75715e',
        border: '#75715e',
        accent: '#fd971f',
      },
      description: 'Palette Monokai pour développeurs'
    },
    {
      key: 'pastel',
      name: 'Pastel',
      class: 'theme-pastel',
      colors: {
        primary: '#a5b4fc',
        secondary: '#fbbf24',
        success: '#86efac',
        warning: '#fde047',
        danger: '#fca5a5',
        info: '#67e8f9',
        background: '#fefefe',
        surface: '#ffffff',
        text: '#374151',
        textSecondary: '#6b7280',
        border: '#e5e7eb',
        accent: '#f472b6',
      },
      description: 'Couleurs douces et apaisantes'
    },
    
    // Thèmes Solarized
    {
      key: 'solarized-light',
      name: 'Solarized Light',
      class: 'theme-solarized-light',
      colors: {
        primary: '#268bd2',
        secondary: '#586e75',
        success: '#859900',
        warning: '#b58900',
        danger: '#dc322f',
        info: '#2aa198',
        background: '#fdf6e3',
        surface: '#eee8d5',
        text: '#586e75',
        textSecondary: '#657b83',
        border: '#93a1a1',
        accent: '#d33682',
      },
      description: 'Palette Solarized claire'
    },
    {
      key: 'solarized-dark',
      name: 'Solarized Dark',
      class: 'theme-solarized-dark',
      colors: {
        primary: '#268bd2',
        secondary: '#839496',
        success: '#859900',
        warning: '#b58900',
        danger: '#dc322f',
        info: '#2aa198',
        background: '#002b36',
        surface: '#073642',
        text: '#839496',
        textSecondary: '#93a1a1',
        border: '#586e75',
        accent: '#d33682',
      },
      description: 'Palette Solarized sombre'
    }
  ],

  // Obtenir le thème actuel depuis localStorage
  getCurrentTheme() {
    return localStorage.getItem('theme') || 'light';
  },

  // Appliquer un thème
  applyTheme(themeKey) {
    const theme = this.themes.find(t => t.key === themeKey);
    if (!theme) {
      console.warn(`Thème "${themeKey}" non trouvé, utilisation du thème light`);
      themeKey = 'light';
      theme = this.themes.find(t => t.key === 'light');
    }

    const root = document.documentElement;
    
    // Supprimer toutes les classes de thème existantes
    this.themes.forEach(t => {
      root.classList.remove(t.class);
    });
    
    // Appliquer la nouvelle classe de thème
    root.classList.add(theme.class);
    
    // Appliquer les variables CSS personnalisées
    Object.entries(theme.colors).forEach(([key, value]) => {
      root.style.setProperty(`--color-${key}`, value);
    });
    
    // Sauvegarder dans localStorage
    localStorage.setItem('theme', themeKey);
    
    // Déclencher un événement personnalisé
    document.dispatchEvent(new CustomEvent('themeChanged', { 
      detail: { theme: themeKey, themeData: theme } 
    }));
    
    console.log(`Thème appliqué: ${theme.name} (${themeKey})`);
  },

  // Initialiser le système de thèmes
  init() {
    const currentTheme = this.getCurrentTheme();
    this.applyTheme(currentTheme);
    
    // Écouter les changements de thème depuis les sélecteurs
    document.addEventListener('change', (e) => {
      if (e.target.matches('[data-theme-selector]')) {
        this.applyTheme(e.target.value);
      }
    });
    
    console.log('ThemeManager initialisé');
  },

  // Obtenir les informations d'un thème
  getTheme(themeKey) {
    return this.themes.find(t => t.key === themeKey);
  },

  // Obtenir tous les thèmes
  getAllThemes() {
    return this.themes;
  },

  // Créer un sélecteur de thèmes
  createSelector(container, options = {}) {
    const select = document.createElement('select');
    select.setAttribute('data-theme-selector', '');
    select.className = options.className || 'px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent';
    
    this.themes.forEach(theme => {
      const option = document.createElement('option');
      option.value = theme.key;
      option.textContent = theme.name;
      select.appendChild(option);
    });
    
    select.value = this.getCurrentTheme();
    
    if (container) {
      container.appendChild(select);
    }
    
    return select;
  }
};

// Initialiser automatiquement quand le DOM est prêt
document.addEventListener('DOMContentLoaded', () => {
  window.ThemeManager.init();
}); 