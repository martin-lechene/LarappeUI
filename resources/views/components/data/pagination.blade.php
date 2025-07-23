@props([
    'total' => null,
    'pageSize' => 10,
    'currentPage' => 1,
    'onPageChange' => null,
    'showSizeChanger' => false,
    'pageSizeOptions' => [10, 20, 50, 100],
    'simple' => false,
    'showNumbers' => true,
    'showFirstLast' => true,
    'showPrevNext' => true,
    'showEllipsis' => true,
    'ellipsis' => '...',
    'prevText' => 'Précédent',
    'nextText' => 'Suivant',
    'firstText' => 'Début',
    'lastText' => 'Fin',
])
@php
    $totalPages = $total ? (int) ceil($total / $pageSize) : 1;
    $pages = range(1, $totalPages);
@endphp
<nav class="flex items-center justify-center gap-2" aria-label="Pagination">
    @if($simple)
        <button @if($currentPage <= 1) disabled @endif class="px-2 py-1 rounded border text-sm {{ $currentPage <= 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100' }}">&lt;</button>
        <span class="px-2">{{ $currentPage }}</span>
        <button @if($currentPage >= $totalPages) disabled @endif class="px-2 py-1 rounded border text-sm {{ $currentPage >= $totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100' }}">&gt;</button>
    @else
        @if($showFirstLast)
            <button @if($currentPage == 1) disabled @endif class="px-2 py-1 rounded border text-sm {{ $currentPage == 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100' }}">{{ $firstText }}</button>
        @endif
        @if($showPrevNext)
            <button @if($currentPage == 1) disabled @endif class="px-2 py-1 rounded border text-sm {{ $currentPage == 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100' }}">{{ $prevText }}</button>
        @endif
        @if($showNumbers)
            @php
                $window = 2;
                $start = max(1, $currentPage - $window);
                $end = min($totalPages, $currentPage + $window);
            @endphp
            @if($showEllipsis && $start > 1)
                <button class="px-2 py-1 rounded border text-sm hover:bg-gray-100">1</button>
                @if($start > 2)
                    <span class="px-2 text-gray-400">{{ $ellipsis }}</span>
                @endif
            @endif
            @for($i = $start; $i <= $end; $i++)
                <button class="px-2 py-1 rounded border text-sm {{ $i == $currentPage ? 'bg-blue-600 text-white' : 'hover:bg-gray-100' }}">{{ $i }}</button>
            @endfor
            @if($showEllipsis && $end < $totalPages)
                @if($end < $totalPages - 1)
                    <span class="px-2 text-gray-400">{{ $ellipsis }}</span>
                @endif
                <button class="px-2 py-1 rounded border text-sm hover:bg-gray-100">{{ $totalPages }}</button>
            @endif
        @endif
        @if($showPrevNext)
            <button @if($currentPage == $totalPages) disabled @endif class="px-2 py-1 rounded border text-sm {{ $currentPage == $totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100' }}">{{ $nextText }}</button>
        @endif
        @if($showFirstLast)
            <button @if($currentPage == $totalPages) disabled @endif class="px-2 py-1 rounded border text-sm {{ $currentPage == $totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100' }}">{{ $lastText }}</button>
        @endif
        @if($showSizeChanger)
            <select class="ml-4 border rounded text-sm px-2 py-1">
                @foreach($pageSizeOptions as $opt)
                    <option value="{{ $opt }}" @if($opt == $pageSize) selected @endif>{{ $opt }}/page</option>
                @endforeach
            </select>
        @endif
    @endif
    {{ $slot ?? '' }}
</nav> 