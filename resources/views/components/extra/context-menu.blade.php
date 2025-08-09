<div x-data="{ open:false, x:0, y:0 }" @contextmenu.prevent="open=true; x=$event.clientX; y=$event.clientY">
  {{ $slot }}
  <div x-show="open" class="fixed bg-white border rounded shadow-lg text-sm" :style="`top:${y}px;left:${x}px`" @click.away="open=false">
    <a href="#" class="block px-3 py-2 hover:bg-gray-50">Copier</a>
    <a href="#" class="block px-3 py-2 hover:bg-gray-50">Coller</a>
    <a href="#" class="block px-3 py-2 hover:bg-gray-50 text-red-600">Supprimer</a>
  </div>
</div>