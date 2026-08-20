@props(['tabs' => ['A', 'B', 'C'], 'active' => 0, 'label' => 'Vues'])
<div x-data="{ active: {{ (int) $active }} }" class="inline-flex rounded-lg border bg-surface p-1" role="tablist" aria-label="{{ $label }}">
  @foreach($tabs as $i => $t)
    <button type="button"
            role="tab"
            :aria-selected="active === {{ $i }} ? 'true' : 'false'"
            :tabindex="active === {{ $i }} ? 0 : -1"
            class="px-3 py-1.5 text-sm rounded-md"
            :class="active === {{ $i }} ? 'bg-white shadow text-gray-900' : 'text-gray-600 hover:text-gray-900'"
            @click="active = {{ $i }}">{{ $t }}</button>
  @endforeach
</div>
