@props([
    'description' => null,
    'image' => null,
])
<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center py-8']) }}>
    @if($image)
        <img src="{{ $image }}" alt="Empty" class="w-12 h-12 mb-2 opacity-60" />
    @else
        <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="22" stroke-width="4" />
        </svg>
    @endif
    <span class="text-gray-500">{{ $description ?? $slot }}</span>
</div> 