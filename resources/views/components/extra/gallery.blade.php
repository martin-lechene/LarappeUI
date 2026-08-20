@props([
    'images' => [
        'https://picsum.photos/200/150',
        'https://picsum.photos/201/150',
        'https://picsum.photos/202/150',
    ],
    'label' => 'Galerie d’images',
])
@php
    // Chaque entrée accepte soit une URL, soit un tableau ['src' => …, 'alt' => …].
    $normalized = collect($images)->map(fn ($image, $i) => is_array($image)
        ? ['src' => $image['src'], 'alt' => $image['alt'] ?? 'Image ' . ($i + 1)]
        : ['src' => $image, 'alt' => 'Image ' . ($i + 1)])->all();
@endphp
<div x-data="{ open: false, current: null, currentAlt: '' }" @keydown.escape.window="open = false">
  <div class="grid grid-cols-3 gap-2" role="list" aria-label="{{ $label }}">
    @foreach($normalized as $image)
      <button type="button"
              role="listitem"
              class="block"
              aria-label="Agrandir : {{ $image['alt'] }}"
              @click="open = true; current = @js($image['src']); currentAlt = @js($image['alt'])">
        <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="rounded cursor-pointer">
      </button>
    @endforeach
  </div>
  <div x-show="open"
       role="dialog"
       aria-modal="true"
       :aria-label="currentAlt"
       class="fixed inset-0 bg-black/70 flex items-center justify-center"
       @click="open = false">
    <img :src="current" :alt="currentAlt" class="max-w-3xl rounded shadow-xl">
  </div>
</div>
