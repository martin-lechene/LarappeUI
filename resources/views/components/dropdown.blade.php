@props([
    'options' => [],
    'position' => 'bottom',
    'disabled' => false,
    'label' => 'Menu',
])
@php
    $positions = [
        'top' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        'right' => 'left-full top-1/2 -translate-y-1/2 ml-2',
        'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'left' => 'right-full top-1/2 -translate-y-1/2 mr-2',
    ];
    $posClass = $positions[$position] ?? $positions['bottom'];
@endphp
<div class="relative inline-block"
     x-data="{ open: false }"
     @keydown.escape.window="open = false"
     @click.outside="open = false">
    <div @click="open = !open" @keydown.enter="open = !open" @keydown.space.prevent="open = !open">
        {{ $slot }}
    </div>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="absolute z-20 {{ $posClass }} bg-[var(--color-surface)] border border-[var(--color-border)] rounded-lg shadow-lg min-w-[160px] text-sm py-1"
         role="menu"
         aria-label="{{ $label }}"
         x-cloak>
        @foreach($options as $option)
            @php
                $optLabel = is_array($option) ? ($option['label'] ?? $option['value'] ?? '') : $option;
                $optValue = is_array($option) ? ($option['value'] ?? $option['label'] ?? '') : $option;
            @endphp
            <button type="button"
                    role="menuitem"
                    @click="open = false"
                    @if($disabled) disabled aria-disabled="true" @endif
                    class="block w-full text-left px-4 py-2 text-sm text-[var(--color-text)] hover:bg-[var(--color-background)] hover:text-[var(--color-primary)] focus:bg-[var(--color-background)] focus:outline-none transition-colors">
                {{ $optLabel }}
            </button>
        @endforeach
    </div>
</div>
