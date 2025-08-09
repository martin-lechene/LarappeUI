@props(['min' => 0, 'max' => 100, 'start' => 20, 'end' => 80, 'name' => 'range'])
<div x-data="{ min: {{ (int)$min }}, max: {{ (int)$max }}, a: {{ (int)$start }}, b: {{ (int)$end }} }" class="space-y-2">
  <div class="flex items-center gap-3 text-sm text-gray-600">
    <span x-text="a"></span>
    <div class="flex-1 h-1 bg-gray-200 rounded relative">
      <div class="absolute h-1 bg-blue-500 rounded" :style="{ left: ((a-min)/(max-min)*100)+'%', right: (100-((b-min)/(max-min)*100))+'%' }"></div>
    </div>
    <span x-text="b"></span>
  </div>
  <div class="relative flex items-center gap-2">
    <input type="range" :min="min" :max="max" x-model.number="a" class="w-full">
    <input type="range" :min="min" :max="max" x-model.number="b" class="w-full">
  </div>
  <input type="hidden" name="{{ $name }}" :value="JSON.stringify([a,b])">
</div>