@props([
    'label' => null,
    'help' => null,
    'error' => null,
    'required' => false,
    'for' => null,
])
<div {{ $attributes->merge(['class' => 'mb-4']) }}>
    @if($label)
        <label @if($for) for="{{ $for }}" @endif class="block font-medium mb-1 {{ $required ? 'after:content-["*"] after:text-red-500 after:ml-1' : '' }}">{{ $label }}</label>
    @endif
    <div>
        {{ $slot }}
    </div>
    @if($help)
        <div class="text-xs text-gray-500 mt-1">{{ $help }}</div>
    @endif
    @if($error)
        <div class="text-xs text-red-500 mt-1">{{ $error }}</div>
    @endif
</div> 