@props(['columns' => [], 'rows' => [], 'caption' => 'Tableau de données avec sélection multiple'])
{{-- Composant Alpine `dataTablePro` : resources/js/alpine/data-table.js --}}
<div x-data="dataTablePro({ columns: @js($columns), rows: @js($rows) })" class="space-y-3">
  <div class="flex items-center justify-between">
    <div class="flex items-center gap-2">
      <x-form.input placeholder="Rechercher..." aria-label="Rechercher dans le tableau" x-model="q" class="w-64" />
      <x-extra.select-async endpoint="/api/filters" name="table-filter" label="Filtrer les résultats" />
    </div>
    <div class="flex items-center gap-2">
      <x-dropdown>
        <x-slot name="trigger"><x-button size="sm">Colonnes</x-button></x-slot>
        <div class="p-2 min-w-[200px]">
          <template x-for="col in allColumns" :key="col.key">
            <label class="flex items-center gap-2 py-1 text-sm">
              <input type="checkbox" class="rounded" :checked="visibleKeys.includes(col.key)" @change="toggleColumn(col.key)">
              <span x-text="col.label"></span>
            </label>
          </template>
        </div>
      </x-dropdown>
      <x-dropdown>
        <x-slot name="trigger"><x-button size="sm" x-bind:disabled="selected.size === 0">Actions ( <span x-text="selected.size"></span> )</x-button></x-slot>
        <button type="button" class="block w-full text-left px-4 py-2 hover:bg-gray-50" @click="bulk('export')">Exporter</button>
        <button type="button" class="block w-full text-left px-4 py-2 hover:bg-gray-50 text-red-600" @click="bulk('delete')">Supprimer</button>
      </x-dropdown>
    </div>
  </div>
  <div class="overflow-x-auto border rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
      <caption class="sr-only">{{ $caption }}</caption>
      <thead class="bg-surface">
        <tr>
          <th scope="col" class="px-3 py-2 w-10">
            <input type="checkbox" aria-label="Sélectionner toutes les lignes de la page" @change="toggleAll($event)" :checked="isAllChecked">
          </th>
          <template x-for="col in columns" :key="col.key">
            <th scope="col"
                class="px-4 py-2 text-left text-sm font-semibold cursor-pointer select-none"
                :aria-sort="sort.key === col.key ? (sort.dir === 'asc' ? 'ascending' : 'descending') : 'none'"
                @click="sortBy(col.key)">
              <span x-text="col.label"></span>
              <span x-show="sort.key === col.key" class="ml-1 text-gray-400" aria-hidden="true" x-text="sort.dir === 'asc' ? '▲' : '▼'"></span>
            </th>
          </template>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <template x-for="row in paged" :key="row.__key">
          <tr class="hover:bg-gray-50">
            <td class="px-3 py-2">
              <input type="checkbox" :value="row.__key" :aria-label="`Sélectionner la ligne ${row.__key + 1}`" @change="toggle(row.__key)" :checked="selected.has(row.__key)">
            </td>
            <template x-for="col in columns" :key="col.key">
              <td class="px-4 py-2 text-sm" x-text="row[col.key]"></td>
            </template>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
  <div class="flex items-center justify-between text-sm">
    <div>
      <label class="text-gray-500" for="data-table-pro-page">Page</label>
      <input id="data-table-pro-page" type="number" min="1" class="w-16 border rounded px-2 py-1" x-model.number="page">
      <span class="text-gray-500">/</span>
      <span x-text="pages"></span>
    </div>
    <div class="flex items-center gap-2">
      <button type="button" class="px-2 py-1 border rounded" aria-label="Page précédente" @click="prev" :disabled="page <= 1">Préc.</button>
      <button type="button" class="px-2 py-1 border rounded" aria-label="Page suivante" @click="next" :disabled="page >= pages">Suiv.</button>
    </div>
  </div>
</div>
