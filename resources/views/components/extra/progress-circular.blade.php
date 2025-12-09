@props(['value' => 50, 'size' => 40, 'stroke' => 4])
@php
  $r = ($size - $stroke) / 2;
  $c = 2 * M_PI * $r;
  $dash = $c * (max(0,min(100,$value)) / 100);
@endphp
<svg width="{{ $size }}" height="{{ $size }}" viewBox="0 0 {{ $size }} {{ $size }}" class="text-blue-500">
  <circle cx="{{ $size/2 }}" cy="{{ $size/2 }}" r="{{ $r }}" stroke-width="{{ $stroke }}" class="text-gray-200" stroke="currentColor" fill="none" />
  <circle cx="{{ $size/2 }}" cy="{{ $size/2 }}" r="{{ $r }}" stroke-width="{{ $stroke }}" stroke-linecap="round" stroke-dasharray="{{ $dash }} {{ $c }}" stroke="currentColor" fill="none" transform="rotate(-90 {{ $size/2 }} {{ $size/2 }})" />
</svg>