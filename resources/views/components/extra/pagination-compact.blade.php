@props(['page' => 1, 'pages' => 10])
<div class="inline-flex items-center gap-2 text-sm">
  <button class="px-2 py-1 border rounded" @click.prevent>{{ '<' }}</button>
  <input type="number" class="w-14 border rounded px-2 py-1" value="{{ (int)$page }}">
  <span>/ {{ (int)$pages }}</span>
  <button class="px-2 py-1 border rounded" @click.prevent>{{ '>' }}</button>
</div>