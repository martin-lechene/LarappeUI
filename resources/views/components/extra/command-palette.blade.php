@props([
    'placeholder' => 'Tapez une commande...',
    'items' => ['Ouvrir fichier', 'Aller à la page', 'Créer utilisateur', 'Déconnexion'],
])
<div x-data="{ open: false, q: '', items: @js($items) }" @keydown.k.window.prevent="open = true">
  <div x-show="open"
       role="dialog"
       aria-modal="true"
       aria-label="Palette de commandes"
       class="fixed inset-0 bg-black/40 p-4"
       @keydown.escape.window="open = false">
    <div class="mx-auto max-w-xl bg-white rounded-xl shadow-xl overflow-hidden">
      <div class="p-3 border-b">
        <input type="text"
               class="w-full outline-none"
               aria-label="Rechercher une commande"
               role="combobox"
               aria-controls="command-palette-results"
               aria-expanded="true"
               x-model="q"
               placeholder="{{ $placeholder }}" />
      </div>
      <ul id="command-palette-results" role="listbox" aria-label="Commandes" class="max-h-64 overflow-auto">
        <template x-for="it in items.filter(i => i.toLowerCase().includes(q.toLowerCase()))" :key="it">
          <li role="option" tabindex="0" aria-selected="false" class="px-3 py-2 hover:bg-gray-50 cursor-pointer" x-text="it"></li>
        </template>
      </ul>
      <div class="p-2 text-xs text-gray-500 border-t">Appuyez sur K pour ouvrir</div>
    </div>
  </div>
</div>
