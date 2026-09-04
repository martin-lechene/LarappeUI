@props(['tabs' => ['Profil', 'Sécurité', 'Notifications'], 'active' => 0])
@php
  $uid = uniqid();
@endphp
<div x-data="{ active: {{ (int) $active }} }" class="grid grid-cols-4 gap-4">
  <div class="col-span-1 border rounded"
       role="tablist"
       aria-orientation="vertical"
       aria-label="{{ $attributes->get('aria-label', 'Sections') }}"
       @keydown.arrow-down.prevent="$focus.next()"
       @keydown.arrow-up.prevent="$focus.previous()">
    @foreach($tabs as $i => $t)
      <button type="button"
              role="tab"
              id="vtab-{{ $uid }}-{{ $i }}"
              aria-controls="vpanel-{{ $uid }}"
              :aria-selected="active === {{ $i }}"
              :tabindex="active === {{ $i }} ? 0 : -1"
              class="w-full text-left px-3 py-2 text-sm border-b focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
              :class="active === {{ $i }} ? 'bg-gray-50 text-gray-900' : 'text-gray-600'"
              @click="active = {{ $i }}">{{ $t }}</button>
    @endforeach
  </div>
  <div class="col-span-3 border rounded p-4"
       role="tabpanel"
       id="vpanel-{{ $uid }}"
       :aria-labelledby="'vtab-{{ $uid }}-' + active"
       tabindex="0">
    {{ $slot }}
  </div>
</div>
