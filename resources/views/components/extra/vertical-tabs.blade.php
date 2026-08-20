@props(['tabs' => ['Profil', 'Sécurité', 'Notifications'], 'active' => 0, 'label' => 'Sections'])
@php $id = 'vtabs-' . Str::random(6); @endphp
<div x-data="{ active: {{ (int) $active }} }" class="grid grid-cols-4 gap-4">
  <div class="col-span-1 border rounded" role="tablist" aria-orientation="vertical" aria-label="{{ $label }}">
    @foreach($tabs as $i => $t)
      <button type="button"
              role="tab"
              id="{{ $id }}-tab-{{ $i }}"
              aria-controls="{{ $id }}-panel"
              :aria-selected="active === {{ $i }} ? 'true' : 'false'"
              :tabindex="active === {{ $i }} ? 0 : -1"
              class="w-full text-left px-3 py-2 text-sm border-b"
              :class="active === {{ $i }} ? 'bg-gray-50 text-gray-900' : 'text-gray-600'"
              @click="active = {{ $i }}">{{ $t }}</button>
    @endforeach
  </div>
  <div class="col-span-3 border rounded p-4"
       role="tabpanel"
       id="{{ $id }}-panel"
       :aria-labelledby="`{{ $id }}-tab-${active}`"
       tabindex="0">
    {{ $slot }}
  </div>
</div>
