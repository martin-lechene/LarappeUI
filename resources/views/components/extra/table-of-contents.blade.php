@props(['items' => [['id'=>'intro','label'=>'Introduction'],['id'=>'usage','label'=>'Utilisation']]])
<nav class="text-sm">
  <div class="font-semibold mb-2">Sommaire</div>
  <ul class="space-y-1 text-gray-600">
    @foreach($items as $it)
      <li><a href="#{{ $it['id'] }}" class="hover:text-gray-900">{{ $it['label'] }}</a></li>
    @endforeach
  </ul>
</nav>