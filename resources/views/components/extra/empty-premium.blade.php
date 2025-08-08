@props(['title' => 'Aucun élément', 'description' => 'Essayez d’ajouter un nouvel élément', 'action' => 'Ajouter'])
<div class="text-center border rounded-xl p-8 bg-white">
  <div class="mx-auto w-16 h-16 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-3">☆</div>
  <div class="text-lg font-semibold">{{ $title }}</div>
  <div class="text-sm text-gray-600">{{ $description }}</div>
  <div class="mt-3"><x-button>{{ $action }}</x-button></div>
</div>