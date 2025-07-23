@props([
    'href' => '#',
    'target' => null,
    'title' => null,
    'icon' => null,
    'active' => false,
    'onClick' => null,
])
<a href="{{ $href }}"
   @if($target) target="{{ $target }}" @endif
   @if($title) title="{{ $title }}" @endif
   @if($onClick) onclick="{{ $onClick }}" @endif
   {{ $attributes->merge(['class' => ($active ? 'text-blue-600 font-semibold underline' : 'text-blue-500 hover:text-blue-700 underline')]) }}>
    @if($icon)
        <span class="mr-1">{!! $icon !!}</span>
    @endif
    {{ $slot }}
</a> 