import { expect, test } from '@playwright/test';

/**
 * Vérifie le comportement responsive : pas de débordement horizontal, et
 * sidebar escamotable sur mobile.
 */

const TAILLES = [
  { nom: 'mobile', width: 375, height: 812 },
  { nom: 'tablette', width: 768, height: 1024 },
  { nom: 'ordinateur portable', width: 1280, height: 800 },
  { nom: 'grand écran', width: 1920, height: 1080 },
];

for (const taille of TAILLES) {
  for (const url of ['/components', '/examples']) {
    test(`aucun débordement horizontal en ${taille.nom} sur ${url}`, async ({ page }) => {
      await page.setViewportSize({ width: taille.width, height: taille.height });
      await page.goto(url);
      await page.waitForLoadState('networkidle');

      const debordement = await page.evaluate(() => ({
        largeurDocument: document.documentElement.scrollWidth,
        largeurFenetre: window.innerWidth,
        coupables: [...document.querySelectorAll('body *')]
          .filter((el) => el.getBoundingClientRect().right > window.innerWidth + 1)
          .slice(0, 5)
          .map((el) => `${el.tagName}.${String(el.className).slice(0, 60)}`),
      }));

      expect(
        debordement.largeurDocument,
        `Débordement de ${debordement.largeurDocument - debordement.largeurFenetre}px. ` +
          `Éléments : ${debordement.coupables.join(' | ')}`
      ).toBeLessThanOrEqual(debordement.largeurFenetre + 1);
    });
  }
}

test('la sidebar est escamotable sur mobile', async ({ page }) => {
  await page.setViewportSize({ width: 375, height: 812 });
  await page.goto('/components');
  await page.waitForLoadState('networkidle');

  const ouvrir = page.getByLabel('Ouvrir le menu');
  await expect(ouvrir).toBeVisible();

  await ouvrir.click();
  await expect(page.getByLabel('Fermer le menu')).toBeVisible();

  await page.getByLabel('Fermer le menu').click();
  await expect(ouvrir).toBeVisible();
});

test('la sidebar est visible en permanence sur grand écran', async ({ page }) => {
  await page.setViewportSize({ width: 1440, height: 900 });
  await page.goto('/components');
  await page.waitForLoadState('networkidle');

  await expect(page.locator('#theme-select')).toBeVisible();
  await expect(page.getByLabel('Ouvrir le menu')).toBeHidden();
});
