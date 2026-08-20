@props([
    'name' => 'files',
    'multiple' => true,
    'label' => 'Fichiers à téléverser',
])
{{-- Composant Alpine `dropzone` : resources/js/alpine/index.js --}}
<div x-data="dropzone({ multiple: {{ $multiple ? 'true' : 'false' }} })"
     @dragover.prevent="over = true"
     @dragleave="over = false"
     @drop.prevent="handleDrop($event)"
     class="border-2 border-dashed rounded-lg p-6 text-center"
     :class="over ? 'border-blue-400 bg-blue-50' : 'border-gray-300'">
  <div class="text-sm text-gray-600" id="{{ $name }}-hint">Glissez-déposez vos fichiers ici ou cliquez</div>
  <input type="file"
         x-ref="input"
         @change="handleSelect($event)"
         @if($multiple) multiple @endif
         name="{{ $multiple ? $name . '[]' : $name }}"
         aria-label="{{ $label }}"
         aria-describedby="{{ $name }}-hint"
         class="mt-2 max-w-full" />
  <ul class="mt-3 space-y-1 text-left text-xs text-gray-600" x-show="files.length" role="status" aria-live="polite">
    <template x-for="(file, index) in files" :key="file.name + index">
      <li class="flex items-center justify-between gap-2">
        <span x-text="`${file.name} (${Math.ceil(file.size / 1024)} Ko)`"></span>
        <button type="button"
                class="text-red-600 hover:underline"
                :aria-label="`Retirer ${file.name}`"
                @click="remove(index)">Retirer</button>
      </li>
    </template>
  </ul>
</div>
