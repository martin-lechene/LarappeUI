@props([
    'size' => 'md', // sm, md, lg
    'color' => 'blue', // blue, gray, red, etc.
    'thickness' => 4,
    'variant' => 'default', // default, material, ant, bootstrap, pulse, dots, bars
])
@php
    $sizes = [
        'sm' => 'h-4 w-4',
        'md' => 'h-5 w-5',
        'lg' => 'h-8 w-8',
    ];
    $colors = [
        'blue' => 'text-blue-600',
        'gray' => 'text-gray-500',
        'red' => 'text-red-600',
        'green' => 'text-green-600',
        'yellow' => 'text-yellow-500',
    ];
    $class = ($sizes[$size] ?? $sizes['md']).' '.($colors[$color] ?? $colors['blue']);
@endphp
@if($variant === 'material')
    <svg class="animate-spin {{ $class }}" viewBox="0 0 50 50"><circle class="opacity-25" cx="25" cy="25" r="20" fill="none" stroke="currentColor" stroke-width="5"></circle></svg>
@elseif($variant === 'ant')
    <span class="inline-block {{ $class }} animate-spin border-4 border-current border-t-transparent rounded-full"></span>
@elseif($variant === 'bootstrap')
    <span class="inline-block {{ $class }} align-middle border-4 border-current border-right-transparent rounded-full animate-spin"></span>
@elseif($variant === 'pulse')
    <span class="relative flex h-5 w-5"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-current opacity-75"></span><span class="relative inline-flex rounded-full h-5 w-5 bg-current"></span></span>
@elseif($variant === 'dots')
    <span class="flex space-x-1 {{ $class }}"><span class="animate-bounce inline-block w-2 h-2 bg-current rounded-full"></span><span class="animate-bounce inline-block w-2 h-2 bg-current rounded-full delay-150"></span><span class="animate-bounce inline-block w-2 h-2 bg-current rounded-full delay-300"></span></span>
@elseif($variant === 'bars')
    <span class="flex space-x-1 {{ $class }}"><span class="inline-block w-1 h-4 bg-current animate-pulse"></span><span class="inline-block w-1 h-6 bg-current animate-pulse delay-150"></span><span class="inline-block w-1 h-3 bg-current animate-pulse delay-300"></span></span>
@else
    <svg class="animate-spin {{ $class }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="{{ $thickness }}"></circle>
      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
    </svg>
@endif 