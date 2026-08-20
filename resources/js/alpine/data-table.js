/**
 * Logique commune aux tableaux de données (`data-table`, `data-table-pro`) :
 * recherche plein texte, tri par colonne et pagination.
 */

/**
 * @param {object} config
 * @param {{key: string, label: string}[]} config.columns
 * @param {Record<string, unknown>[]} config.rows
 * @param {number} [config.pageSize]
 */
export function createDataTable({ columns, rows, pageSize = 10 }) {
  return {
    columns,
    original: rows.map((row, index) => ({ ...row, __key: index })),
    q: '',
    sort: { key: columns[0]?.key || '', dir: 'asc' },
    page: 1,
    pageSize,

    get filtered() {
      const needle = this.q.toLowerCase();
      const filtered = this.original.filter(
        (row) =>
          !needle ||
          Object.values(row).some((value) => String(value).toLowerCase().includes(needle))
      );

      const { key, dir } = this.sort;
      if (!key) return filtered;

      // `toSorted` éviterait la copie explicite, mais la copie garde le
      // comportement identique sur les navigateurs plus anciens.
      return [...filtered].sort(
        (a, b) => String(a[key]).localeCompare(String(b[key])) * (dir === 'asc' ? 1 : -1)
      );
    },

    get pages() {
      return Math.max(1, Math.ceil(this.filtered.length / this.pageSize));
    },

    get paged() {
      if (this.page > this.pages) this.page = this.pages;
      const start = (this.page - 1) * this.pageSize;

      return this.filtered.slice(start, start + this.pageSize);
    },

    sortBy(key) {
      if (this.sort.key === key) {
        this.sort.dir = this.sort.dir === 'asc' ? 'desc' : 'asc';
      } else {
        this.sort.key = key;
        this.sort.dir = 'asc';
      }
    },

    next() {
      if (this.page < this.pages) this.page++;
    },

    prev() {
      if (this.page > 1) this.page--;
    },
  };
}

/**
 * Variante « pro » : colonnes masquables et sélection multiple.
 */
export function createDataTablePro({ columns, rows, pageSize = 10 }) {
  return {
    ...createDataTable({ columns, rows, pageSize }),
    allColumns: columns,
    visibleKeys: columns.map((column) => column.key),
    selected: new Set(),

    get columns() {
      return this.allColumns.filter((column) => this.visibleKeys.includes(column.key));
    },

    get isAllChecked() {
      return this.paged.length > 0 && this.paged.every((row) => this.selected.has(row.__key));
    },

    toggleColumn(key) {
      const index = this.visibleKeys.indexOf(key);
      if (index > -1) this.visibleKeys.splice(index, 1);
      else this.visibleKeys.push(key);
    },

    toggle(id) {
      if (this.selected.has(id)) this.selected.delete(id);
      else this.selected.add(id);
    },

    toggleAll(event) {
      this.paged.forEach((row) => {
        if (event.target.checked) this.selected.add(row.__key);
        else this.selected.delete(row.__key);
      });
    },

    /**
     * Notifie l'action groupée via le composant snackbar plutôt qu'un `alert()`,
     * qui bloque le thread et casse la navigation clavier.
     */
    bulk(action) {
      window.dispatchEvent(
        new CustomEvent('show-snackbar', {
          detail: { message: `${action} → ${this.selected.size} élément(s)` },
        })
      );
    },
  };
}
