@props([
    'items' => null, // array [['label' => '', 'content' => '']]
    'title' => null,
    'column' => 1,
    'bordered' => false,
    'size' => 'md', // sm, md, lg
    'layout' => 'horizontal', // horizontal, vertical
    'labelStyle' => '',
    'contentStyle' => '',
])
@php
    $sizeClass = [
        'sm' => 'text-xs px-2 py-1',
        'md' => 'text-sm px-4 py-2',
        'lg' => 'text-base px-6 py-3',
    ][$size] ?? 'text-sm px-4 py-2';
    $borderClass = $bordered ? 'border border-gray-200' : '';
    $layoutClass = $layout === 'vertical' ? 'flex flex-col' : 'grid grid-cols-' . $column;
@endphp
<div {{ $attributes->merge(['class' => 'w-full']) }}>
    @if($title)
        <div class="font-semibold mb-2">{{ $title }}</div>
    @endif
    <div class="bg-white {{ $borderClass }} {{ $layoutClass }}">
        @if($items)
            @foreach($items as $item)
                <div class="{{ $sizeClass }} font-medium text-gray-600" style="{{ $labelStyle }}">{{ $item['label'] ?? '' }}</div>
                <div class="{{ $sizeClass }} text-gray-900" style="{{ $contentStyle }}">{{ $item['content'] ?? '' }}</div>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </div>
</div> 