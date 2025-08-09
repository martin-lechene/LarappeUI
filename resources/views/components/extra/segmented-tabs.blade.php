@props(['tabs' => ['A','B','C'], 'active' => 0])
<div x-data="{ active: {{ (int)$active }} }" class="inline-flex rounded-lg border bg-surface p-1">
  @foreach($tabs as $i => $t)
    <button type="button" class="px-3 py-1.5 text-sm rounded-md"
            :class="active==={{ $i }} ? 'bg-white shadow text-gray-900' : 'text-gray-600 hover:text-gray-900'"
            @click="active={{ $i }}">{{ $t }}</button>
  @endforeach
</div>