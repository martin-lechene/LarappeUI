@props(['name' => 'markdown', 'label' => 'Éditeur Markdown'])
{{-- `marked` est fourni par le bundle Vite (resources/js/app.js). --}}
<div x-data="{ val: '' }" class="grid grid-cols-2 gap-3">
  <textarea x-model="val" aria-label="{{ $label }}" class="border rounded p-2 h-40" placeholder="# Titre&#10;&#10;Contenu..."></textarea>
  <div class="border rounded p-2 prose prose-sm max-w-none" role="region" aria-label="Aperçu du rendu Markdown" aria-live="polite" x-html="window.marked ? window.marked.parse(val) : ''"></div>
  <input type="hidden" name="{{ $name }}" :value="val">
</div>
