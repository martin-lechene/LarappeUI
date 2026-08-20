#!/usr/bin/env node
/**
 * Capture des pages de la vitrine dans plusieurs thèmes et formats.
 *
 *   node scripts/screenshots.mjs [dossier]
 *
 * Le serveur doit tourner (`php artisan serve --port=8901`) et les assets être
 * buildés (`npm run build`).
 */

import fs from 'node:fs';
import path from 'node:path';

import { chromium } from '@playwright/test';

const BASE = process.env.E2E_URL ?? 'http://127.0.0.1:8901';
const SORTIE = process.argv[2] ?? 'storage/screenshots';

const THEMES = ['light', 'dark', 'monokai', 'glass', 'sakura'];
const FORMATS = [
  { nom: 'bureau', width: 1440, height: 900 },
  { nom: 'mobile', width: 375, height: 812 },
];

fs.mkdirSync(SORTIE, { recursive: true });

const navigateur = await chromium.launch();

for (const format of FORMATS) {
  const page = await navigateur.newPage({
    viewport: { width: format.width, height: format.height },
  });

  for (const theme of THEMES) {
    for (const vue of ['components', 'examples']) {
      await page.goto(`${BASE}/${vue}`, { waitUntil: 'networkidle' });
      await page.locator('#theme-select').selectOption(theme);
      await page.waitForFunction(
        (attendu) => document.documentElement.getAttribute('theme') === attendu,
        theme
      );
      // Laisse la transition de thème se terminer avant la capture.
      await page.waitForTimeout(400);

      const fichier = path.join(SORTIE, `${vue}-${theme}-${format.nom}.png`);
      await page.screenshot({ path: fichier, fullPage: false });
      console.log(fichier);
    }
  }

  await page.close();
}

await navigateur.close();
