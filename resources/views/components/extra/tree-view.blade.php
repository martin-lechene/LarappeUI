@props(['items' => [
  ['label'=>'Parent 1','children'=>[['label'=>'Child 1'],['label'=>'Child 2']]],
  ['label'=>'Parent 2']
]])
<ul class="text-sm">
  @foreach($items as $item)
    <li x-data="{ open:false }" class="mb-1">
      <button class="mr-1 text-gray-600" @click="open=!open" x-show="isset($item['children'])">▸</button>
      <span>{{ $item['label'] }}</span>
      @if(isset($item['children']))
        <ul x-show="open" class="ml-5 mt-1">
          @foreach($item['children'] as $child)
            <li class="mb-1">{{ $child['label'] }}</li>
          @endforeach
        </ul>
      @endif
    </li>
  @endforeach
</ul>