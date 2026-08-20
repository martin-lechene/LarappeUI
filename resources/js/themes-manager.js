/**
 * ThemeManager - Gestionnaire de thèmes unifié pour LarappeUI
 *
 * Les palettes proviennent de `resources/js/themes.js`, également utilisé pour
 * générer `resources/css/themes.css`.
 */
import { themes, DEFAULT_THEME } from './themes.js';

class ThemeManager {
  constructor() {
    this.currentTheme = DEFAULT_THEME;
    this.themes = themes;

    this.init();
  }

  async init() {
    // Charger le thème depuis le serveur d'abord, puis localStorage
    try {
      const response = await fetch('/theme/get');
      if (response.ok) {
        const data = await response.json();
        this.currentTheme = data.theme;
      } else {
        this.currentTheme = localStorage.getItem('theme') || DEFAULT_THEME;
      }
    } catch {
      // Serveur injoignable : on retombe sur la préférence locale.
      this.currentTheme = localStorage.getItem('theme') || DEFAULT_THEME;
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
      '[data-theme-selector], select[data-theme-selector]'
    );
    themeSelectors.forEach((selector) => {
      selector.value = this.currentTheme;
      selector.addEventListener('change', (e) => {
        this.applyTheme(e.target.value);
      });
    });
  }

  async applyTheme(themeName) {
    if (!this.themes[themeName]) {
      themeName = DEFAULT_THEME;
    }

    this.currentTheme = themeName;
    const theme = this.themes[themeName];

    // Synchroniser avec le serveur
    try {
      await fetch('/theme/set', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN':
            document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
        },
        body: JSON.stringify({ theme: themeName }),
      });
    } catch {
      // La persistance serveur est optionnelle : le thème reste appliqué et
      // mémorisé côté navigateur.
    }

    localStorage.setItem('theme', themeName);

    // Appliquer l'attribut theme sur l'élément HTML
    const html = document.documentElement;
    html.setAttribute('theme', themeName);

    // Remplacer la classe de thème du body
    document.body.className = document.body.className.replace(/\btheme-[\w-]+\b/g, '').trim();
    document.body.classList.add(`theme-${themeName}`);

    // Mettre à jour tous les sélecteurs de thème
    const themeSelectors = document.querySelectorAll(
      '[data-theme-selector], select[data-theme-selector]'
    );
    themeSelectors.forEach((selector) => {
      selector.value = themeName;
    });

    // Déclencher un événement personnalisé
    const event = new CustomEvent('themeChanged', {
      detail: { theme: themeName, colors: theme },
    });
    document.dispatchEvent(event);
  }

  getCurrentTheme() {
    return this.currentTheme;
  }

  getThemeColors(themeName = null) {
    const theme = themeName || this.currentTheme;

    return this.themes[theme] || this.themes[DEFAULT_THEME];
  }

  getAllThemes() {
    return Object.keys(this.themes);
  }

  // Méthode pour créer un thème personnalisé
  createCustomTheme(colors) {
    return {
      ...this.themes[DEFAULT_THEME], // Base sur le thème par défaut
      ...colors, // Remplacer avec les couleurs personnalisées
    };
  }

  // Méthode pour appliquer un thème personnalisé
  applyCustomTheme(colors) {
    const customTheme = this.createCustomTheme(colors);

    // Créer une classe CSS temporaire pour le thème personnalisé
    const styleId = 'custom-theme-style';
    let styleElement = document.getElementById(styleId);

    if (!styleElement) {
      styleElement = document.createElement('style');
      styleElement.id = styleId;
      document.head.appendChild(styleElement);
    }

    // Générer le CSS pour le thème personnalisé : la palette `--color-*` et les
    // alias sémantiques attendus par `app.css`.
    const cssRules = Object.entries(customTheme)
      .filter(([key]) => key !== 'dark')
      .map(([key, value]) => `--color-${key}: ${value};`)
      .join('\n      ');

    styleElement.textContent = `
    .theme-custom {
      ${cssRules}
      --primary: var(--color-primary);
      --secondary: var(--color-secondary);
      --accent: var(--color-accent);
      --background: var(--color-background);
      --surface: var(--color-surface);
      --text: var(--color-text);
      --text-muted: var(--color-textSecondary);
      --border: var(--color-border);
    }
    `;

    // Appliquer la classe custom au body
    document.body.className = document.body.className.replace(/\btheme-[\w-]+\b/g, '').trim();
    document.body.classList.add('theme-custom');
  }
}

// Une seule instance, quel que soit l'état du document au moment du chargement.
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => new ThemeManager(), { once: true });
} else {
  new ThemeManager();
}

export default ThemeManager;
