@props(['lines' => 3])
<div {{ $attributes }}>
  <template x-for="i in {{ (int)$lines }}" :key="i">
    <div class="h-3 bg-gray-200 animate-pulse rounded mb-2"></div>
  </template>
</div>