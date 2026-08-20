@props([
    'name' => 'tags',
    'options' => ['Vue', 'React', 'Alpine', 'Laravel'],
    'label' => 'Étiquettes sélectionnées',
])
<div x-data="{ opts: @js($options), q: '', values: [] }" class="border rounded-lg p-2">
  <div class="flex flex-wrap gap-2 mb-2" role="list" aria-label="{{ $label }}">
    <template x-for="(v, i) in values" :key="i">
      <span role="listitem" class="px-2 py-0.5 text-sm rounded-full bg-blue-50 text-blue-800 border border-blue-200">
        <span x-text="v"></span>
        <button type="button" class="ml-1 text-blue-500" :aria-label="`Retirer l'étiquette ${v}`" @click="values.splice(i, 1)">✕</button>
      </span>
    </template>
    <input type="text" class="flex-1 outline-none" aria-label="Ajouter une étiquette" placeholder="Ajouter..." x-model="q" @keydown.enter.prevent="if (q && !values.includes(q)) { values.push(q); q = ''; }">
  </div>
  <div class="border rounded max-h-32 overflow-auto" x-show="opts.length">
    <template x-for="o in opts.filter(o => !values.includes(o) && (!q || o.toLowerCase().includes(q.toLowerCase())))" :key="o">
      <button type="button" class="block w-full text-left px-2 py-1 text-sm hover:bg-gray-50" :aria-label="`Ajouter l'étiquette ${o}`" @click="values.push(o)">
        <span x-text="o"></span>
      </button>
    </template>
  </div>
  <input type="hidden" name="{{ $name }}" :value="JSON.stringify(values)">
</div>
