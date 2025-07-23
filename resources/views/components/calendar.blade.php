@props([
    'value' => null,
    'events' => [],
    'onChange' => null,
    'onSelect' => null,
    'disabledDates' => [],
    'minDate' => null,
    'maxDate' => null,
])
<div {{ $attributes->merge(['class' => 'bg-white rounded border p-4 w-full']) }}>
    <span class="text-xs text-gray-400">[Calendrier ici]</span>
    {{-- Ici, vous pouvez intégrer un calendrier JS ou afficher le slot --}}
    {{ $slot }}
</div> 