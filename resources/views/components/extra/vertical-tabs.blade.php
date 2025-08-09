@props(['tabs' => ['Profil','Sécurité','Notifications'], 'active' => 0])
<div x-data="{ active: {{ (int)$active }} }" class="grid grid-cols-4 gap-4">
  <div class="col-span-1 border rounded">
    @foreach($tabs as $i => $t)
      <button type="button" class="w-full text-left px-3 py-2 text-sm border-b"
              :class="active==={{ $i }} ? 'bg-gray-50 text-gray-900' : 'text-gray-600'"
              @click="active={{ $i }}">{{ $t }}</button>
    @endforeach
  </div>
  <div class="col-span-3 border rounded p-4">
    {{ $slot }}
  </div>
</div>