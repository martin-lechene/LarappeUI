@props(['tabs' => ['Tab 1','Tab 2','Tab 3'], 'active' => 0])
<div x-data="{ active: {{ (int) $active }} }">
  <div class="flex gap-2 border-b">
    @foreach($tabs as $i => $t)
      <button type="button" class="px-3 py-2 text-sm border-b-2"
              :class="active === {{ $i }} ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-600'"
              @click="active = {{ $i }}">{{ $t }}</button>
    @endforeach
  </div>
  <div class="p-3">
    {{ $slot }}
  </div>
</div>