import { expect, test } from '@playwright/test';

/**
 * Formulaire de contact : soumission AJAX, validation serveur et limitation de
 * débit.
 */

test.beforeEach(async ({ page }) => {
  await page.goto('/examples');
  await page.waitForLoadState('networkidle');
});

/**
 * La page comporte plusieurs formulaires de démonstration : on cible celui du
 * bloc « Formulaire de contact » pour éviter toute ambiguïté de sélecteur.
 */
const contact = (page) => page.locator('[x-data="contactForm()"]');

test('une soumission valide affiche la confirmation', async ({ page }) => {
  const bloc = contact(page);
  await bloc.getByLabel('Nom').fill('Camille Martin');
  await bloc.getByLabel('Email').fill('camille@example.com');
  await bloc.getByLabel('Message').fill('Bonjour, ceci est un message de test.');
  await bloc.getByRole('button', { name: /Envoyer/ }).click();

  await expect(bloc.locator('[role=status]').filter({ hasText: 'Message envoyé' })).toBeVisible();
});

test('les erreurs de validation serveur sont annoncées', async ({ page }) => {
  const bloc = contact(page);
  await bloc.getByLabel('Email').fill('pas-un-email');
  await bloc.getByRole('button', { name: /Envoyer/ }).click();

  const alerte = bloc.locator('[role=alert]');
  await expect(alerte).toBeVisible();
  await expect(alerte).not.toBeEmpty();
});

test('le jeton CSRF accompagne la requête', async ({ page }) => {
  const entetes = [];
  page.on('request', (r) => {
    if (r.url().includes('/contact')) entetes.push(r.headers()['x-csrf-token']);
  });

  const bloc = contact(page);
  await bloc.getByLabel('Nom').fill('Test CSRF');
  await bloc.getByLabel('Email').fill('csrf@example.com');
  await bloc.getByLabel('Message').fill('Vérification du jeton.');
  await bloc.getByRole('button', { name: /Envoyer/ }).click();

  await expect(bloc.locator('[role=status]').filter({ hasText: 'Message envoyé' })).toBeVisible();
  expect(entetes.filter(Boolean).length, 'Aucun en-tête X-CSRF-TOKEN envoyé').toBeGreaterThan(0);
});
