@props(['items' => [1,2,3,4,5,6,7,8]])
<div class="columns-2 md:columns-3 lg:columns-4 gap-3">
  @foreach($items as $i)
    <div class="break-inside-avoid mb-3 p-3 border rounded bg-white shadow-sm">Bloc {{ $i }}</div>
  @endforeach
</div>