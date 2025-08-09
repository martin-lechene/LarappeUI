@props(['markers' => [['lat'=>48.85,'lng'=>2.35,'label'=>'Paris']]])
<div class="border rounded p-3 bg-gray-50">
  <div class="text-sm text-gray-600">Carte (placeholder). Marqueurs:</div>
  <ul class="list-disc pl-5 text-sm">
    @foreach($markers as $m)
      <li>{{ $m['label'] }} ({{ $m['lat'] }}, {{ $m['lng'] }})</li>
    @endforeach
  </ul>
</div>