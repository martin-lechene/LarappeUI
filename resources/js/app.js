import './bootstrap.js';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import focus from '@alpinejs/focus';
import collapse from '@alpinejs/collapse';
import { marked } from 'marked';
import './themes-manager.js';

// Expose pour les expressions Alpine inline des composants Blade, qui sont
// evaluees dans le scope global et non dans celui du module.
window.Alpine = Alpine;
window.marked = marked;

/**
 * Etat de la coquille applicative : sidebar et selecteur de theme.
 *
 * Enregistre via Alpine.data() plutot qu'en x-data inline : c'est ce qui
 * garantit la liaison de `this` dans x-init, la version inline levant
 * "this.applyCurrent is not a function" a chaque chargement de page.
 */
Alpine.data('themeShell', () => {
  const catalog = window.LarappeUI || {};
  const darkOf = catalog.darkOf || {};
  const selectable = catalog.selectable || [];

  // Table inverse : de quelle base une variante sombre est-elle le pendant.
  // On ne derive plus le nom par découpage de chaine — c'est ce qui reduisait
  // solarized-light et solarized-dark a "solarized", classe inexistante.
  const baseOf = Object.fromEntries(Object.entries(darkOf).map(([base, dark]) => [dark, base]));

  const current = catalog.current || catalog.default || 'light';
  const base = baseOf[current] || current;

  return {
    sidebarOpen: false,
    themeOptions: selectable,
    currentTheme: base,
    isDark: current !== base,

    /** Le theme courant possede-t-il une variante sombre ? */
    get hasDark() {
      return Boolean(darkOf[this.currentTheme]);
    },

    applyCurrent() {
      // Un theme sans pendant sombre ne peut pas rester "en sombre".
      if (this.isDark && !darkOf[this.currentTheme]) {
        this.isDark = false;
      }

      const target = this.isDark ? darkOf[this.currentTheme] : this.currentTheme;

      window.ThemeManager?.applyTheme(target);
    },

    /** Reste aligne si le theme change par un autre chemin. */
    listen() {
      document.addEventListener('themeChanged', (event) => {
        const theme = event.detail?.theme;
        if (!theme) return;

        this.currentTheme = baseOf[theme] || theme;
        this.isDark = theme !== this.currentTheme;
      });
    },
  };
});

Alpine.plugin(persist);
// $focus : navigation clavier des tablists et piege de focus des modales.
Alpine.plugin(focus);
// x-collapse est utilise par le composant layout/collapse.
Alpine.plugin(collapse);
Alpine.start();
