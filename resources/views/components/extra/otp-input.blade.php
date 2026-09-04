@props(['length' => 6, 'name' => 'otp', 'label' => 'Code de vérification'])
<div x-data="{ values: Array({{ (int) $length }}).fill('') }"
     role="group"
     aria-label="{{ $label }}"
     class="flex gap-2">
  <template x-for="(v, i) in values" :key="i">
    <input type="text"
           inputmode="numeric"
           autocomplete="one-time-code"
           maxlength="1"
           class="w-10 h-10 text-center border rounded"
           :aria-label="`Chiffre ${i + 1} sur {{ (int) $length }}`"
           x-model="values[i]"
           @input="$event.target.value = $event.target.value.replace(/[^0-9]/g, ''); if ($event.target.value) $focus.next()"
           @keydown.backspace="if (!$event.target.value) $focus.previous()" />
  </template>
  <input type="hidden" name="{{ $name }}" :value="values.join('')">
</div>
