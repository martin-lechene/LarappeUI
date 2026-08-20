import { afterEach, beforeEach, describe, expect, it, vi } from 'vitest';

import { themes, DEFAULT_THEME, themeNames } from '../../resources/js/themes.js';

/**
 * Charge le module en neuf : son import déclenche l'instanciation du manager.
 */
async function loadManager() {
  vi.resetModules();
  await import('../../resources/js/themes-manager.js');
  // L'initialisation attend la réponse de /theme/get.
  await vi.waitFor(() => expect(window.ThemeManager).toBeDefined());

  return window.ThemeManager;
}

describe('palettes', () => {
  it('déclare une couleur accent pour chaque thème', () => {
    for (const [name, theme] of Object.entries(themes)) {
      expect(theme.accent, `le thème ${name} n'a pas d'accent`).toBeTruthy();
    }
  });

  it('déclare les mêmes clés de palette partout', () => {
    const reference = Object.keys(themes[DEFAULT_THEME]).sort();

    for (const [name, theme] of Object.entries(themes)) {
      expect(Object.keys(theme).sort(), `clés divergentes pour ${name}`).toEqual(reference);
    }
  });

  it('ne contient pas de doublon', () => {
    expect(new Set(themeNames).size).toBe(themeNames.length);
  });
});

describe('ThemeManager', () => {
  beforeEach(() => {
    document.body.className = '';
    document.documentElement.removeAttribute('theme');
    localStorage.clear();
    delete window.ThemeManager;

    vi.stubGlobal(
      'fetch',
      vi.fn(async (url) => {
        if (String(url).includes('/theme/get')) {
          return { ok: true, json: async () => ({ theme: 'dark' }) };
        }

        return { ok: true, json: async () => ({ success: true }) };
      })
    );
  });

  afterEach(() => {
    vi.unstubAllGlobals();
  });

  it("n'instancie qu'un seul manager", async () => {
    const manager = await loadManager();
    const again = await import('../../resources/js/themes-manager.js');

    expect(window.ThemeManager).toBe(manager);
    expect(again.default.name).toBe('ThemeManager');
  });

  it('applique le thème renvoyé par le serveur', async () => {
    const manager = await loadManager();

    expect(manager.getCurrentTheme()).toBe('dark');
    expect(document.documentElement.getAttribute('theme')).toBe('dark');
    expect(document.body.classList.contains('theme-dark')).toBe(true);
  });

  it('remplace la classe de thème au lieu de les empiler', async () => {
    const manager = await loadManager();
    await manager.applyTheme('forest-night');
    await manager.applyTheme('solarized-dark');

    const themeClasses = [...document.body.classList].filter((c) => c.startsWith('theme-'));
    expect(themeClasses).toEqual(['theme-solarized-dark']);
  });

  it('retombe sur le thème par défaut pour un nom inconnu', async () => {
    const manager = await loadManager();
    await manager.applyTheme('nope');

    expect(manager.getCurrentTheme()).toBe(DEFAULT_THEME);
  });

  it('mémorise le thème appliqué dans localStorage', async () => {
    const manager = await loadManager();
    await manager.applyTheme('sakura');

    expect(localStorage.getItem('theme')).toBe('sakura');
  });

  it('utilise localStorage quand le serveur est injoignable', async () => {
    localStorage.setItem('theme', 'monokai');
    vi.stubGlobal(
      'fetch',
      vi.fn(async () => {
        throw new Error('offline');
      })
    );

    const manager = await loadManager();

    expect(manager.getCurrentTheme()).toBe('monokai');
  });

  it('émet un évènement themeChanged', async () => {
    const manager = await loadManager();
    const listener = vi.fn();
    document.addEventListener('themeChanged', listener);

    await manager.applyTheme('neon');

    expect(listener).toHaveBeenCalled();
    expect(listener.mock.calls.at(-1)[0].detail.theme).toBe('neon');
  });

  it('expose la liste complète des thèmes', async () => {
    const manager = await loadManager();

    expect(manager.getAllThemes()).toEqual(themeNames);
  });

  it('génère les variables du thème personnalisé', async () => {
    const manager = await loadManager();
    manager.applyCustomTheme({ primary: '#123456' });

    const style = document.getElementById('custom-theme-style');
    expect(style.textContent).toContain('--color-primary: #123456;');
    expect(style.textContent).toContain('--primary: var(--color-primary);');
    expect(style.textContent).not.toContain('--color-dark:');
    expect(document.body.classList.contains('theme-custom')).toBe(true);
  });
});
