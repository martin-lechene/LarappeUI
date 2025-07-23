@props([
    'title' => null,
    'value' => null,
    'prefix' => null,
    'suffix' => null,
    'precision' => 0,
    'loading' => false,
])
<div {{ $attributes->merge(['class' => 'flex flex-col items-center']) }}>
    @if($title)
        <span class="text-sm text-gray-500 mb-1">{{ $title }}</span>
    @endif
    <span class="text-2xl font-bold flex items-center">
        @if($prefix)
            <span class="mr-1">{{ $prefix }}</span>
        @endif
        @if($loading)
            <svg class="animate-spin h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>
        @else
            {{ is_numeric($value) ? number_format($value, $precision) : $value }}
        @endif
        @if($suffix)
            <span class="ml-1">{{ $suffix }}</span>
        @endif
    </span>
    {{ $slot }}
</div> 