@props(['data' => [1,3,2,5,4,6], 'width' => 100, 'height' => 30])
@php
  $max = max($data) ?: 1; $min = min($data);
  $points = [];
  $n = count($data)-1; $w = $width; $h = $height;
  foreach($data as $i => $v){ $x = ($n>0) ? ($i/$n)*$w : 0; $y = $h - (($v-$min)/max(1,$max-$min))*$h; $points[] = $x.','.$y; }
@endphp
<svg width="{{ $width }}" height="{{ $height }}" viewBox="0 0 {{ $width }} {{ $height }}" class="text-blue-500">
  <polyline fill="none" stroke="currentColor" stroke-width="2" points="{{ implode(' ', $points) }}" />
</svg>