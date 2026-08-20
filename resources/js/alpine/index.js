/**
 * Enregistrement des composants Alpine de LarappeUI.
 *
 * Les composants sont déclarés ici plutôt que dans des balises `<script>`
 * inline : leur définition est ainsi garantie avant `Alpine.start()`, elle est
 * partagée entre les vues et couverte par les tests.
 */
import { createDataTable, createDataTablePro } from './data-table.js';
import { createFilterable, filterOptions } from './filterable.js';

/**
 * @param {import('alpinejs').Alpine} Alpine
 */
export function registerComponents(Alpine) {
  /**
   * Sélecteur interrogeant un endpoint distant.
   * L'endpoint reçoit la recherche via `?q=` et répond une liste
   * `[{label, value}]` (ou `{data: [...]}`).
   */
  Alpine.data('selectAsync', ({ endpoint, debounce = 300 } = {}) =>
    createFilterable({
      debounce,
      loadOptions: async (query) => {
        const url = new URL(endpoint, window.location.origin);
        url.searchParams.set('q', query);

        const response = await fetch(url, {
          headers: { Accept: 'application/json' },
        });

        if (!response.ok) {
          throw new Error(`Requête échouée (${response.status})`);
        }

        const payload = await response.json();
        const options = Array.isArray(payload) ? payload : (payload.data ?? []);

        return options.map((option) => ({
          label: option.label ?? option.name ?? String(option.value ?? option),
          value: option.value ?? option.id ?? option,
        }));
      },
    })
  );

  /**
   * Combobox filtrant une collection locale, rendue par fenêtre pour rester
   * fluide sur de grands volumes.
   */
  Alpine.data('comboboxVirtual', ({ options = [], size = 50 } = {}) => ({
    ...createFilterable({
      debounce: 0,
      loadOptions: async (query) => filterOptions(query, options),
    }),
    all: options,
    start: 0,
    size,

    get filtered() {
      return filterOptions(this.q, this.all);
    },

    get visible() {
      return this.filtered.slice(this.start, this.start + this.size);
    },

    onScroll(event) {
      const { scrollTop, clientHeight, scrollHeight } = event.target;
      if (scrollTop + clientHeight >= scrollHeight - 8) {
        this.start = Math.min(
          this.start + this.size,
          Math.max(this.filtered.length - this.size, 0)
        );
      } else if (scrollTop === 0) {
        this.start = 0;
      }
    },
  }));

  Alpine.data('dataTable', (config) => createDataTable(config));
  Alpine.data('dataTablePro', (config) => createDataTablePro(config));

  /**
   * Zone de dépôt de fichiers : le drop alimente réellement l'input associé.
   */
  Alpine.data('dropzone', ({ multiple = true } = {}) => ({
    over: false,
    files: [],

    handleDrop(event) {
      this.over = false;
      const dropped = Array.from(event.dataTransfer?.files ?? []);
      if (dropped.length === 0) return;

      this.setFiles(multiple ? dropped : dropped.slice(0, 1));
    },

    handleSelect(event) {
      this.files = Array.from(event.target.files ?? []).map((file) => ({
        name: file.name,
        size: file.size,
      }));
    },

    /**
     * Recopie les fichiers déposés dans l'input pour qu'ils soient soumis avec
     * le formulaire.
     *
     * @param {File[]} files
     */
    setFiles(files) {
      const input = this.$refs.input;

      if (input && typeof DataTransfer !== 'undefined') {
        const transfer = new DataTransfer();
        files.forEach((file) => transfer.items.add(file));
        input.files = transfer.files;
        input.dispatchEvent(new Event('change', { bubbles: true }));
      }

      this.files = files.map((file) => ({ name: file.name, size: file.size }));
    },

    remove(index) {
      const input = this.$refs.input;
      this.files.splice(index, 1);

      if (input && typeof DataTransfer !== 'undefined') {
        const transfer = new DataTransfer();
        Array.from(input.files ?? [])
          .filter((_, position) => position !== index)
          .forEach((file) => transfer.items.add(file));
        input.files = transfer.files;
      }
    },
  }));
}

export default registerComponents;
