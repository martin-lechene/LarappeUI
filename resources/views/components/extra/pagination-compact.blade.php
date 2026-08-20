@props(['page' => 1, 'pages' => 10, 'label' => 'Pagination'])
<nav class="inline-flex items-center gap-2 text-sm" aria-label="{{ $label }}">
  <button type="button" class="px-2 py-1 border rounded" aria-label="Page précédente" @click.prevent>{{ '<' }}</button>
  <input type="number" class="w-14 border rounded px-2 py-1" aria-label="Numéro de page" value="{{ (int) $page }}" min="1" max="{{ (int) $pages }}">
  <span>/ {{ (int) $pages }}</span>
  <button type="button" class="px-2 py-1 border rounded" aria-label="Page suivante" @click.prevent>{{ '>' }}</button>
</nav>
