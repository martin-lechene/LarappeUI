<nav class="relative" x-data="{open:false}">
  <button class="px-3 py-2 border rounded" @click="open=!open">Produits</button>
  <div x-show="open" class="absolute mt-2 left-0 bg-white border rounded-xl shadow-xl p-6 grid grid-cols-3 gap-6 w-[640px]">
    <div>
      <div class="font-semibold mb-2">Catégorie A</div>
      <ul class="space-y-1 text-sm text-gray-600">
        <li><a href="#" class="hover:text-gray-900">Produit 1</a></li>
        <li><a href="#" class="hover:text-gray-900">Produit 2</a></li>
      </ul>
    </div>
    <div>
      <div class="font-semibold mb-2">Catégorie B</div>
      <ul class="space-y-1 text-sm text-gray-600">
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