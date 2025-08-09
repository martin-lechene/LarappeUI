@props(['title' => 'Modal Title'])
<div x-data="{ open: false }">
  <div @click="open = true">{{ $trigger ?? 'Ouvrir' }}</div>
  <div x-show="open" class="fixed inset-0 bg-black/40 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-lg">
      <div class="flex items-center justify-between p-4 border-b">
        <h3 class="font-semibold">{{ $title }}</h3>
        <button @click="open = false">✕</button>
      </div>
      <div class="p-4">{{ $slot }}</div>
      <div class="flex justify-end gap-2 p-4 border-t">
        <x-button color="secondary" @click="open = false">Annuler</x-button>
        <x-button>Valider</x-button>
      </div>
    </div>
  </div>
</div>