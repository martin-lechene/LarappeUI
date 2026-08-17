@props([
    'open' => false,
    'position' => 'right',
    'size' => 'md',
    'title' => null,
    'closable' => true,
    'mask' => true,
    'maskClosable' => true,
    'onClose' => null,
])
@php
    $drawerId = 'drawer-' . uniqid();
    $titleId = $drawerId . '-title';
    $positions = [
        'right' => 'right-0 top-0 h-full',
        'left' => 'left-0 top-0 h-full',
        'top' => 'top-0 left-0 w-full',
        'bottom' => 'bottom-0 left-0 w-full',
    ];
    $sizes = [
        'sm' => 'w-64 h-full',
        'md' => 'w-96 h-full',
        'lg' => 'w-[32rem] h-full',
        'full' => 'w-full h-full',
    ];
    $drawerClass = 'fixed z-50 bg-[var(--color-surface)] shadow-xl transition-transform duration-300 ' . ($positions[$position] ?? $positions['right']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp
@if($open)
    @if($mask)
        <div class="fixed inset-0 bg-black/40 z-40 transition-opacity"
             @if($maskClosable) @click="{{ $onClose }}" @endif
             aria-hidden="true"></div>
    @endif
    <div class="{{ $drawerClass }}"
         role="dialog"
         aria-modal="true"
         @if($title) aria-labelledby="{{ $titleId }}" @endif
         @keydown.escape.window="{{ $onClose }}"
         style="{{ $position === 'top' || $position === 'bottom' ? 'max-height:90vh;' : 'max-width:90vw;' }}">
        <div class="flex items-center justify-between px-6 py-4 border-b border-[var(--color-border)]">
            @if($title)
                <span id="{{ $titleId }}" class="font-semibold text-lg text-[var(--color-text)]">{{ $title }}</span>
            @endif
            @if($closable)
                <button type="button"
                        aria-label="Fermer le panneau"
                        class="p-1 rounded text-[var(--color-textSecondary)] hover:text-[var(--color-text)] hover:bg-[var(--color-background)] transition-colors"
                        @click="{{ $onClose }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif
        </div>
        <div class="p-6 overflow-auto max-h-[calc(100vh-64px)]">
            {{ $slot }}
        </div>
    </div>
@endif
