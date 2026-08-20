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
    'csrf' => null, // null = automatique selon la méthode HTTP
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

    // Méthode demandée : `method` sert à la fois d'attribut HTML et de verbe
    // applicatif. Les verbes non supportés par les navigateurs sont émis via
    // le champ `_method` de Laravel.
    $requestedMethod = strtoupper($attributes->get('method', 'POST'));
    $spoofedMethod = in_array($requestedMethod, ['PUT', 'PATCH', 'DELETE'], true) ? $requestedMethod : null;
    $htmlMethod = $requestedMethod === 'GET' ? 'get' : 'post';

    // Le jeton CSRF est requis dès que la soumission n'est pas un GET.
    $needsCsrf = $csrf ?? ($requestedMethod !== 'GET');
@endphp
{{-- `except('method')` : merge() ne remplace pas un attribut déjà fourni, or la
     méthode HTML réellement émise peut différer du verbe demandé (spoofing). --}}
<form {{ $attributes->except('method')->merge([
    'class' => $formClass,
    'method' => $htmlMethod,
    'onsubmit' => $onSubmit ? $onSubmit : null,
    'data-validate' => $onValidate ? 'true' : null,
    'novalidate' => $onValidate ? true : null,
]) }}>
    @if($needsCsrf)
        @csrf
    @endif
    @if($spoofedMethod)
        @method($spoofedMethod)
    @endif
    {{-- `disabled` n'est pas un attribut valide sur <form> : on désactive les
         champs via un fieldset, qui neutralise bien tous les descendants. --}}
    @if($disabled)
        <fieldset disabled class="contents">
            {{ $slot }}
        </fieldset>
    @else
        {{ $slot }}
    @endif
</form>
