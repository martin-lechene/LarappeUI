@props([
    'src' => null,
    'alt' => '',
    'width' => null,
    'height' => null,
    'rounded' => 'md', // none, sm, md, lg, xl, full
    'shadow' => false,
    'fit' => 'cover', // cover, contain, fill, none, scale-down
    'placeholder' => null,
    'error' => null,
])
@php
    $roundedClass = [
        'none' => '',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'xl' => 'rounded-xl',
        'full' => 'rounded-full',
    ][$rounded] ?? 'rounded-md';
    $shadowClass = $shadow ? 'shadow' : '';
    $imgClass = trim($roundedClass . ' ' . $shadowClass);
@endphp
@if($src)
    <img src="{{ $src }}" alt="{{ $alt }}" width="{{ $width }}" height="{{ $height }}" class="object-{{ $fit }} {{ $imgClass }}" onerror="this.onerror=null;this.src='{{ $error ?? $placeholder }}';" />
@elseif($placeholder)
    <img src="{{ $placeholder }}" alt="placeholder" width="{{ $width }}" height="{{ $height }}" class="object-{{ $fit }} {{ $imgClass }} opacity-60" />
@else
    <div class="bg-gray-100 flex items-center justify-center {{ $imgClass }}" style="width:{{ $width ?? '100px' }};height:{{ $height ?? '100px' }};">
        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 48 48"><circle cx="24" cy="24" r="22" stroke-width="4" /></svg>
        {{ $slot ?? '' }}
    </div>
@endif 