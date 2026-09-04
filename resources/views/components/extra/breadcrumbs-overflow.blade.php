@props(['caches' => [['label' => 'Catégorie 1', 'href' => '#'], ['label' => 'Catégorie 2', 'href' => '#']]])
@php
  $uid = uniqid();
@endphp
<nav class="text-sm" x-data="{ open: false }" aria-label="Fil d’Ariane">
  <ol class="flex items-center gap-1 text-gray-600">
    <li><a href="#" class="hover:text-gray-900">Accueil</a></li>
    <li aria-hidden="true">›</li>
    <li>
      <button type="button"
              class="px-2 py-0.5 border rounded"
              aria-label="Afficher les niveaux intermédiaires"
              aria-controls="crumbs-{{ $uid }}"
              :aria-expanded="open"
              @click="open = !open"
              @keydown.escape.window="open = false">…</button>
    </li>
    <li aria-hidden="true">›</li>
    <li><a href="#" class="hover:text-gray-900">Section</a></li>
    <li aria-hidden="true">›</li>
    <li class="text-gray-900 font-medium" aria-current="page">Page</li>
  </ol>
  <ul x-show="open" id="crumbs-{{ $uid }}" @click.away="open = false" class="mt-2 border rounded bg-white shadow p-2 w-48">
    @foreach($caches as $cache)
      <li><a class="block px-2 py-1 hover:bg-gray-50" href="{{ $cache['href'] }}">{{ $cache['label'] }}</a></li>
    @endforeach
  </ul>
</nav>
