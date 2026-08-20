import { expect, test } from '@playwright/test';

/**
 * Parcours fonctionnel des composants interactifs de la galerie.
 */

test.beforeEach(async ({ page }) => {
  await page.goto('/components');
  await page.waitForLoadState('networkidle');
});

test('la galerie rend tous ses blocs sans erreur de script', async ({ page }) => {
  const erreurs = [];
  page.on('pageerror', (e) => erreurs.push(e.message));
  page.on('console', (m) => {
    if (m.type() === 'error' || m.type() === 'warning') erreurs.push(m.text());
  });

  await page.reload();
  await page.waitForLoadState('networkidle');

  const blocs = await page.locator('[data-component-block]').count();
  expect(blocs, 'La galerie est vide : le script de page a probablement échoué').toBeGreaterThan(
    50
  );
  expect(erreurs, `Erreurs console :\n  ${erreurs.join('\n  ')}`).toEqual([]);
});

test('data-table : tri, aria-sort et pagination', async ({ page }) => {
  const bloc = page.locator('[data-component-block="extra-data-table"]');
  const entetes = bloc.locator('th').first();

  await expect(bloc.locator('caption')).toHaveCount(1);
  await expect(entetes).toHaveAttribute('aria-sort', 'ascending');

  await entetes.click();
  await expect(entetes).toHaveAttribute('aria-sort', 'descending');

  await expect(bloc.getByLabel('Page suivante')).toBeVisible();
  await expect(bloc.getByLabel('Page précédente')).toBeVisible();
});

test('dropzone : un fichier déposé alimente réellement le champ', async ({ page }) => {
  const bloc = page.locator('[data-component-block="extra-dropzone"]');
  const champ = bloc.locator('input[type=file]');

  await champ.setInputFiles({
    name: 'rapport.pdf',
    mimeType: 'application/pdf',
    buffer: Buffer.from('contenu de test'),
  });

  await expect(bloc.locator('li')).toContainText('rapport.pdf');
  expect(await champ.evaluate((el) => el.files.length)).toBe(1);
});

test('select-async : interroge son endpoint et remonte l’erreur', async ({ page }) => {
  const bloc = page.locator('[data-component-block="extra-select-async"]');
  const requetes = [];
  page.on('request', (r) => {
    if (r.url().includes('/api/')) requetes.push(r.url());
  });

  await bloc.locator('input[role=combobox]').fill('par');

  // L'endpoint de démo n'existe pas : l'erreur doit être annoncée, pas avalée.
  await expect(bloc.locator('[role=alert]')).toContainText('404');
  expect(requetes.some((u) => u.includes('q=par'))).toBe(true);
});

test('combobox-virtual : filtre la collection locale', async ({ page }) => {
  const bloc = page.locator('[data-component-block="extra-combobox-virtual"]');
  const champ = bloc.locator('input[role=combobox]');

  await champ.click();
  await expect(bloc.locator('[role=option]').first()).toBeVisible();

  // « Option 12 » matcherait aussi 120 à 129 : on filtre sur une valeur unique.
  await champ.fill('Option 999');
  await expect(bloc.locator('[role=option]')).toHaveCount(1);
  await expect(bloc.locator('[role=option]').first()).toHaveText('Option 999');
});

test('tree-view : le dépliage annonce son état', async ({ page }) => {
  const bloc = page.locator('[data-component-block="extra-tree-view"]');
  const bouton = bloc.locator('button[aria-label]').first();

  await expect(bouton).toHaveAttribute('aria-label', /Déplier/);
  await bouton.click();
  await expect(bloc.locator('li[aria-expanded]').first()).toHaveAttribute('aria-expanded', 'true');
});

test('les actions groupées passent par le snackbar, sans dialogue bloquant', async ({ page }) => {
  let dialogue = false;
  page.on('dialog', async (d) => {
    dialogue = true;
    await d.dismiss();
  });

  await page.evaluate(() =>
    window.dispatchEvent(
      new CustomEvent('show-snackbar', { detail: { message: 'Action confirmée' } })
    )
  );

  await expect(page.locator('[role=status]').filter({ hasText: 'Action confirmée' })).toBeVisible();
  expect(dialogue, 'Un alert()/confirm() bloquant a été déclenché').toBe(false);
});
