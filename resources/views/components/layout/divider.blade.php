@props([
    'vertical' => false,
    'dashed' => false,
    'dotted' => false,
    'label' => null,
    'color' => 'gray', // gray, primary, secondary, danger, warning, success, info
    'size' => 'md', // sm, md, lg
    'text' => null,
    'textPosition' => 'center', // left, center, right
    'margin' => 'md', // sm, md, lg
])
@php
    $colors = [
        'gray' => 'border-gray-200 dark:border-gray-700',
        'primary' => 'border-blue-600',
        'secondary' => 'border-gray-500',
        'danger' => 'border-red-600',
        'warning' => 'border-yellow-500',
        'success' => 'border-green-600',
        'info' => 'border-cyan-500',
    ];
    $sizes = [
        'sm' => 'border-t-2',
        'md' => 'border-t-4',
        'lg' => 'border-t-8',
    ];
    $margins = [
        'sm' => 'my-2',
        'md' => 'my-4',
        'lg' => 'my-8',
    ];
    $borderStyle = $dashed ? 'border-dashed' : ($dotted ? 'border-dotted' : 'border-solid');
    $colorClass = $colors[$color] ?? $colors['gray'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $marginClass = $margins[$margin] ?? $margins['md'];
@endphp
@if($vertical)
    <div {{ $attributes->merge(['class' => 'h-full w-px '.$colorClass.' '.$borderStyle.' '.$marginClass]) }}></div>
@elseif($text || $label)
    <div class="flex items-center text-gray-400 text-xs {{$marginClass}}">
        <div class="flex-1 border-t {{$colorClass}} {{$borderStyle}} {{$sizeClass}}"></div>
        <span class="px-2 whitespace-nowrap">{{ $text ?? $label }}</span>
        <div class="flex-1 border-t {{$colorClass}} {{$borderStyle}} {{$sizeClass}}"></div>
    </div>
@else
    <hr {{ $attributes->merge(['class' => $marginClass.' '.$colorClass.' '.$borderStyle.' '.$sizeClass]) }} />
@endif 