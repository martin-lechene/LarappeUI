@props(['columns' => [], 'rows' => []])
<div x-data="dataTable({ columns: @js($columns), rows: @js($rows) })" class="space-y-2">
  <div class="flex items-center justify-between">
    <x-form.input placeholder="Rechercher..." x-model="q" class="w-64" />
    <div class="text-xs text-gray-500" x-text="`${filtered.length} résultats`"></div>
  </div>
  <div class="overflow-x-auto border rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-surface">
        <tr>
          <template x-for="col in columns" :key="col.key">
            <th class="px-4 py-2 text-left text-sm font-semibold cursor-pointer select-none" @click="sortBy(col.key)">
              <span x-text="col.label"></span>
              <span x-show="sort.key===col.key" class="ml-1 text-gray-400" x-text="sort.dir==='asc' ? '▲' : '▼'"></span>
            </th>
          </template>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <template x-for="row in paged" :key="row.__key || JSON.stringify(row)">
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
      <span class="text-gray-500">Page</span>
      <input type="number" min="1" class="w-16 border rounded px-2 py-1" x-model.number="page">
      <span class="text-gray-500">/</span>
      <span x-text="pages"></span>
    </div>
    <div class="flex items-center gap-2">
      <button class="px-2 py-1 border rounded" @click="prev" :disabled="page<=1">Préc.</button>
      <button class="px-2 py-1 border rounded" @click="next" :disabled="page>=pages">Suiv.</button>
    </div>
  </div>
</div>

<script>
function dataTable({ columns, rows }){
  return {
    columns,
    original: rows.map((r,i)=>({ ...r, __key: i })),
    q: '',
    sort: { key: columns[0]?.key || '', dir: 'asc' },
    page: 1,
    pageSize: 10,
    get filtered(){
      const q = this.q.toLowerCase();
      const arr = this.original.filter(r => !q || Object.values(r).some(v => String(v).toLowerCase().includes(q)));
      const { key, dir } = this.sort;
      return key ? arr.sort((a,b)=> (''+a[key]).localeCompare(''+b[key]) * (dir==='asc'?1:-1)) : arr;
    },
    get pages(){ return Math.max(1, Math.ceil(this.filtered.length / this.pageSize)); },
    get paged(){
      if(this.page>this.pages) this.page = this.pages;
      const start = (this.page-1)*this.pageSize;
      return this.filtered.slice(start, start + this.pageSize);
    },
    sortBy(key){
      if(this.sort.key===key){ this.sort.dir = this.sort.dir==='asc'?'desc':'asc'; }
      else { this.sort.key = key; this.sort.dir='asc'; }
    },
    next(){ if(this.page < this.pages) this.page++; },
    prev(){ if(this.page > 1) this.page--; },
  }
}
</script>