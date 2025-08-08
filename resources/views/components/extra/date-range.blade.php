@props(['startName' => 'start', 'endName' => 'end'])
<div class="flex items-center gap-2">
  <x-form.input type="date" name="{{ $startName }}" />
  <span class="text-gray-400">→</span>
  <x-form.input type="date" name="{{ $endName }}" />
</div>