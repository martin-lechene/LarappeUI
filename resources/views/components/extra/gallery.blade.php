@props([
  'images' => [
    ['src' => 'https://picsum.photos/200/150', 'alt' => 'Photographie de démonstration 1'],
    ['src' => 'https://picsum.photos/201/150', 'alt' => 'Photographie de démonstration 2'],
    ['src' => 'https://picsum.photos/202/150', 'alt' => 'Photographie de démonstration 3'],
  ],
])
<div x-data="{ open: false, current: null, currentAlt: '' }">
  <ul class="grid grid-cols-3 gap-2" role="list">
    @foreach($images as $image)
      @php
        // Accepte aussi bien une liste d'URL qu'une liste [src, alt].
        $src = is_array($image) ? ($image['src'] ?? '') : $image;
        $alt = is_array($image) ? ($image['alt'] ?? '') : '';
      @endphp
      <li>
        <button type="button" class="block w-full focus:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded"
                @click="open = true; current = @js($src); currentAlt = @js($alt)">
          <img src="{{ $src }}" alt="{{ $alt }}" class="rounded cursor-pointer">
        </button>
      </li>
    @endforeach
  </ul>
  <div x-show="open" role="dialog" aria-modal="true" aria-label="Image en grand"
       x-trap.noscroll="open" @keydown.escape.window="open = false"
       class="fixed inset-0 bg-black/70 flex items-center justify-center" @click="open = false">
    <img :src="current" :alt="currentAlt" class="max-w-3xl rounded shadow-xl">
  </div>
</div>
