@props(['name' => 'phone', 'indicatifs' => ['+33', '+32', '+41']])
@php
  $uid = uniqid();
@endphp
<div class="flex items-center gap-2">
  <label for="indicatif-{{ $uid }}" class="sr-only">Indicatif pays</label>
  <select id="indicatif-{{ $uid }}" name="{{ $name }}_indicatif" class="border rounded px-2 py-1">
    @foreach($indicatifs as $indicatif)
      <option>{{ $indicatif }}</option>
    @endforeach
  </select>
  <x-form.input type="tel" name="{{ $name }}" aria-label="Numéro de téléphone" placeholder="06 12 34 56 78" />
</div>
