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
    // Les classes doivent apparaitre LITTERALEMENT : le scanner de Tailwind v4
    // lit les sources en texte et ne resout aucune interpolation. La version
    // precedente construisait "bg-{$couleur}-600", si bien que bg-gray-600,
    // bg-yellow-600 et bg-cyan-600 n'etaient jamais generes : les boutons
    // secondary, warning et info s'affichaient sans aucun style.
    $variants = [
        'primary' => [
            'solid' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
            'outline' => 'border border-blue-600 text-blue-600 bg-white hover:bg-blue-50 focus:ring-blue-500',
            'ghost' => 'bg-transparent text-blue-600 hover:bg-blue-50 focus:ring-blue-500',
            'soft' => 'bg-blue-50 text-blue-700 hover:bg-blue-100 focus:ring-blue-500',
            'link' => 'bg-transparent text-blue-600 underline underline-offset-2 hover:text-blue-700 focus:ring-blue-500',
            'icon' => 'p-2 rounded-full bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        ],
        'secondary' => [
            'solid' => 'bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500',
            'outline' => 'border border-gray-600 text-gray-600 bg-white hover:bg-gray-50 focus:ring-gray-500',
            'ghost' => 'bg-transparent text-gray-600 hover:bg-gray-50 focus:ring-gray-500',
            'soft' => 'bg-gray-50 text-gray-700 hover:bg-gray-100 focus:ring-gray-500',
            'link' => 'bg-transparent text-gray-600 underline underline-offset-2 hover:text-gray-700 focus:ring-gray-500',
            'icon' => 'p-2 rounded-full bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500',
        ],
        'success' => [
            'solid' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
            'outline' => 'border border-green-600 text-green-600 bg-white hover:bg-green-50 focus:ring-green-500',
            'ghost' => 'bg-transparent text-green-600 hover:bg-green-50 focus:ring-green-500',
            'soft' => 'bg-green-50 text-green-700 hover:bg-green-100 focus:ring-green-500',
            'link' => 'bg-transparent text-green-600 underline underline-offset-2 hover:text-green-700 focus:ring-green-500',
            'icon' => 'p-2 rounded-full bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
        ],
        'warning' => [
            'solid' => 'bg-yellow-600 text-white hover:bg-yellow-700 focus:ring-yellow-500',
            'outline' => 'border border-yellow-600 text-yellow-600 bg-white hover:bg-yellow-50 focus:ring-yellow-500',
            'ghost' => 'bg-transparent text-yellow-600 hover:bg-yellow-50 focus:ring-yellow-500',
            'soft' => 'bg-yellow-50 text-yellow-700 hover:bg-yellow-100 focus:ring-yellow-500',
            'link' => 'bg-transparent text-yellow-600 underline underline-offset-2 hover:text-yellow-700 focus:ring-yellow-500',
            'icon' => 'p-2 rounded-full bg-yellow-600 text-white hover:bg-yellow-700 focus:ring-yellow-500',
        ],
        'danger' => [
            'solid' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
            'outline' => 'border border-red-600 text-red-600 bg-white hover:bg-red-50 focus:ring-red-500',
            'ghost' => 'bg-transparent text-red-600 hover:bg-red-50 focus:ring-red-500',
            'soft' => 'bg-red-50 text-red-700 hover:bg-red-100 focus:ring-red-500',
            'link' => 'bg-transparent text-red-600 underline underline-offset-2 hover:text-red-700 focus:ring-red-500',
            'icon' => 'p-2 rounded-full bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
        ],
        'info' => [
            'solid' => 'bg-cyan-600 text-white hover:bg-cyan-700 focus:ring-cyan-500',
            'outline' => 'border border-cyan-600 text-cyan-600 bg-white hover:bg-cyan-50 focus:ring-cyan-500',
            'ghost' => 'bg-transparent text-cyan-600 hover:bg-cyan-50 focus:ring-cyan-500',
            'soft' => 'bg-cyan-50 text-cyan-700 hover:bg-cyan-100 focus:ring-cyan-500',
            'link' => 'bg-transparent text-cyan-600 underline underline-offset-2 hover:text-cyan-700 focus:ring-cyan-500',
            'icon' => 'p-2 rounded-full bg-cyan-600 text-white hover:bg-cyan-700 focus:ring-cyan-500',
        ],
    ];

    $colorVariants = $variants[$color] ?? $variants['primary'];
    $variantClasses = $colorVariants[$variant] ?? $colorVariants['solid'];
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