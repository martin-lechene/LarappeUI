@props(['value' => 65, 'size' => 120])
@php
  $r = $size*0.4; $cx=$size/2; $cy=$size/2; $c=2*M_PI*$r; $p=max(0,min(100,$value))/100; $dash=$c*$p;
@endphp
<svg width="{{ $size }}" height="{{ $size }}" viewBox="0 0 {{ $size }} {{ $size }}" class="text-blue-500">
  <circle cx="{{ $cx }}" cy="{{ $cy }}" r="{{ $r }}" stroke-width="14" class="text-gray-200" stroke="currentColor" fill="none" />
  <circle cx="{{ $cx }}" cy="{{ $cy }}" r="{{ $r }}" stroke-width="14" stroke-linecap="round" stroke-dasharray="{{ $dash }} {{ $c }}" stroke="currentColor" fill="none" transform="rotate(-90 {{ $cx }} {{ $cy }})" />
  <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" class="text-gray-800" font-size="18">{{ (int)$value }}%</text>
</svg>