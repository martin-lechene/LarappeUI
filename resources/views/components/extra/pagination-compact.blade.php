@props(['page' => 1, 'pages' => 10])
@php
  $uid = uniqid();
@endphp
<nav class="inline-flex items-center gap-2 text-sm" aria-label="Pagination">
  <button type="button"
          class="px-2 py-1 border rounded disabled:opacity-40"
          aria-label="Page précédente"
          @if((int) $page <= 1) disabled @endif
          @click.prevent><span aria-hidden="true">{{ '<' }}</span></button>
  <label for="page-{{ $uid }}" class="sr-only">Numéro de page</label>
  <input type="number"
         id="page-{{ $uid }}"
         class="w-14 border rounded px-2 py-1"
         min="1"
         max="{{ (int) $pages }}"
         value="{{ (int) $page }}">
  <span>/ {{ (int) $pages }}</span>
  <button type="button"
          class="px-2 py-1 border rounded disabled:opacity-40"
          aria-label="Page suivante"
          @if((int) $page >= (int) $pages) disabled @endif
          @click.prevent><span aria-hidden="true">{{ '>' }}</span></button>
</nav>
