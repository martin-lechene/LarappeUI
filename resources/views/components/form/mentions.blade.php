@props([
    'value' => '',
    'options' => [],
    'loading' => false,
    'disabled' => false,
    'placeholder' => '',
    'onSearch' => null,
    'onSelect' => null,
])
<div {{ $attributes->merge(['class' => 'relative w-full']) }}>
    <textarea
        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 disabled:bg-gray-100 disabled:cursor-not-allowed"
        placeholder="{{ $placeholder }}"
        @if($disabled) disabled @endif
        oninput="{{ $onSearch }}"
    >{{ $value }}</textarea>
    @if($loading)
        <div class="absolute right-3 top-3">
            <svg class="animate-spin h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>
        </div>
    @endif
    @if(!empty($options))
        <ul class="absolute left-0 right-0 bg-white border rounded shadow mt-1 z-10 max-h-40 overflow-auto">
            @foreach($options as $option)
                <li class="px-4 py-2 hover:bg-blue-50 cursor-pointer" onclick="{{ $onSelect }}">{{ is_array($option) ? ($option['label'] ?? $option['value'] ?? '') : $option }}</li>
            @endforeach
        </ul>
    @endif
    {{ $slot }}
</div> 