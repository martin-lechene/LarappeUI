@props([
    'value' => 0,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'disabled' => false,
    'vertical' => false,
    'marks' => [], // [valeur => label]
    'tooltip' => false,
])
<div class="flex {{ $vertical ? 'flex-col h-32' : 'flex-col' }} items-center w-full">
    <input
        type="range"
        min="{{ $min }}"
        max="{{ $max }}"
        step="{{ $step }}"
        value="{{ $value }}"
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => 'w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700']) }}
        @if($vertical) style="writing-mode: bt-lr; -webkit-appearance: slider-vertical; height: 100px;" @endif
    />
    @if($tooltip)
        <span class="mt-2 text-xs text-gray-500">{{ $value }}</span>
    @endif
    @if(!empty($marks))
        <div class="flex w-full justify-between mt-2">
            @foreach($marks as $markValue => $markLabel)
                <span class="text-xs text-gray-400">{{ $markLabel }}</span>
            @endforeach
        </div>
    @endif
</div> 