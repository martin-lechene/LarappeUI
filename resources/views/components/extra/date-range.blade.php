@props([
    'startName' => 'start',
    'endName' => 'end',
    'startLabel' => 'Date de début',
    'endLabel' => 'Date de fin',
    'label' => 'Plage de dates',
])
<div class="flex flex-wrap items-center gap-2" role="group" aria-label="{{ $label }}">
  <x-form.input type="date" name="{{ $startName }}" aria-label="{{ $startLabel }}" />
  <span class="text-gray-400" aria-hidden="true">→</span>
  <x-form.input type="date" name="{{ $endName }}" aria-label="{{ $endLabel }}" />
</div>
