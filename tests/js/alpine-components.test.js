import { beforeEach, describe, expect, it, vi } from 'vitest';

import { createFilterable, filterOptions } from '../../resources/js/alpine/filterable.js';
import { createDataTable, createDataTablePro } from '../../resources/js/alpine/data-table.js';
import { registerComponents } from '../../resources/js/alpine/index.js';

const rows = [
  { name: 'Alice', role: 'Admin' },
  { name: 'Bob', role: 'Éditeur' },
  { name: 'Carole', role: 'Lecteur' },
];
const columns = [
  { key: 'name', label: 'Nom' },
  { key: 'role', label: 'Rôle' },
];

describe('filterOptions', () => {
  const options = [
    { label: 'Paris', value: 'paris' },
    { label: 'Lyon', value: 'lyon' },
  ];

  it('retourne tout pour une recherche vide', () => {
    expect(filterOptions('  ', options)).toEqual(options);
  });

  it('filtre sans tenir compte de la casse', () => {
    expect(filterOptions('PAR', options)).toEqual([options[0]]);
  });
});

describe('createFilterable', () => {
  it('charge les options et sélectionne une valeur', async () => {
    const filterable = createFilterable({
      debounce: 0,
      loadOptions: async () => [{ label: 'Lille', value: 'lille' }],
    });

    await filterable.run();

    expect(filterable.options).toHaveLength(1);
    expect(filterable.loading).toBe(false);

    filterable.choose(filterable.options[0]);
    expect(filterable.value).toBe('lille');
    expect(filterable.open).toBe(false);
  });

  it('expose une erreur exploitable quand le chargement échoue', async () => {
    const filterable = createFilterable({
      debounce: 0,
      loadOptions: async () => {
        throw new Error('Requête échouée (500)');
      },
    });

    await filterable.run();

    expect(filterable.error).toBe('Requête échouée (500)');
    expect(filterable.options).toEqual([]);
    expect(filterable.loading).toBe(false);
  });
});

describe('selectAsync', () => {
  let components;

  beforeEach(() => {
    components = {};
    registerComponents({ data: (name, factory) => (components[name] = factory) });
  });

  it("interroge l'endpoint déclaré", async () => {
    const fetchMock = vi.fn(async () => ({
      ok: true,
      json: async () => [{ label: 'Nantes', value: 'nantes' }],
    }));
    vi.stubGlobal('fetch', fetchMock);

    const component = components.selectAsync({ endpoint: '/api/villes', debounce: 0 });
    component.q = 'nan';
    await component.run();

    const calledUrl = new URL(fetchMock.mock.calls[0][0]);
    expect(calledUrl.pathname).toBe('/api/villes');
    expect(calledUrl.searchParams.get('q')).toBe('nan');
    expect(component.options).toEqual([{ label: 'Nantes', value: 'nantes' }]);

    vi.unstubAllGlobals();
  });

  it('signale une réponse en erreur', async () => {
    vi.stubGlobal(
      'fetch',
      vi.fn(async () => ({ ok: false, status: 503, json: async () => ({}) }))
    );

    const component = components.selectAsync({ endpoint: '/api/villes', debounce: 0 });
    await component.run();

    expect(component.error).toContain('503');

    vi.unstubAllGlobals();
  });
});

describe('createDataTable', () => {
  it('filtre, trie et pagine', () => {
    const table = createDataTable({ columns, rows, pageSize: 2 });

    expect(table.pages).toBe(2);
    expect(table.paged).toHaveLength(2);

    table.q = 'carole';
    expect(table.filtered).toHaveLength(1);

    table.q = '';
    // La première colonne est triée par défaut : re-cliquer inverse le sens.
    expect(table.sort).toEqual({ key: 'name', dir: 'asc' });
    table.sortBy('name');
    expect(table.sort.dir).toBe('desc');
    expect(table.filtered[0].name).toBe('Carole');

    table.sortBy('role');
    expect(table.sort).toEqual({ key: 'role', dir: 'asc' });
    expect(table.filtered[0].role).toBe('Admin');
  });

  it('borne la navigation entre pages', () => {
    const table = createDataTable({ columns, rows, pageSize: 2 });

    table.prev();
    expect(table.page).toBe(1);
    table.next();
    table.next();
    expect(table.page).toBe(2);
  });
});

describe('createDataTablePro', () => {
  it('gère la sélection et les colonnes visibles', () => {
    const table = createDataTablePro({ columns, rows, pageSize: 10 });

    table.toggle(0);
    expect(table.selected.has(0)).toBe(true);
    table.toggle(0);
    expect(table.selected.has(0)).toBe(false);

    table.toggleAll({ target: { checked: true } });
    expect(table.isAllChecked).toBe(true);

    table.toggleColumn('role');
    expect(table.columns.map((c) => c.key)).toEqual(['name']);
  });

  it('notifie les actions groupées via le snackbar', () => {
    const table = createDataTablePro({ columns, rows });
    const listener = vi.fn();
    window.addEventListener('show-snackbar', listener);

    table.toggle(1);
    table.bulk('export');

    expect(listener).toHaveBeenCalled();
    expect(listener.mock.calls[0][0].detail.message).toContain('export');
  });
});

describe('dropzone', () => {
  let components;

  beforeEach(() => {
    components = {};
    registerComponents({ data: (name, factory) => (components[name] = factory) });
  });

  it('enregistre les fichiers déposés', () => {
    const component = components.dropzone({ multiple: true });
    component.$refs = {};

    const file = new File(['contenu'], 'rapport.pdf', { type: 'application/pdf' });
    component.handleDrop({ dataTransfer: { files: [file] } });

    expect(component.over).toBe(false);
    expect(component.files).toEqual([{ name: 'rapport.pdf', size: file.size }]);
  });

  it('ne garde qu’un fichier quand multiple est désactivé', () => {
    const component = components.dropzone({ multiple: false });
    component.$refs = {};

    component.handleDrop({
      dataTransfer: {
        files: [new File(['a'], 'a.txt'), new File(['b'], 'b.txt')],
      },
    });

    expect(component.files.map((f) => f.name)).toEqual(['a.txt']);
  });

  it('ignore un drop sans fichier', () => {
    const component = components.dropzone();
    component.$refs = {};
    component.over = true;

    component.handleDrop({ dataTransfer: { files: [] } });

    expect(component.over).toBe(false);
    expect(component.files).toEqual([]);
  });
});
