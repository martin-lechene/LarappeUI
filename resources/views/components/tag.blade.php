@props([
    'label' => null,
    'color' => 'gray', // gray, blue, red, green, yellow
    'closable' => false,
    'icon' => null,
    'onClose' => null,
])
@php
    $colors = [
        'gray' => 'bg-gray-100 text-gray-800',
        'blue' => 'bg-blue-100 text-blue-800',
        'red' => 'bg-red-100 text-red-800',
        'green' => 'bg-green-100 text-green-800',
        'yellow' => 'bg-yellow-100 text-yellow-800',
    ];
    $classes = 'inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium '.($colors[$color] ?? $colors['gray']);
@endphp
<span {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <span class="mr-1">{!! $icon !!}</span>
    @endif
    {{ $label ?? $slot }}
    @if($closable)
        <button type="button" class="ml-2 text-gray-400 hover:text-gray-600 focus:outline-none" @if($onClose) onclick="{{ $onClose }}" @endif>&times;</button>
    @endif
</span> 