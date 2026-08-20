@props([
  'items' => [
    ['label' => 'Parent 1', 'children' => [['label' => 'Child 1'], ['label' => 'Child 2']]],
    ['label' => 'Parent 2'],
  ],
  'label' => 'Arborescence',
])
{{-- `isset()` est résolu par Blade : une expression PHP dans un attribut Alpine
     serait évaluée en JavaScript et lèverait une ReferenceError. --}}
<ul class="text-sm" role="tree" aria-label="{{ $label }}">
  @foreach($items as $item)
    @php $hasChildren = ! empty($item['children']); @endphp
    <li x-data="{ open: false }" class="mb-1" role="treeitem" @if($hasChildren) x-bind:aria-expanded="open" @endif>
      @if($hasChildren)
        <button type="button"
                class="mr-1 text-gray-600"
                :aria-label="(open ? 'Réduire ' : 'Déplier ') + @js($item['label'])"
                @click="open = !open">
          <span :class="open ? 'inline-block rotate-90' : 'inline-block'" aria-hidden="true">▸</span>
        </button>
      @endif
      <span>{{ $item['label'] }}</span>
      @if($hasChildren)
        <ul x-show="open" role="group" class="ml-5 mt-1">
          @foreach($item['children'] as $child)
            <li class="mb-1" role="treeitem">{{ $child['label'] }}</li>
          @endforeach
        </ul>
      @endif
    </li>
  @endforeach
</ul>
