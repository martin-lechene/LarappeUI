@props([
    'offsetTop' => null,
    'offsetBottom' => null,
    'target' => null,
    'zIndex' => 40,
    'onChange' => null,
])
@php
    $style = '';
    if ($offsetTop !== null) $style .= 'top:' . intval($offsetTop) . 'px;';
    if ($offsetBottom !== null) $style .= 'bottom:' . intval($offsetBottom) . 'px;';
    $style .= 'z-index:' . intval($zIndex) . ';';
@endphp
<div {{ $attributes->merge(['class' => 'sticky', 'style' => $style, 'data-affix-target' => $target, 'onchange' => $onChange]) }}>
    {{ $slot }}
</div> 