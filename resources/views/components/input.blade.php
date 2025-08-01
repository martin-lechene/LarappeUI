@props([
    'type' => 'text',
    'placeholder' => null,
    'value' => null,
    'disabled' => false,
    'required' => false,
    'size' => 'md',
    'variant' => 'default',
    'class' => ''
])

@php
    $inputClasses = [
        'form-input',
        'w-full',
        'transition-all',
        'duration-200',
        'focus:outline-none',
        'focus:ring-2',
        'focus:ring-primary',
        'focus:border-transparent'
    ];

    // Taille
    switch ($size) {
        case 'sm':
            $inputClasses[] = 'px-2 py-1 text-sm';
            break;
        case 'lg':
            $inputClasses[] = 'px-4 py-3 text-lg';
            break;
        default:
            $inputClasses[] = 'px-3 py-2';
            break;
    }

    // Variante
    switch ($variant) {
        case 'outlined':
            $inputClasses[] = 'border-2 bg-transparent';
            break;
        case 'filled':
            $inputClasses[] = 'border-0 bg-surface';
            break;
        case 'minimal':
            $inputClasses[] = 'border-0 border-b-2 bg-transparent rounded-none';
            break;
        default:
            $inputClasses[] = 'border border-border';
            break;
    }

    // État désactivé
    if ($disabled) {
        $inputClasses[] = 'opacity-50 cursor-not-allowed';
    }

    $inputClasses[] = $class;
@endphp

<input 
    type="{{ $type }}"
    @if($placeholder) placeholder="{{ $placeholder }}" @endif
    @if($value) value="{{ $value }}" @endif
    @if($disabled) disabled @endif
    @if($required) required @endif
    class="{{ implode(' ', $inputClasses) }}"
    {{ $attributes }}
>