@props([
    'open' => false,
    'position' => 'right', // right, left, top, bottom
    'size' => 'md', // sm, md, lg, full
    'title' => null,
    'closable' => true,
    'mask' => true,
    'maskClosable' => true,
    'onClose' => null,
])
@php
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
    $drawerClass = 'fixed z-50 bg-white shadow-xl transition-transform duration-300 ' . ($positions[$position] ?? $positions['right']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp
@if($open)
    @if($mask)
        <div class="fixed inset-0 bg-black/40 z-40 transition-opacity" @if($maskClosable) onclick="{{ $onClose }}" @endif></div>
    @endif
    <div class="{{ $drawerClass }}" style="{{ $position === 'top' || $position === 'bottom' ? 'max-height:90vh;' : 'max-width:90vw;' }}">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <span class="font-semibold text-lg">{{ $title }}</span>
            @if($closable)
                <button type="button" class="text-gray-400 hover:text-gray-700" onclick="{{ $onClose }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            @endif
        </div>
        <div class="p-6 overflow-auto max-h-[calc(100vh-64px)]">
            {{ $slot }}
        </div>
    </div>
@endif 