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

/* -------------------------------------------------------------------------
 * Contraste (WCAG 2.1)
 *
 * Les palettes sont conservées telles quelles — assombrir un thème « pastel »
 * ou « neon » pour atteindre le ratio AA lui ferait perdre son identité. Ce
 * sont les couleurs de TEXTE posées dessus qui sont calculées : couleur de
 * premier plan sur les aplats colorés, et variante lisible pour le texte
 * coloré affiché sur le fond de page.
 * ---------------------------------------------------------------------- */

/**
 * Composantes RVB d'une couleur `#rgb`, `#rrggbb`, `rgb()` ou `rgba()`.
 *
 * Une couleur translucide est composée sur `dessous` : c'est la couleur
 * réellement perçue qui détermine le contraste. Le thème « glass » repose
 * entièrement sur des `rgba()`, et ignorer leur alpha conduisait à choisir un
 * texte illisible sur ses aplats.
 */
function toRgb(couleur, dessous = [255, 255, 255]) {
  if (couleur.startsWith('rgb')) {
    const valeurs = couleur.match(/[\d.]+/g).map(Number);
    const [r, g, b] = valeurs;
    const alpha = valeurs.length > 3 ? valeurs[3] : 1;

    return [r, g, b].map((c, i) => c * alpha + dessous[i] * (1 - alpha));
  }

  let hex = couleur.replace('#', '');
  if (hex.length === 3) hex = [...hex].map((c) => c + c).join('');

  return [0, 2, 4].map((i) => parseInt(hex.slice(i, i + 2), 16));
}

/** Luminance relative WCAG. */
function luminance(couleur) {
  const [r, g, b] = toRgb(couleur).map((v) => {
    const s = v / 255;

    return s <= 0.03928 ? s / 12.92 : ((s + 0.055) / 1.055) ** 2.4;
  });

  return 0.2126 * r + 0.7152 * g + 0.0722 * b;
}

/** Rapport de contraste entre deux couleurs (1 à 21). */
function contrast(a, b) {
  const [haut, bas] = [luminance(a), luminance(b)].sort((x, y) => y - x);

  return (haut + 0.05) / (bas + 0.05);
}

const versHex = ([r, g, b]) =>
  '#' +
  [r, g, b]
    .map((v) =>
      Math.round(Math.max(0, Math.min(255, v)))
        .toString(16)
        .padStart(2, '0')
    )
    .join('');

/** Mélange deux couleurs (`t` = 0 → couleur, 1 → cible). */
function melange(couleur, cible, t) {
  const [r1, g1, b1] = toRgb(couleur);
  const [r2, g2, b2] = toRgb(cible);

  return versHex([r1 + (r2 - r1) * t, g1 + (g2 - g1) * t, b1 + (b2 - b1) * t]);
}

/** Noir ou blanc — celui qui contraste le mieux avec le fond donné. */
function surCouleur(fond) {
  return contrast('#ffffff', fond) >= contrast('#111111', fond) ? '#ffffff' : '#111111';
}

/**
 * Rapproche `couleur` du noir ou du blanc jusqu'à atteindre le ratio visé sur
 * `fond`, en conservant sa teinte. Retourne la couleur inchangée si elle passe
 * déjà, et la meilleure approximation trouvée sinon.
 */
function lisibleSur(couleur, fond, cible = 4.5) {
  if (contrast(couleur, fond) >= cible) return couleur;

  // On s'éloigne du fond : vers le noir sur fond clair, vers le blanc sinon.
  const direction = luminance(fond) > 0.5 ? '#000000' : '#ffffff';

  let meilleur = couleur;
  for (let t = 0.05; t <= 1; t += 0.05) {
    const candidat = melange(couleur, direction, t);
    meilleur = candidat;
    if (contrast(candidat, fond) >= cible) return candidat;
  }

  return meilleur;
}

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

  // Le texte coloré doit rester lisible sur les deux fonds du thème.
  const fondLePlusExigeant = (couleur) =>
    contrast(couleur, theme.background) <= contrast(couleur, theme.surface)
      ? theme.background
      : theme.surface;

  // Fond « teinté » des badges et alertes : la couleur diluée dans la surface.
  const teinte = (couleur) => melange(theme.surface, couleur, 0.15);

  return [
    // Fonds teintés et leur couleur de texte, calculée sur la teinte elle-même
    // (et non sur la surface) : c'est ce décalage qui laissait les badges et
    // les alertes sous le seuil AA.
    ['--color-primary-tint', teinte(theme.primary)],
    ['--color-success-tint', teinte(theme.success)],
    ['--color-danger-tint', teinte(theme.danger)],
    ['--color-warning-tint', teinte(theme.warning)],
    ['--color-info-tint', teinte(theme.info)],
    ['--color-on-primary-tint', lisibleSur(theme.primary, teinte(theme.primary))],
    ['--color-on-success-tint', lisibleSur(theme.success, teinte(theme.success))],
    ['--color-on-danger-tint', lisibleSur(theme.danger, teinte(theme.danger))],
    ['--color-on-warning-tint', lisibleSur(theme.warning, teinte(theme.warning))],
    ['--color-on-info-tint', lisibleSur(theme.info, teinte(theme.info))],

    // Couleurs de premier plan garantissant AA sur chaque aplat coloré.
    ['--color-on-primary', surCouleur(theme.primary)],
    ['--color-on-secondary', surCouleur(theme.secondary)],
    ['--color-on-success', surCouleur(theme.success)],
    ['--color-on-warning', surCouleur(theme.warning)],
    ['--color-on-danger', surCouleur(theme.danger)],
    ['--color-on-info', surCouleur(theme.info)],
    ['--color-on-accent', surCouleur(theme.accent)],

    // Variantes lisibles pour le texte coloré posé sur le fond de page.
    ['--color-primary-readable', lisibleSur(theme.primary, fondLePlusExigeant(theme.primary))],
    ['--color-success-readable', lisibleSur(theme.success, fondLePlusExigeant(theme.success))],
    ['--color-danger-readable', lisibleSur(theme.danger, fondLePlusExigeant(theme.danger))],
    ['--color-warning-readable', lisibleSur(theme.warning, fondLePlusExigeant(theme.warning))],
    ['--color-info-readable', lisibleSur(theme.info, fondLePlusExigeant(theme.info))],
    ['--color-text-muted-readable', 'var(--color-textSecondary)'],

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
function declarations(theme, { paint = true } = {}) {
  const lines = PALETTE_KEYS.map((key) => {
    // `--color-textSecondary` est consommée directement par les vues
    // (`text-[var(--color-textSecondary)]`) : on émet donc une valeur déjà
    // lisible sur le fond du thème plutôt que la valeur brute de la palette.
    const valeur =
      key === 'textSecondary' ? lisibleSur(theme.textSecondary, theme.surface) : theme[key];

    return `  --color-${key}: ${valeur};`;
  });
  lines.push('');
  lines.push(...semanticVars(theme).map(([name, value]) => `  ${name}: ${value};`));

  if (paint) {
    // Le fond et la couleur de texte sont peints par le bloc du thème lui-même,
    // et non par une règle `body { … var(--color-background) }` séparée : quand
    // la classe (ou l'attribut) change, le sélecteur qui matche change avec lui.
    // Une règle unique dépendant seulement d'une variable héritée n'est pas
    // réévaluée par Chrome au changement de thème — le fond restait figé sur la
    // valeur du chargement initial.
    lines.push('');
    lines.push('  background-color: var(--color-background);');
    lines.push('  color: var(--color-text);');
  }

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

  // Valeurs par défaut sur :root, alignées sur le thème par défaut. `:root` ne
  // peint rien : seul le bloc du thème actif s'en charge.
  chunks.push(`:root {\n${declarations(themes[DEFAULT_THEME], { paint: false })}\n}`);

  for (const [name, theme] of Object.entries(themes)) {
    chunks.push(`.theme-${name},\n[theme='${name}'] {\n${declarations(theme)}\n}`);
  }

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
