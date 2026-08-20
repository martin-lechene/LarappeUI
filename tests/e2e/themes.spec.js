import { expect, test } from '@playwright/test';

import { themes } from '../../resources/js/themes.js';

/**
 * Vérifie que chaque thème s'applique réellement au runtime (et pas seulement
 * que ses variables sont déclarées), puis mesure les contrastes obtenus.
 */

const NOMS = Object.keys(themes);

// Les parcours qui enchaînent les 25 thèmes émettent autant d'appels au serveur
// de développement : on les sérialise pour éviter les faux négatifs de charge.
test.describe.configure({ mode: 'serial' });

/**
 * Applique un thème et attend qu'il soit effectivement posé sur le document.
 *
 * @param {import('@playwright/test').Page} page
 * @param {string} nom
 */
async function appliquerTheme(page, nom) {
  await page.locator('#theme-select').selectOption(nom);
  await expect(page.locator('html')).toHaveAttribute('theme', nom, { timeout: 15_000 });
}

/**
 * Compose une couleur éventuellement translucide sur le fond qui la porte.
 *
 * Un thème comme « glass » peint un fond semi-transparent : mesurer son
 * contraste tel quel n'aurait aucun sens, c'est la couleur effectivement vue
 * qui compte.
 */
function aplatir(couleur, dessous = [255, 255, 255]) {
  const valeurs = couleur.match(/[\d.]+/g).map(Number);
  const [r, g, b] = valeurs;
  const alpha = valeurs.length > 3 ? valeurs[3] : 1;

  return `rgb(${[r, g, b].map((c, i) => c * alpha + dessous[i] * (1 - alpha)).join(', ')})`;
}

/** Luminance relative WCAG d'une couleur `rgb()` / `rgba()`. */
function luminance(couleur) {
  const [r, g, b] = couleur
    .match(/[\d.]+/g)
    .slice(0, 3)
    .map(Number);
  const canal = (c) => {
    const s = c / 255;

    return s <= 0.03928 ? s / 12.92 : ((s + 0.055) / 1.055) ** 2.4;
  };

  return 0.2126 * canal(r) + 0.7152 * canal(g) + 0.0722 * canal(b);
}

/** Rapport de contraste WCAG entre deux couleurs. */
function contraste(avant, arriere) {
  const [a, b] = [luminance(avant), luminance(arriere)].sort((x, y) => y - x);

  return (a + 0.05) / (b + 0.05);
}

test('le changement de thème est persisté après rechargement', async ({ page }) => {
  await page.goto('/components');

  // La persistance passe par un POST : on attend sa réponse avant de recharger,
  // sinon le test course avec la requête.
  const persistance = page.waitForResponse(
    (r) => r.url().includes('/theme/set') && r.status() === 200
  );
  await page.locator('#theme-select').selectOption('forest-night');
  await persistance;
  await expect(page.locator('html')).toHaveAttribute('theme', 'forest-night');

  await page.reload();
  await expect(page.locator('html')).toHaveAttribute('theme', 'forest-night');
  await expect(page.locator('#theme-select')).toHaveValue('forest-night');
});

test('chaque thème repeint réellement la page au changement à chaud', async ({ page }) => {
  await page.goto('/components');
  await page.waitForLoadState('networkidle');

  const fonds = new Map();

  for (const nom of NOMS) {
    await appliquerTheme(page, nom);

    const mesure = await page.evaluate(() => {
      const body = getComputedStyle(document.body);
      const sidebar = document.querySelector('.fixed.inset-y-0');
      const principal = document.querySelector('#main-content').parentElement;

      return {
        fond: body.backgroundColor,
        degrade: body.backgroundImage,
        texte: body.color,
        sidebar: getComputedStyle(sidebar).backgroundColor,
        principal: getComputedStyle(principal).backgroundColor,
        variable: body.getPropertyValue('--color-background').trim(),
      };
    });

    // Le fond peint doit suivre le thème : c'est exactement ce qui restait figé
    // sur la valeur du chargement initial. Certains thèmes (« glass ») peignent
    // un dégradé plutôt qu'une couleur unie.
    const peint = mesure.fond !== 'rgba(0, 0, 0, 0)' || mesure.degrade !== 'none';
    expect(peint, `${nom} : le body n'est pas repeint`).toBe(true);

    if (mesure.degrade === 'none') {
      expect(mesure.principal, `${nom} : le conteneur principal n'est pas repeint`).toBe(
        mesure.fond
      );
    }

    fonds.set(nom, mesure);
  }

  // Des thèmes distincts ne doivent pas tous rendre la même couleur : cela
  // signalerait un thème qui ne s'applique pas.
  const distincts = new Set([...fonds.values()].map((m) => m.fond + m.degrade));
  expect(distincts.size, 'Tous les thèmes rendent le même fond').toBeGreaterThan(5);
});

test('le texte principal reste lisible dans chaque thème (WCAG AA)', async ({ page }) => {
  await page.goto('/components');
  await page.waitForLoadState('networkidle');

  const insuffisants = [];

  for (const nom of NOMS) {
    await appliquerTheme(page, nom);

    const { fond, texte } = await page.evaluate(() => {
      const body = getComputedStyle(document.body);

      return { fond: body.backgroundColor, texte: body.color };
    });

    // Le fond du canvas est blanc : c'est sur lui que se compose un thème
    // translucide.
    const ratio = contraste(aplatir(texte), aplatir(fond));
    if (ratio < 4.5) {
      insuffisants.push(`${nom} : ${ratio.toFixed(2)}:1 (texte ${texte} sur ${fond})`);
    }
  }

  expect(
    insuffisants,
    `Contraste texte/fond sous le seuil AA (4.5:1) :\n  ${insuffisants.join('\n  ')}`
  ).toEqual([]);
});
