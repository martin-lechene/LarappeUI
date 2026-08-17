@props(['title' => 'Modal Title', 'size' => 'md'])
@php
    $modalId = 'modal-' . uniqid();
    $titleId = $modalId . '-title';
    $sizes = [
        'sm' => 'max-w-sm',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp
<div x-data="{ open: false }"
     @keydown.escape.window="open = false">
    <div @click="open = true" role="button" tabindex="0" @keydown.enter="open = true" @keydown.space.prevent="open = true">
        {{ $trigger ?? 'Ouvrir' }}
    </div>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50"
         x-cloak>
        <div class="bg-[var(--color-surface)] rounded-xl shadow-2xl w-full {{ $sizeClass }} border border-[var(--color-border)]"
             role="dialog"
             aria-modal="true"
             aria-labelledby="{{ $titleId }}"
             @click.outside="open = false">
            <div class="flex items-center justify-between p-4 border-b border-[var(--color-border)]">
                <h3 id="{{ $titleId }}" class="font-semibold text-[var(--color-text)]">{{ $title }}</h3>
                <button @click="open = false"
                        aria-label="Fermer"
                        class="p-1 rounded text-[var(--color-textSecondary)] hover:text-[var(--color-text)] hover:bg-[var(--color-background)] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 text-[var(--color-text)]">{{ $slot }}</div>
            <div class="flex justify-end gap-2 p-4 border-t border-[var(--color-border)]">
                <x-button color="secondary" @click="open = false">Annuler</x-button>
                <x-button>Valider</x-button>
            </div>
        </div>
    </div>
</div>
