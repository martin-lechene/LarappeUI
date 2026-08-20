/**
 * Logique de filtrage partagée par les composants de sélection
 * (`select-async`, `combobox-virtual`).
 *
 * Elle n'impose pas la provenance des options : `loadOptions(query)` peut
 * interroger un endpoint distant ou filtrer une collection locale.
 */

/**
 * @param {string} query
 * @param {{label: string, value: string}[]} options
 */
export function filterOptions(query, options) {
  const needle = query.trim().toLowerCase();

  if (needle === '') return options;

  return options.filter((option) => String(option.label).toLowerCase().includes(needle));
}

/**
 * @param {object} config
 * @param {(query: string) => Promise<{label: string, value: string}[]>} config.loadOptions
 * @param {number} [config.debounce] délai avant déclenchement de la recherche
 */
export function createFilterable({ loadOptions, debounce = 300 }) {
  return {
    q: '',
    value: '',
    label: '',
    options: [],
    loading: false,
    open: false,
    error: null,
    _timer: null,

    search() {
      clearTimeout(this._timer);
      this._timer = setTimeout(() => this.run(), debounce);
    },

    async run() {
      this.loading = true;
      this.open = true;
      this.error = null;

      try {
        this.options = await loadOptions(this.q);
      } catch (error) {
        this.options = [];
        this.error = error instanceof Error ? error.message : 'Recherche impossible';
      } finally {
        this.loading = false;
      }
    },

    choose(option) {
      this.value = option.value;
      this.label = option.label;
      this.q = option.label;
      this.open = false;
    },

    close() {
      this.open = false;
    },
  };
}
