@props(['columns' => [], 'rows' => []])
<div x-data="dataTablePro({ columns: @js($columns), rows: @js($rows) })" class="space-y-3">
  <div class="flex items-center justify-between">
    <div class="flex items-center gap-2">
      <x-form.input placeholder="Rechercher..." x-model="q" class="w-64" />
      <x-extra.select-async endpoint="/api/filters" />
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
        <x-slot name="trigger"><x-button size="sm" :disabled="selected.size===0">Actions ( <span x-text="selected.size"></span> )</x-button></x-slot>
        <a class="block px-4 py-2 hover:bg-gray-50" href="#" @click.prevent="bulk('export')">Exporter</a>
        <a class="block px-4 py-2 hover:bg-gray-50 text-red-600" href="#" @click.prevent="bulk('delete')">Supprimer</a>
      </x-dropdown>
    </div>
  </div>
  <div class="overflow-x-auto border rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-surface">
        <tr>
          <th class="px-3 py-2 w-10"><input type="checkbox" @change="toggleAll($event)" :checked="isAllChecked"></th>
          <template x-for="col in columns" :key="col.key">
            <th class="px-4 py-2 text-left text-sm font-semibold cursor-pointer select-none" @click="sortBy(col.key)">
              <span x-text="col.label"></span>
              <span x-show="sort.key===col.key" class="ml-1 text-gray-400" x-text="sort.dir==='asc' ? '▲' : '▼'"></span>
            </th>
          </template>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <template x-for="row in paged" :key="row.__key">
          <tr class="hover:bg-gray-50">
            <td class="px-3 py-2"><input type="checkbox" :value="row.__key" @change="toggle(row.__key)" :checked="selected.has(row.__key)"></td>
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
function dataTablePro({ columns, rows }){
  return {
    allColumns: columns,
    get columns(){ return this.allColumns.filter(c => this.visibleKeys.includes(c.key)); },
    visibleKeys: columns.map(c=>c.key),
    original: rows.map((r,i)=>({ ...r, __key: i })),
    selected: new Set(),
    get isAllChecked(){ return this.paged.length>0 && this.paged.every(r=>this.selected.has(r.__key)); },
    q: '', sort: { key: columns[0]?.key || '', dir: 'asc' }, page: 1, pageSize: 10,
    toggleColumn(k){ const i=this.visibleKeys.indexOf(k); if(i>-1) this.visibleKeys.splice(i,1); else this.visibleKeys.push(k); },
    toggle(id){ this.selected.has(id) ? this.selected.delete(id) : this.selected.add(id); },
    toggleAll(e){ if(e.target.checked){ this.paged.forEach(r=>this.selected.add(r.__key)); } else { this.paged.forEach(r=>this.selected.delete(r.__key)); } },
    bulk(action){ alert(`${action} -> ${this.selected.size} items`); },
    get filtered(){
      const q = this.q.toLowerCase();
      const arr = this.original.filter(r => !q || Object.values(r).some(v => String(v).toLowerCase().includes(q)));
      const { key, dir } = this.sort;
      return key ? arr.sort((a,b)=> (''+a[key]).localeCompare(''+b[key]) * (dir==='asc'?1:-1)) : arr;
    },
    get pages(){ return Math.max(1, Math.ceil(this.filtered.length / this.pageSize)); },
    get paged(){ if(this.page>this.pages) this.page=this.pages; const s=(this.page-1)*this.pageSize; return this.filtered.slice(s, s+this.pageSize); },
    sortBy(key){ if(this.sort.key===key){ this.sort.dir = this.sort.dir==='asc'?'desc':'asc'; } else { this.sort.key=key; this.sort.dir='asc'; } },
    next(){ if(this.page < this.pages) this.page++; }, prev(){ if(this.page > 1) this.page--; },
  }
}
</script>