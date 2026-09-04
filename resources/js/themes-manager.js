/**
 * ThemeManager - Gestionnaire de themes unifie pour LarappeUI
 *
 * Les palettes ne sont plus dupliquees ici : elles sont injectees par le layout
 * depuis config/themes.php (window.LarappeUI). C'etait la desynchronisation
 * entre ce fichier, public/js/themes-manager.js et public/css/themes.css qui
 * rendait 22 themes inaccessibles.
 */

const CATALOG = typeof window !== 'undefined' && window.LarappeUI ? window.LarappeUI : {};

const THEMES = CATALOG.themes || {};
const ALIASES = CATALOG.aliases || {};
const DEFAULT_THEME = CATALOG.default || 'light';

class ThemeManager {
  constructor() {
    this.themes = THEMES;
    this.currentTheme = CATALOG.current || DEFAULT_THEME;

    // Expose immediatement : Alpine evalue ses expressions des le parsing du
    // module et ne peut pas attendre une initialisation asynchrone.
    window.ThemeManager = this;

    // Le theme rendu par le serveur est deja pose sur <html>/<body>. On
    // n'applique donc que les variables CSS, sans reecrire vers le serveur.
    this.applyTheme(this.currentTheme, { persist: false });
  }

  /** Normalise un alias (`x-light`) vers sa palette. */
  resolve(themeName) {
    const name = ALIASES[themeName] || themeName;

    return this.themes[name] ? name : DEFAULT_THEME;
  }

  applyTheme(themeName, { persist = true } = {}) {
    const name = this.resolve(themeName);
    const theme = this.themes[name];

    if (!theme) {
      return;
    }

    this.currentTheme = name;

    const root = document.documentElement;
    root.setAttribute('theme', name);

    // Les vues Blade consomment --color-*, resources/css/app.css consomme les
    // noms non prefixes. Les deux doivent resoudre, sinon l'une des deux
    // familles de regles reste inerte.
    for (const [key, value] of Object.entries(theme)) {
      root.style.setProperty(`--color-${key}`, value);
      root.style.setProperty(`--${key}`, value);
    }

    // Le motif doit accepter le tiret : /theme-\w+/ laissait "-night" derriere
    // lui sur theme-forest-night et "-dark" sur theme-solarized-dark.
    document.body.className = document.body.className
      .replace(/\btheme-[\w-]+/g, '')
      .replace(/\s{2,}/g, ' ')
      .trim();
    document.body.classList.add(`theme-${name}`);

    if (persist) {
      this.persist(name);
    }

    document.dispatchEvent(
      new CustomEvent('themeChanged', { detail: { theme: name, colors: theme } })
    );
  }

  /** Ecrit le theme en session et en localStorage. */
  async persist(name) {
    try {
      localStorage.setItem('theme', name);
    } catch {
      // Stockage indisponible (navigation privee) : la session serveur suffit.
    }

    try {
      await fetch('/theme/set', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN':
            document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
        },
        body: JSON.stringify({ theme: name }),
      });
    } catch {
      // Hors ligne : le theme reste applique cote client.
    }
  }

  getCurrentTheme() {
    return this.currentTheme;
  }

  getThemeColors(themeName = null) {
    return this.themes[themeName || this.currentTheme] || this.themes[DEFAULT_THEME];
  }

  getAllThemes() {
    return Object.keys(this.themes);
  }

  getSelectableThemes() {
    return CATALOG.selectable || this.getAllThemes();
  }

  /** Variante sombre d'un theme, ou null s'il n'en a pas. */
  darkVariantOf(themeName) {
    return (CATALOG.darkOf || {})[themeName] || null;
  }

  createCustomTheme(colors) {
    return { ...this.themes[DEFAULT_THEME], ...colors };
  }

  applyCustomTheme(colors) {
    const customTheme = this.createCustomTheme(colors);
    const root = document.documentElement;

    for (const [key, value] of Object.entries(customTheme)) {
      root.style.setProperty(`--color-${key}`, value);
      root.style.setProperty(`--${key}`, value);
    }

    document.body.className = document.body.className
      .replace(/\btheme-[\w-]+/g, '')
      .replace(/\s{2,}/g, ' ')
      .trim();
    document.body.classList.add('theme-custom');
  }
}

// Une seule instanciation. La version precedente enregistrait deux ecouteurs
// DOMContentLoaded, d'ou deux instances et deux requetes /theme/* par page.
new ThemeManager();

export default ThemeManager;
