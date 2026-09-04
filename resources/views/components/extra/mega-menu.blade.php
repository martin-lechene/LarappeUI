@props(['label' => 'Produits'])
@php
  $uid = uniqid();
@endphp
<nav class="relative" x-data="{ open: false }" aria-label="{{ $label }}">
  <button type="button"
          class="px-3 py-2 border rounded"
          aria-haspopup="true"
          aria-controls="mega-{{ $uid }}"
          :aria-expanded="open"
          @click="open = !open"
          @keydown.escape.window="open = false">{{ $label }}</button>
  <div x-show="open"
       id="mega-{{ $uid }}"
       @click.away="open = false"
       class="absolute mt-2 left-0 bg-white border rounded-xl shadow-xl p-6 grid grid-cols-3 gap-6 w-[640px]">
    <div>
      <div class="font-semibold mb-2" id="mega-{{ $uid }}-a">Catégorie A</div>
      <ul class="space-y-1 text-sm text-gray-600" aria-labelledby="mega-{{ $uid }}-a">
        <li><a href="#" class="hover:text-gray-900">Produit 1</a></li>
        <li><a href="#" class="hover:text-gray-900">Produit 2</a></li>
      </ul>
    </div>
    <div>
      <div class="font-semibold mb-2" id="mega-{{ $uid }}-b">Catégorie B</div>
      <ul class="space-y-1 text-sm text-gray-600" aria-labelledby="mega-{{ $uid }}-b">
        <li><a href="#" class="hover:text-gray-900">Produit 3</a></li>
        <li><a href="#" class="hover:text-gray-900">Produit 4</a></li>
      </ul>
    </div>
    <div>
      <div class="font-semibold mb-2">Mises en avant</div>
      <x-card>
        <div class="font-medium">Nouveau</div>
        <div class="text-sm text-gray-500">Découvrez notre dernière suite</div>
      </x-card>
    </div>
  </div>
</nav>
