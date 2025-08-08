@props(['images' => ['https://picsum.photos/200/150','https://picsum.photos/201/150','https://picsum.photos/202/150']])
<div x-data="{ open:false, current:null }">
  <div class="grid grid-cols-3 gap-2">
    @foreach($images as $i => $src)
      <img src="{{ $src }}" class="rounded cursor-pointer" @click="open=true; current='{{ $src }}'">
    @endforeach
  </div>
  <div x-show="open" class="fixed inset-0 bg-black/70 flex items-center justify-center" @click="open=false">
    <img :src="current" class="max-w-3xl rounded shadow-xl">
  </div>
</div>