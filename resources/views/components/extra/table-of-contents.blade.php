@props([
    'items' => [['id' => 'intro', 'label' => 'Introduction'], ['id' => 'usage', 'label' => 'Utilisation']],
    'title' => 'Sommaire',
])
@php $titleId = 'toc-title-' . Str::random(6); @endphp
<nav class="text-sm" aria-labelledby="{{ $titleId }}">
  <div class="font-semibold mb-2" id="{{ $titleId }}">{{ $title }}</div>
  <ul class="space-y-1 text-gray-600">
    @foreach($items as $it)
      <li><a href="#{{ $it['id'] }}" class="hover:text-gray-900">{{ $it['label'] }}</a></li>
    @endforeach
  </ul>
</nav>
