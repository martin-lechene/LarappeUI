@props([
    'value' => '',
    'placeholder' => '',
    'disabled' => false,
    'readonly' => false,
    'rows' => 4,
    'toolbar' => null,
    'error' => null,
])
<div {{ $attributes->merge(['class' => 'w-full']) }}>
    <textarea
        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 disabled:bg-gray-100 disabled:cursor-not-allowed"
        placeholder="{{ $placeholder }}"
        rows="{{ $rows }}"
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
    >{{ $value ?: ($slot ?? '') }}</textarea>
    @if($toolbar)
        <div class="mt-2 flex gap-2">
            @foreach($toolbar as $tool)
                <button type="button" class="px-2 py-1 rounded bg-gray-100 hover:bg-gray-200 text-xs">{{ $tool }}</button>
            @endforeach
        </div>
    @endif
    @if($error)
        <div class="text-xs text-red-500 mt-1">{{ $error }}</div>
    @endif
</div> 