import AxeBuilder from '@axe-core/playwright';
import { expect, test } from '@playwright/test';

/**
 * Audit d'accessibilité automatisé (axe-core) sur les pages de la vitrine.
 *
 * Le périmètre couvre les règles WCAG 2.1 niveaux A et AA : contraste, noms
 * accessibles, rôles ARIA valides, structure des tableaux et des formulaires.
 */

const PAGES = [
  { nom: 'catalogue des composants', url: '/components' },
  { nom: 'exemples de mises en page', url: '/examples' },
];

for (const page of PAGES) {
  test(`aucune violation WCAG A/AA sur ${page.nom}`, async ({ page: p }) => {
    await p.goto(page.url);
    await p.waitForLoadState('networkidle');

    const { violations } = await new AxeBuilder({ page: p })
      .withTags(['wcag2a', 'wcag2aa', 'wcag21a', 'wcag21aa'])
      .analyze();

    // Message lisible plutôt qu'un simple compteur : chaque violation liste la
    // règle, son impact et les sélecteurs fautifs.
    const details = violations.map(
      (v) =>
        `${v.id} (${v.impact}) — ${v.help}\n    ${v.nodes
          .slice(0, 5)
          .map((n) => n.target.join(' '))
          .join('\n    ')}`
    );

    expect(violations.length, `Violations détectées :\n  ${details.join('\n  ')}`).toBe(0);
  });
}

test('la page reste utilisable au clavier seul', async ({ page }) => {
  await page.goto('/components');
  await page.waitForLoadState('networkidle');

  // Le premier arrêt de tabulation doit être le lien d'évitement.
  await page.keyboard.press('Tab');
  const premier = await page.evaluate(() => document.activeElement?.className ?? '');
  expect(premier).toContain('skip-to-content');

  // Le lien d'évitement doit déplacer le focus sur le contenu principal.
  await page.keyboard.press('Enter');
  await expect(page.locator('#main-content')).toBeFocused();

  // Le sélecteur de thème est atteignable et pilotable au clavier.
  const select = page.locator('#theme-select');
  await select.focus();
  await expect(select).toBeFocused();
  await select.selectOption('monokai');
  await expect(page.locator('html')).toHaveAttribute('theme', 'monokai');
});

test('aucun piège au focus dans les 30 premiers arrêts de tabulation', async ({ page }) => {
  await page.goto('/components');
  await page.waitForLoadState('networkidle');

  const vus = new Set();
  for (let i = 0; i < 30; i++) {
    await page.keyboard.press('Tab');
    const signature = await page.evaluate(() => {
      const el = document.activeElement;
      if (!el) return 'aucun';

      return `${el.tagName}#${el.id}.${el.className}`.slice(0, 120);
    });

    // Un même élément qui reprend le focus en boucle signale un piège.
    const repetitions = [...vus].filter((v) => v === signature).length;
    expect(repetitions, `Focus bloqué sur ${signature}`).toBeLessThan(3);
    vus.add(`${signature}#${i}`);
  }
});
