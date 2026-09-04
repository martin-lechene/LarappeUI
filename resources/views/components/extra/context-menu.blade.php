@props(['items' => [
  ['label' => 'Copier'],
  ['label' => 'Coller'],
  ['label' => 'Supprimer', 'danger' => true],
]])
<div x-data="{ open: false, x: 0, y: 0 }"
     @contextmenu.prevent="open = true; x = $event.clientX; y = $event.clientY; $nextTick(() => $refs.menu?.querySelector('[role=menuitem]')?.focus())">
  {{ $slot }}
  <div x-show="open"
       x-ref="menu"
       role="menu"
       aria-label="Menu contextuel"
       class="fixed bg-white border rounded shadow-lg text-sm"
       :style="`top:${y}px;left:${x}px`"
       @click.away="open = false"
       @keydown.escape.window="open = false"
       @keydown.arrow-down.prevent="$focus.next()"
       @keydown.arrow-up.prevent="$focus.previous()">
    @foreach($items as $item)
      <button type="button"
              role="menuitem"
              @click="open = false"
              class="block w-full text-left px-3 py-2 hover:bg-gray-50 focus:outline-none focus-visible:bg-gray-100 {{ ($item['danger'] ?? false) ? 'text-red-600' : '' }}">{{ $item['label'] }}</button>
    @endforeach
  </div>
</div>
