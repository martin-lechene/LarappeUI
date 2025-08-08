<nav class="text-sm" x-data="{ open:false }">
  <ol class="flex items-center gap-1 text-gray-600">
    <li><a href="#" class="hover:text-gray-900">Accueil</a></li>
    <li>›</li>
    <li><button class="px-2 py-0.5 border rounded" @click="open=!open">…</button></li>
    <li>›</li>
    <li><a href="#" class="hover:text-gray-900">Section</a></li>
    <li>›</li>
    <li class="text-gray-900 font-medium">Page</li>
  </ol>
  <div x-show="open" class="mt-2 border rounded bg-white shadow p-2 w-48">
    <a class="block px-2 py-1 hover:bg-gray-50" href="#">Catégorie 1</a>
    <a class="block px-2 py-1 hover:bg-gray-50" href="#">Catégorie 2</a>
  </div>
</nav>