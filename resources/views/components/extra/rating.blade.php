@props(['value' => 0, 'max' => 5, 'readonly' => false, 'name' => 'rating'])
<div x-data="{ val: {{ (int)$value }}, hover: 0 }" class="flex items-center gap-1">
  <template x-for="i in {{ (int)$max }}" :key="i">
    <button type="button" :disabled="{{ $readonly ? 'true' : 'false' }}" class="text-yellow-400"
            @mouseover="hover=i" @mouseleave="hover=0" @click="val=i">
      <svg :class="i <= (hover||val) ? 'fill-current' : 'fill-gray-200'" class="w-5 h-5" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.954L10 0l2.951 5.956 6.561.954-4.756 4.635 1.122 6.545z"/></svg>
    </button>
  </template>
  <input type="hidden" name="{{ $name }}" :value="val">
</div>