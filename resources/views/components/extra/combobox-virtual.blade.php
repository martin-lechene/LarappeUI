@props([
    'name' => 'combo',
    'label' => 'Filtrer les options',
    'options' => null,
    'size' => 50,
])
@php
    // Jeu de démonstration si aucune collection n'est fournie.
    $items = $options ?? collect(range(0, 999))
        ->map(fn (int $i) => ['value' => "v{$i}", 'label' => "Option {$i}"])
        ->all();
@endphp
{{-- Composant Alpine `comboboxVirtual` : resources/js/alpine/index.js --}}
<div x-data="comboboxVirtual({ options: @js($items), size: {{ (int) $size }} })" class="relative" @click.outside="close()">
  <x-form.input
    placeholder="Tapez pour filtrer..."
    aria-label="{{ $label }}"
    role="combobox"
    aria-autocomplete="list"
    x-bind:aria-expanded="open"
    aria-controls="{{ $name }}-options"
    x-model="q"
    @focus="open = true"
  />
  <div id="{{ $name }}-options"
       role="listbox"
       aria-label="{{ $label }}"
       class="absolute z-10 mt-1 bg-white border rounded w-full max-h-60 overflow-auto"
       x-show="open"
       @scroll="onScroll">
    <template x-for="opt in visible" :key="opt.value">
      <div role="option"
           tabindex="0"
           :aria-selected="value === opt.value"
           class="px-3 py-2 hover:bg-gray-50 cursor-pointer"
           @click="choose(opt)"
           @keydown.enter.prevent="choose(opt)"
           x-text="opt.label"></div>
    </template>
    <div class="p-2 text-xs text-gray-400" x-show="filtered.length === 0">Aucun résultat</div>
  </div>
  <input type="hidden" name="{{ $name }}" :value="value">
</div>
