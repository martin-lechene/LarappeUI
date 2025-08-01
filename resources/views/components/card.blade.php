@props([
    'variant' => 'default',
    'padding' => 'md',
    'shadow' => 'md',
    'border' => true,
    'hover' => false,
    'class' => ''
])

@php
    $cardClasses = [
        'card',
        'transition-all',
        'duration-200'
    ];

    // Variante
    switch ($variant) {
        case 'elevated':
            $cardClasses[] = 'card-elevated';
            break;
        case 'outlined':
            $cardClasses[] = 'card-outlined';
            break;
        case 'filled':
            $cardClasses[] = 'card-filled';
            break;
        case 'glass':
            $cardClasses[] = 'card-glass';
            break;
        default:
            $cardClasses[] = 'bg-surface border border-border';
            break;
    }

    // Padding
    switch ($padding) {
        case 'sm':
            $cardClasses[] = 'p-3';
            break;
        case 'lg':
            $cardClasses[] = 'p-8';
            break;
        case 'xl':
            $cardClasses[] = 'p-10';
            break;
        default:
            $cardClasses[] = 'p-6';
            break;
    }

    // Ombre
    switch ($shadow) {
        case 'none':
            $cardClasses[] = 'shadow-none';
            break;
        case 'sm':
            $cardClasses[] = 'shadow-sm';
            break;
        case 'lg':
            $cardClasses[] = 'shadow-lg';
            break;
        case 'xl':
            $cardClasses[] = 'shadow-xl';
            break;
        default:
            $cardClasses[] = 'shadow-md';
            break;
    }

    // Bordure
    if (!$border) {
        $cardClasses[] = 'border-0';
    }

    // Effet hover
    if ($hover) {
        $cardClasses[] = 'hover:shadow-lg hover:scale-105';
    }

    $cardClasses[] = $class;
@endphp

<div class="{{ implode(' ', $cardClasses) }}">
    {{ $slot }}
</div>