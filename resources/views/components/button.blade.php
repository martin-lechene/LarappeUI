@props([
    'label' => null,
    'color' => 'primary', // primary, secondary, success, warning, danger, info
    'size' => 'md', // xs, sm, md, lg
    'variant' => 'solid', // solid, outline, ghost, soft, link, icon
    'icon' => null,
    'loading' => false,
    'disabled' => false,
    'block' => false,
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none';
    $sizes = [
        'xs' => 'px-2 py-1 text-xs rounded',
        'sm' => 'px-3 py-1.5 text-xs rounded',
        'md' => 'px-4 py-2 text-sm rounded-md',
        'lg' => 'px-6 py-3 text-base rounded-lg',
    ];
    $palette = [
        'primary' => ['bg' => 'blue', 'text' => 'white'],
        'secondary' => ['bg' => 'gray', 'text' => 'gray-900'],
        'success' => ['bg' => 'green', 'text' => 'white'],
        'warning' => ['bg' => 'yellow', 'text' => 'white'],
        'danger' => ['bg' => 'red', 'text' => 'white'],
        'info' => ['bg' => 'cyan', 'text' => 'white'],
    ];
    $p = $palette[$color] ?? $palette['primary'];

    $variants = [
        'solid' => "bg-{$p['bg']}-600 text-{$p['text']} hover:bg-{$p['bg']}-700 focus:ring-{$p['bg']}-500",
        'outline' => "border border-{$p['bg']}-600 text-{$p['bg']}-600 bg-white hover:bg-{$p['bg']}-50 focus:ring-{$p['bg']}-500",
        'ghost' => "bg-transparent text-{$p['bg']}-600 hover:bg-{$p['bg']}-50 focus:ring-{$p['bg']}-500",
        'soft' => "bg-{$p['bg']}-50 text-{$p['bg']}-700 hover:bg-{$p['bg']}-100 focus:ring-{$p['bg']}-500",
        'link' => "bg-transparent text-{$p['bg']}-600 underline underline-offset-2 hover:text-{$p['bg']}-700 focus:ring-{$p['bg']}-500",
        'icon' => "p-2 rounded-full bg-{$p['bg']}-600 text-{$p['text']} hover:bg-{$p['bg']}-700 focus:ring-{$p['bg']}-500",
    ];

    $variantClasses = $variants[$variant] ?? $variants['solid'];
    $classes = $base . ' ' . $variantClasses . ' ' . ($sizes[$size] ?? $sizes['md']) . ($block ? ' w-full' : '');
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled || $loading]) }}>
    @if($loading)
        <svg class="animate-spin h-4 w-4 mr-2 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>
    @elseif($icon)
        <span class="mr-2">{!! $icon !!}</span>
    @endif
    {{ $label ?? $slot }}
</button> 