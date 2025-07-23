@props([
    'model' => null,
    'rules' => null,
    'layout' => 'vertical', // vertical, horizontal, inline
    'inline' => false,
    'columns' => 1,
    'labelWidth' => null,
    'labelAlign' => 'left', // left, right, top
    'size' => 'md', // sm, md, lg
    'disabled' => false,
    'onSubmit' => null,
    'onValidate' => null,
])
@php
    $layoutClass = [
        'vertical' => 'flex flex-col gap-6',
        'horizontal' => 'grid gap-6',
        'inline' => 'flex flex-row flex-wrap items-end gap-4',
    ][$layout] ?? 'flex flex-col gap-6';
    $sizeClass = [
        'sm' => 'text-xs',
        'md' => 'text-sm',
        'lg' => 'text-base',
    ][$size] ?? 'text-sm';
    $columnsClass = $layout === 'horizontal' ? 'grid-cols-' . $columns : '';
    $formClass = $layoutClass . ' ' . $sizeClass . ' ' . $columnsClass;
@endphp
<form {{ $attributes->merge([
    'class' => $formClass,
    'onsubmit' => $onSubmit ? $onSubmit : null,
    'data-validate' => $onValidate ? 'true' : null,
    'novalidate' => $onValidate ? true : null,
]) }} @if($disabled) disabled @endif>
    {{ $slot }}
</form> 