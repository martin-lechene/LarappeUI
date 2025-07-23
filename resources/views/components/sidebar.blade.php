@props([
    'items' => null, // array [['label' => '', 'icon' => '', 'href' => '', 'active' => false]]
    'active' => null,
    'collapsed' => false,
    'width' => '56', // Tailwind width (ex: '56' for w-56)
])
@php
    $sidebarClass = 'bg-white border-r h-full flex flex-col ' . ($collapsed ? 'w-16' : 'w-' . $width);
@endphp
<aside {{ $attributes->merge(['class' => $sidebarClass]) }}>
    <nav class="flex-1 py-4">
        @if($items)
            <ul class="space-y-1">
                @foreach($items as $item)
                    <li>
                        <a href="{{ $item['href'] ?? '#' }}" class="flex items-center gap-2 px-4 py-2 rounded transition {{ ($item['active'] ?? false) || ($active === $item['label']) ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                            @if(!empty($item['icon']))<span>{!! $item['icon'] !!}</span>@endif
                            @if(!$collapsed)<span>{{ $item['label'] ?? '' }}</span>@endif
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            {{ $slot }}
        @endif
    </nav>
</aside> 