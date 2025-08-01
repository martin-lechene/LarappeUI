// Ce fichier est maintenant déprécié en faveur de themes-manager.js
// Les thèmes sont maintenant gérés par window.ThemeManager

export const enhancedThemes = [
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
  
  // Thèmes professionnels
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
  {
    key: 'enterprise',
    name: 'Enterprise',
    class: 'theme-enterprise',
    colors: {
      primary: '#1e40af',
      secondary: '#475569',
      success: '#047857',
      warning: '#b45309',
      danger: '#b91c1c',
      info: '#0e7490',
      background: '#f1f5f9',
      surface: '#ffffff',
      text: '#0f172a',
      textSecondary: '#475569',
      border: '#cbd5e1',
      accent: '#f59e0b',
    },
    description: 'Thème entreprise avec des couleurs sobres et professionnelles'
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
    key: 'neon',
    name: 'Neon',
    class: 'theme-neon',
    colors: {
      primary: '#00ffff',
      secondary: '#ff00ff',
      success: '#00ff00',
      warning: '#ffff00',
      danger: '#ff0080',
      info: '#0080ff',
      background: '#000000',
      surface: '#1a1a1a',
      text: '#ffffff',
      textSecondary: '#cccccc',
      border: '#333333',
      accent: '#ff6b6b',
    },
    description: 'Thème néon avec des couleurs vives et lumineuses'
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
    key: 'sunset',
    name: 'Sunset',
    class: 'theme-sunset',
    colors: {
      primary: '#f59e42',
      secondary: '#fb923c',
      success: '#10b981',
      warning: '#fbbf24',
      danger: '#ef4444',
      info: '#06b6d4',
      background: '#fff7ed',
      surface: '#ffffff',
      text: '#78350f',
      textSecondary: '#92400e',
      border: '#fed7aa',
      accent: '#fbbf24',
    },
    description: 'Thème coucher de soleil avec des oranges chaleureux'
  },
  
  // Thèmes modernes
  {
    key: 'modern',
    name: 'Modern',
    class: 'theme-modern',
    colors: {
      primary: '#6366f1',
      secondary: '#8b5cf6',
      success: '#10b981',
      warning: '#f59e0b',
      danger: '#ef4444',
      info: '#06b6d4',
      background: '#fafafa',
      surface: '#ffffff',
      text: '#1f2937',
      textSecondary: '#6b7280',
      border: '#e5e7eb',
      accent: '#8b5cf6',
    },
    description: 'Thème moderne avec des couleurs vibrantes'
  },
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
    description: 'Thème minimaliste en noir et blanc'
  },
  
  // Thèmes spéciaux
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
    key: 'retro',
    name: 'Retro',
    class: 'theme-retro',
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
    description: 'Thème rétro avec des couleurs des années 80'
  },
  {
    key: 'cyberpunk',
    name: 'Cyberpunk',
    class: 'theme-cyberpunk',
    colors: {
      primary: '#ff0080',
      secondary: '#00ffff',
      success: '#00ff00',
      warning: '#ffff00',
      danger: '#ff0000',
      info: '#0080ff',
      background: '#0a0a0a',
      surface: '#1a1a1a',
      text: '#ffffff',
      textSecondary: '#cccccc',
      border: '#333333',
      accent: '#ff0080',
    },
    description: 'Thème cyberpunk futuriste'
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
    description: 'Thème pastel doux et apaisant'
  }
];

// Fonction pour appliquer un thème
export function applyTheme(themeKey) {
  const theme = enhancedThemes.find(t => t.key === themeKey);
  if (!theme) return;
  
  const root = document.documentElement;
  root.className = theme.class;
  
  // Appliquer les variables CSS personnalisées
  Object.entries(theme.colors).forEach(([key, value]) => {
    root.style.setProperty(`--color-${key}`, value);
  });
  
  // Sauvegarder dans localStorage
  localStorage.setItem('theme', themeKey);
}

// Fonction pour obtenir le thème actuel
export function getCurrentTheme() {
  return localStorage.getItem('theme') || 'light';
}

// Fonction pour initialiser les thèmes
export function initializeThemes() {
  const currentTheme = getCurrentTheme();
  applyTheme(currentTheme);
}

// Fonction pour créer un sélecteur de thèmes
export function createThemeSelector(container, onThemeChange = null) {
  const select = document.createElement('select');
  select.className = 'w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent';
  
  enhancedThemes.forEach(theme => {
    const option = document.createElement('option');
    option.value = theme.key;
    option.textContent = theme.name;
    select.appendChild(option);
  });
  
  select.value = getCurrentTheme();
  
  select.addEventListener('change', (e) => {
    const themeKey = e.target.value;
    applyTheme(themeKey);
    if (onThemeChange) onThemeChange(themeKey);
  });
  
  container.appendChild(select);
  return select;
}

// Fonction pour créer une grille de preview des thèmes
export function createThemePreviewGrid(container) {
  const grid = document.createElement('div');
  grid.className = 'grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4';
  
  enhancedThemes.forEach(theme => {
    const card = document.createElement('div');
    card.className = 'bg-white rounded-lg shadow-sm border p-4 cursor-pointer hover:shadow-md transition-shadow';
    card.onclick = () => applyTheme(theme.key);
    
    card.innerHTML = `
      <div class="flex items-center mb-3">
        <div class="w-4 h-4 rounded-full mr-2" style="background-color: ${theme.colors.primary}"></div>
        <h3 class="font-medium text-sm">${theme.name}</h3>
      </div>
      <p class="text-xs text-gray-500">${theme.description}</p>
      <div class="flex mt-3 space-x-1">
        <div class="w-3 h-3 rounded" style="background-color: ${theme.colors.primary}"></div>
        <div class="w-3 h-3 rounded" style="background-color: ${theme.colors.secondary}"></div>
        <div class="w-3 h-3 rounded" style="background-color: ${theme.colors.success}"></div>
        <div class="w-3 h-3 rounded" style="background-color: ${theme.colors.danger}"></div>
      </div>
    `;
    
    grid.appendChild(card);
  });
  
  container.appendChild(grid);
  return grid;
}