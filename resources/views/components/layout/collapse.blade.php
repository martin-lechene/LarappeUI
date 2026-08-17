@props([
    'open' => false,
    'title' => null,
    'icon' => null,
    'disabled' => false,
])
@php
    $collapseId = 'collapse-' . uniqid();
@endphp
<div {{ $attributes->merge(['class' => 'border rounded-lg shadow-sm border-[var(--color-border)]']) }}
     x-data="{ isOpen: {{ $open ? 'true' : 'false' }} }">
    <button type="button"
            class="w-full flex items-center justify-between px-4 py-3 bg-[var(--color-surface)] hover:bg-[var(--color-background)] rounded-t-lg text-[var(--color-text)] transition-colors focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)] focus:ring-inset"
            @if($disabled) disabled aria-disabled="true" @endif
            @click="isOpen = !isOpen"
            :aria-expanded="isOpen.toString()"
            aria-controls="{{ $collapseId }}">
        <span class="flex items-center gap-2 font-medium">
            @if($icon)
                {!! $icon !!}
            @endif
            {{ $title }}
        </span>
        <svg class="w-4 h-4 ml-2 transition-transform duration-200 text-[var(--color-textSecondary)]"
             :class="{ 'rotate-180': isOpen }"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div id="{{ $collapseId }}"
         role="region"
         x-show="isOpen"
         x-collapse
         x-cloak
         class="px-4 py-3 text-[var(--color-text)]">
        {{ $slot }}
    </div>
</div>
