@props(['columns' => [], 'rows' => [], 'caption' => 'Tableau de données'])
{{-- Composant Alpine `dataTable` : resources/js/alpine/data-table.js --}}
<div x-data="dataTable({ columns: @js($columns), rows: @js($rows) })" class="space-y-2">
  <div class="flex items-center justify-between">
    <x-form.input placeholder="Rechercher..." aria-label="Rechercher dans le tableau" x-model="q" class="w-64" />
    <div class="text-xs text-gray-500" role="status" aria-live="polite" x-text="`${filtered.length} résultats`"></div>
  </div>
  <div class="overflow-x-auto border rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
      <caption class="sr-only">{{ $caption }}</caption>
      <thead class="bg-surface">
        <tr>
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
      <label class="text-gray-500" for="data-table-page">Page</label>
      <input id="data-table-page" type="number" min="1" class="w-16 border rounded px-2 py-1" x-model.number="page">
      <span class="text-gray-500">/</span>
      <span x-text="pages"></span>
    </div>
    <div class="flex items-center gap-2">
      <button type="button" class="px-2 py-1 border rounded" aria-label="Page précédente" @click="prev" :disabled="page <= 1">Préc.</button>
      <button type="button" class="px-2 py-1 border rounded" aria-label="Page suivante" @click="next" :disabled="page >= pages">Suiv.</button>
    </div>
  </div>
</div>
