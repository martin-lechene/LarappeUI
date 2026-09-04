@props(['items' => [['id' => 'intro', 'label' => 'Introduction'], ['id' => 'usage', 'label' => 'Utilisation']], 'label' => 'Sommaire'])
@php
  $uid = uniqid();
@endphp
<nav class="text-sm" aria-labelledby="toc-{{ $uid }}">
  <div class="font-semibold mb-2" id="toc-{{ $uid }}">{{ $label }}</div>
  <ul class="space-y-1 text-gray-600">
    @foreach($items as $it)
      <li><a href="#{{ $it['id'] }}" class="hover:text-gray-900">{{ $it['label'] }}</a></li>
    @endforeach
  </ul>
</nav>
