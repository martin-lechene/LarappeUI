@props([
    'options' => [], // [{label, value}]
    'trigger' => 'click', // click, hover, focus
    'open' => false,
    'position' => 'bottom', // top, right, bottom, left
    'disabled' => false,
])
@php
    $positions = [
        'top' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        'right' => 'left-full top-1/2 -translate-y-1/2 ml-2',
        'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'left' => 'right-full top-1/2 -translate-y-1/2 mr-2',
    ];
    $dropdownClass = 'absolute z-20 hidden group-hover:block group-focus:block bg-white border border-gray-200 rounded shadow min-w-[160px] text-sm '.($positions[$position] ?? $positions['bottom']);
    if($open) $dropdownClass = str_replace('hidden', '', $dropdownClass);
@endphp
<div class="relative group {{ $disabled ? 'pointer-events-none opacity-50' : '' }}">
    {{ $slot }}
    <div class="{{ $dropdownClass }}">
        @foreach($options as $option)
            <button type="button" class="block w-full text-left px-4 py-2 hover:bg-gray-100" @if($disabled) disabled @endif>{{ is_array($option) ? ($option['label'] ?? $option['value'] ?? $option) : $option }}</button>
        @endforeach
    </div>
</div> 