@props(['name' => 'tags', 'options' => ['Vue', 'React', 'Alpine', 'Laravel'], 'label' => 'Étiquettes'])
@php
  $uid = uniqid();
@endphp
<div x-data="{ opts: @js($options), q: '', values: [] }" class="border rounded-lg p-2" role="group" aria-label="{{ $label }}">
  <div class="flex flex-wrap gap-2 mb-2">
    <template x-for="(v, i) in values" :key="i">
      <span class="px-2 py-0.5 text-sm rounded-full bg-blue-50 text-blue-800 border border-blue-200">
        <span x-text="v"></span>
        <button type="button" class="ml-1 text-blue-500" :aria-label="`Retirer ${v}`" @click="values.splice(i, 1)">
          <span aria-hidden="true">✕</span>
        </button>
      </span>
    </template>
    <label for="st-{{ $uid }}" class="sr-only">Ajouter une étiquette</label>
    <input type="text" id="st-{{ $uid }}" class="flex-1 outline-none" placeholder="Ajouter..." x-model="q"
           @keydown.enter.prevent="if (q && !values.includes(q)) { values.push(q); q = ''; }">
  </div>
  <div class="border rounded max-h-32 overflow-auto" role="listbox" aria-label="Suggestions" x-show="opts.length">
    <template x-for="o in opts.filter(o => !values.includes(o) && (!q || o.toLowerCase().includes(q.toLowerCase())))" :key="o">
      <button type="button" role="option" aria-selected="false" class="block w-full text-left px-2 py-1 text-sm hover:bg-gray-50" @click="values.push(o)">
        <span x-text="o"></span>
      </button>
    </template>
  </div>
  <p class="sr-only" role="status" aria-live="polite" x-text="`${values.length} étiquette(s) sélectionnée(s)`"></p>
  <input type="hidden" name="{{ $name }}" :value="JSON.stringify(values)">
</div>
