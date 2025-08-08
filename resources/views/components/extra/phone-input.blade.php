@props(['name' => 'phone'])
<div class="flex items-center gap-2">
  <select class="border rounded px-2 py-1">
    <option>+33</option>
    <option>+32</option>
    <option>+41</option>
  </select>
  <x-form.input type="tel" name="{{ $name }}" placeholder="06 12 34 56 78" />
</div>