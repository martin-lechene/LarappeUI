@props(['title' => 'Titre'])
<div x-data="{ open:false }" class="relative inline-block">
  <button class="px-2 py-1 border rounded" @click="open=!open">{{ $title }}</button>
  <div x-show="open" class="absolute z-10 mt-2 left-0 bg-white border rounded shadow p-3 w-64">
    <div class="text-sm text-gray-700">{{ $slot }}</div>
    <span class="absolute -top-2 left-4 w-0 h-0 border-l-8 border-r-8 border-b-8 border-l-transparent border-r-transparent border-b-white"></span>
  </div>
</div>