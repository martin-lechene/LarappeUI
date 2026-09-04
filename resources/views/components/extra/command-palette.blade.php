@props(['placeholder' => 'Tapez une commande...', 'items' => ['Ouvrir fichier', 'Aller à la page', 'Créer utilisateur', 'Déconnexion']])
@php
  $uid = uniqid();
@endphp
<div x-data="{ open: false, q: '', items: @js($items) }"
     @keydown.window.ctrl.k.prevent="open = true"
     @keydown.window.meta.k.prevent="open = true">
  <div x-show="open"
       role="dialog"
       aria-modal="true"
       aria-label="Palette de commandes"
       x-trap.noscroll="open"
       @keydown.escape.window="open = false"
       class="fixed inset-0 bg-black/40 p-4">
    <div class="absolute inset-0" aria-hidden="true" @click="open = false"></div>
    <div class="relative mx-auto max-w-xl bg-white rounded-xl shadow-xl overflow-hidden">
      <div class="p-3 border-b">
        <label for="cmd-{{ $uid }}" class="sr-only">Rechercher une commande</label>
        <input type="text"
               id="cmd-{{ $uid }}"
               class="w-full outline-none"
               role="combobox"
               aria-autocomplete="list"
               aria-controls="cmd-list-{{ $uid }}"
               :aria-expanded="open"
               x-model="q"
               placeholder="{{ $placeholder }}" />
      </div>
      <ul class="max-h-64 overflow-auto" id="cmd-list-{{ $uid }}" role="listbox" aria-label="Commandes">
        <template x-for="it in items.filter(i => i.toLowerCase().includes(q.toLowerCase()))" :key="it">
          <li role="option" aria-selected="false" tabindex="-1" class="px-3 py-2 hover:bg-gray-50 cursor-pointer focus:bg-gray-100 focus:outline-none" x-text="it"></li>
        </template>
      </ul>
      <div class="p-2 text-xs text-gray-500 border-t">Ctrl/⌘ + K pour ouvrir, Échap pour fermer</div>
    </div>
  </div>
</div>
