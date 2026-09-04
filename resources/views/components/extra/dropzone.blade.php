@props(['name' => 'files', 'label' => 'Déposer des fichiers'])
@php
  $uid = uniqid();
@endphp
<div x-data="{
        over: false,
        fichiers: [],
        prendre(liste) {
            // L'evenement drop se contentait de remettre `over` a false : les
            // fichiers deposes n'etaient jamais transmis au champ, donc jamais
            // envoyes avec le formulaire.
            $refs.champ.files = liste;
            this.fichiers = Array.from(liste).map((f) => f.name);
            $refs.champ.dispatchEvent(new Event('change', { bubbles: true }));
        },
     }"
     @dragover.prevent="over = true"
     @dragleave="over = false"
     @drop.prevent="over = false; prendre($event.dataTransfer.files)"
     class="border-2 border-dashed rounded-lg p-6 text-center"
     :class="over ? 'border-blue-400 bg-blue-50' : 'border-gray-300'">
  <label for="dz-{{ $uid }}" class="text-sm text-gray-600 cursor-pointer">Glissez-déposez vos fichiers ici ou cliquez</label>
  <input type="file"
         id="dz-{{ $uid }}"
         x-ref="champ"
         multiple
         name="{{ $name }}"
         class="mt-2"
         aria-label="{{ $label }}"
         @change="fichiers = Array.from($event.target.files).map(f => f.name)" />
  <ul class="mt-2 text-xs text-gray-500" role="status" aria-live="polite">
    <template x-for="nom in fichiers" :key="nom"><li x-text="nom"></li></template>
  </ul>
</div>
