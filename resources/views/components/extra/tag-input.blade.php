@props(['name' => 'tags', 'label' => 'Étiquettes'])
@php
  $uid = uniqid();
@endphp
<div x-data="{ tags: [], input: '' }" class="border rounded-lg p-2" role="group" aria-label="{{ $label }}">
  <div class="flex flex-wrap gap-2">
    <template x-for="(t, i) in tags" :key="i">
      <span class="px-2 py-0.5 text-sm rounded-full bg-gray-100">
        <span x-text="t"></span>
        <button type="button" class="ml-1 text-gray-400" :aria-label="`Retirer ${t}`" @click="tags.splice(i, 1)">
          <span aria-hidden="true">✕</span>
        </button>
      </span>
    </template>
    <label for="ti-{{ $uid }}" class="sr-only">Ajouter une étiquette</label>
    <input type="text" id="ti-{{ $uid }}" class="flex-1 outline-none" placeholder="Ajouter..." x-model="input"
           @keydown.enter.prevent="if (input) { tags.push(input); input = '' }">
  </div>
  <p class="sr-only" role="status" aria-live="polite" x-text="`${tags.length} étiquette(s)`"></p>
  <input type="hidden" name="{{ $name }}" :value="JSON.stringify(tags)">
</div>
