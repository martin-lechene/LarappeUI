@props([
    'name' => 'phone',
    'prefixes' => ['+33', '+32', '+41'],
    'prefixName' => 'phone_prefix',
])
<div class="flex items-center gap-2">
  <select name="{{ $prefixName }}" class="border rounded px-2 py-1" aria-label="Indicatif téléphonique">
    @foreach($prefixes as $prefix)
      <option value="{{ $prefix }}">{{ $prefix }}</option>
    @endforeach
  </select>
  <x-form.input type="tel" name="{{ $name }}" aria-label="Numéro de téléphone" placeholder="06 12 34 56 78" />
</div>
