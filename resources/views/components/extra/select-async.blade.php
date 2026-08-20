@props([
    'endpoint' => '/api/options',
    'name' => 'select',
    'label' => 'Rechercher une option',
    'placeholder' => 'Rechercher...',
])
{{-- Composant Alpine `selectAsync` : resources/js/alpine/index.js --}}
<div x-data="selectAsync({ endpoint: @js($endpoint) })" class="relative" @click.outside="close()">
  <x-form.input
    :placeholder="$placeholder"
    aria-label="{{ $label }}"
    role="combobox"
    aria-autocomplete="list"
    x-bind:aria-expanded="open"
    aria-controls="{{ $name }}-options"
    x-model="q"
    @input="search"
  />
  <div id="{{ $name }}-options"
       role="listbox"
       aria-label="{{ $label }}"
       class="absolute z-10 mt-1 bg-white border rounded w-full max-h-48 overflow-auto"
       x-show="open">
    <template x-for="opt in options" :key="opt.value">
      <div role="option"
           tabindex="0"
           :aria-selected="value === opt.value"
           class="px-3 py-2 hover:bg-gray-50 cursor-pointer"
           @click="choose(opt)"
           @keydown.enter.prevent="choose(opt)"
           x-text="opt.label"></div>
    </template>
    <div class="p-2 text-xs text-gray-500" role="status" x-show="loading">Chargement...</div>
    <div class="p-2 text-xs text-red-600" role="alert" x-show="error" x-text="error"></div>
    <div class="p-2 text-xs text-gray-400" x-show="!loading && !error && options.length === 0">Aucun résultat</div>
  </div>
  <input type="hidden" name="{{ $name }}" :value="value">
</div>
