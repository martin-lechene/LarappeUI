@props([
    'type' => 'bar', // bar, line, pie, etc.
    'data' => null,
    'options' => null,
    'height' => 200,
    'width' => '100%',
    'loading' => false,
])
<div {{ $attributes->merge(['class' => 'relative bg-white rounded border p-4 flex items-center justify-center']) }} style="height:{{ $height }}px;width:{{ $width }};">
    @if($loading)
        <svg class="animate-spin h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>
    @elseif($data)
        <span class="text-xs text-gray-400">[Graphique {{ $type }} ici]</span>
        {{-- Ici, vous pouvez intégrer Chart.js, ApexCharts, etc. --}}
    @else
        {{ $slot }}
    @endif
</div> 