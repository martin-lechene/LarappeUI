@props([
    'options' => [],
    'value' => '',
    'placeholder' => '',
    'disabled' => false,
    'multiple' => false,
    'clearable' => false,
    'loading' => false,
    'onInput' => null,
    'onSelect' => null,
])
<div {{ $attributes->merge(['class' => 'relative w-full']) }}>
    <input type="text"
        class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 disabled:bg-gray-100 disabled:cursor-not-allowed"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        @if($disabled) disabled @endif
        oninput="{{ $onInput }}"
    >
    @if($clearable && $value)
        <button type="button" class="absolute right-3 top-2 text-gray-400 hover:text-gray-700" onclick="this.previousElementSibling.value='';this.previousElementSibling.dispatchEvent(new Event('input'))">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
    @endif
    @if($loading)
        <div class="absolute right-8 top-2">
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