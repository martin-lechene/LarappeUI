@props([
    'label' => 'Menu contextuel',
    'items' => [
        ['label' => 'Copier'],
        ['label' => 'Coller'],
        ['label' => 'Supprimer', 'danger' => true],
    ],
])
<div x-data="{ open: false, x: 0, y: 0 }"
     @contextmenu.prevent="open = true; x = $event.clientX; y = $event.clientY"
     @keydown.escape.window="open = false">
  {{ $slot }}
  <div x-show="open"
       role="menu"
       aria-label="{{ $label }}"
       class="fixed bg-white border rounded shadow-lg text-sm"
       :style="`top:${y}px;left:${x}px`"
       @click.away="open = false">
    @foreach($items as $item)
      <button type="button"
              role="menuitem"
              class="block w-full text-left px-3 py-2 hover:bg-gray-50 {{ ($item['danger'] ?? false) ? 'text-red-600' : '' }}"
              @click="open = false">{{ $item['label'] }}</button>
    @endforeach
  </div>
</div>
