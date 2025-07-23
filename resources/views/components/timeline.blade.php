@props([
    'items' => [], // [{label, content, icon, color}]
    'mode' => 'left', // left, right, alternate
    'pending' => false,
    'reverse' => false,
])
@php
    $list = $reverse ? array_reverse($items) : $items;
@endphp
<ol class="relative border-l border-gray-200 dark:border-gray-700">
    @foreach($list as $item)
        <li class="mb-10 ml-6">
            <span class="absolute flex items-center justify-center w-6 h-6 rounded-full -left-3 ring-8 ring-white {{ $item['color'] ?? 'bg-blue-200' }}">
                @if(isset($item['icon']))
                    {!! $item['icon'] !!}
                @else
                    <svg class="w-3 h-3 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><circle cx="10" cy="10" r="10" /></svg>
                @endif
            </span>
            <h3 class="font-medium leading-tight">{{ $item['label'] ?? '' }}</h3>
            <p class="text-sm text-gray-500">{{ $item['content'] ?? '' }}</p>
        </li>
    @endforeach
    @if($pending)
        <li class="ml-6 text-gray-400">En attente…</li>
    @endif
    {{ $slot }}
</ol> 