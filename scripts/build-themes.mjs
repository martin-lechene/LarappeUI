#!/usr/bin/env node
/**
 * Génère `resources/css/themes.css` à partir des palettes déclarées dans
 * `resources/js/themes.js` et des partiels de `resources/css/themes/`.
 *
 *   npm run themes:build          régénère le fichier
 *   npm run themes:check          échoue si le fichier est désynchronisé
 *
 * Le fichier généré porte les deux jeux de variables consommés par
 * l'application :
 *  - `--color-*`  : palette brute, utilisée par les vues Blade et les
 *                   utilitaires Tailwind rethémés ;
 *  - variables sémantiques (`--primary`, `--background`, `--tooltip-bg`…) :
 *                   utilisées par `resources/css/app.css` et les composants.
 *
 * Les deux sont émis sur `.theme-<nom>` (posé sur <body>) ET sur
 * `[theme='<nom>']` (posé sur <html>), pour que les règles ciblant l'élément
 * racine résolvent elles aussi les variables.
 */

import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

import { themes, DEFAULT_THEME } from '../resources/js/themes.js';

const root = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const partialsDir = path.join(root, 'resources/css/themes');
const outFile = path.join(root, 'resources/css/themes.css');

/** Couleurs de la palette exposées en `--color-<clé>`. */
const PALETTE_KEYS = [
  'primary',
  'secondary',
  'success',
  'warning',
  'danger',
  'info',
  'background',
  'surface',
  'text',
  'textSecondary',
  'border',
  'accent',
];

/**
 * Variables sémantiques dérivées de la palette.
 *
 * @param {Record<string, string|boolean>} theme
 * @returns {[string, string][]}
 */
function semanticVars(theme) {
  const shadow = theme.dark ? '0 1px 3px 0 rgba(0, 0, 0, 0.4)' : '0 1px 2px 0 rgba(0, 0, 0, 0.06)';

  return [
    ['--primary', 'var(--color-primary)'],
    ['--secondary', 'var(--color-secondary)'],
    ['--accent', 'var(--color-accent)'],
    ['--success', 'var(--color-success)'],
    ['--warning', 'var(--color-warning)'],
    ['--danger', 'var(--color-danger)'],
    ['--info', 'var(--color-info)'],
    ['--background', 'var(--color-background)'],
    ['--surface', 'var(--color-surface)'],
    ['--text', 'var(--color-text)'],
    ['--text-muted', 'var(--color-textSecondary)'],
    ['--text-inverse', theme.dark ? '#111827' : '#ffffff'],
    ['--border', 'var(--color-border)'],
    ['--divider', 'var(--color-border)'],
    ['--focus-ring', 'var(--color-primary)'],
    ['--selection-bg', 'var(--color-primary)'],
    ['--card-bg', 'var(--color-surface)'],
    ['--modal-bg', 'var(--color-surface)'],
    ['--sidebar-bg', 'var(--color-surface)'],
    ['--tooltip-bg', 'var(--color-text)'],
    ['--tooltip-text', 'var(--color-background)'],
    ['--shadow', shadow],
    ['--badge-bg-primary', 'color-mix(in srgb, var(--color-primary) 15%, transparent)'],
    ['--badge-text-primary', 'var(--color-primary)'],
    ['--progress-bg-green', 'var(--color-success)'],
    ['--spinner-color-green', 'var(--color-success)'],
  ];
}

/**
 * Rend le bloc de déclarations d'un thème.
 *
 * @param {Record<string, string|boolean>} theme
 */
function declarations(theme) {
  const lines = PALETTE_KEYS.map((key) => `  --color-${key}: ${theme[key]};`);
  lines.push('');
  lines.push(...semanticVars(theme).map(([name, value]) => `  ${name}: ${value};`));

  return lines.join('\n');
}

/**
 * Préfixe chaque sélecteur de premier niveau d'un partiel par `.theme-<nom>`.
 *
 * @param {string} css
 * @param {string} themeName
 */
function scopePartial(css, themeName) {
  const scope = `.theme-${themeName}`;
  const withoutComments = css.replace(/\/\*[\s\S]*?\*\//g, '');
  const rules = [];

  const rulePattern = /([^{}]+)\{([^{}]*)\}/g;
  let match;

  while ((match = rulePattern.exec(withoutComments)) !== null) {
    const selectors = match[1]
      .split(',')
      .map((selector) => selector.trim())
      .filter(Boolean)
      .map((selector) =>
        // `body` porte lui-même la classe de thème : on la lui accole au lieu
        // de la traiter comme un ancêtre.
        selector === 'body' ? `body${scope}` : `${scope} ${selector}`
      );

    const body = match[2].trim();
    if (body === '') continue;

    rules.push(`${selectors.join(',\n')} {\n  ${body.replace(/\n\s*/g, '\n  ')}\n}`);
  }

  return rules.join('\n\n');
}

function readPartial(name) {
  return fs.readFileSync(path.join(partialsDir, name), 'utf8').trim();
}

function build() {
  const chunks = [];

  chunks.push(`/*
 * FICHIER GÉNÉRÉ — NE PAS ÉDITER À LA MAIN.
 *
 * Source des palettes : resources/js/themes.js
 * Partiels            : resources/css/themes/_*.css
 * Régénération        : npm run themes:build
 */`);

  // Valeurs par défaut sur :root, alignées sur le thème par défaut.
  chunks.push(`:root {\n${declarations(themes[DEFAULT_THEME])}\n}`);

  for (const [name, theme] of Object.entries(themes)) {
    chunks.push(`.theme-${name},\n[theme='${name}'] {\n${declarations(theme)}\n}`);
  }

  chunks.push(`body {
  background-color: var(--color-background);
  color: var(--color-text);
}`);

  chunks.push(readPartial('_utilities.css'));

  for (const name of ['2d', 'glass']) {
    const partial = path.join(partialsDir, `_theme-${name}.css`);
    if (!fs.existsSync(partial)) continue;
    chunks.push(scopePartial(fs.readFileSync(partial, 'utf8').trim(), name));
  }

  return `${chunks.join('\n\n')}\n`;
}

const generated = build();
const check = process.argv.includes('--check');

if (check) {
  const current = fs.existsSync(outFile) ? fs.readFileSync(outFile, 'utf8') : '';
  if (current !== generated) {
    console.error(
      'resources/css/themes.css est désynchronisé de ses sources. Lancez `npm run themes:build`.'
    );
    process.exit(1);
  }
  console.log('resources/css/themes.css est à jour.');
} else {
  fs.writeFileSync(outFile, generated);
  console.log(
    `resources/css/themes.css généré (${Object.keys(themes).length} thèmes, ${generated.split('\n').length} lignes).`
  );
}
