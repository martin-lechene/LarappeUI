@props([
    'items' => [], // [{label, href}]
    'separator' => '/',
])
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        @if(!empty($items))
            @foreach($items as $i => $item)
                <li class="inline-flex items-center">
                    @if(isset($item['href']))
                        <a href="{{ $item['href'] }}" class="text-blue-600 hover:underline">{{ $item['label'] ?? $item }}</a>
                    @else
                        <span class="text-gray-500">{{ $item['label'] ?? $item }}</span>
                    @endif
                </li>
                @if($i < count($items) - 1)
                    <li aria-hidden="true" class="mx-2 text-gray-400 font-bold text-lg select-none flex items-center">{{ $separator }}</li>
                @endif
            @endforeach
        @else
            {{ $slot }}
        @endif
    </ol>
</nav> 