@props(['length' => 6, 'name' => 'otp'])
<div x-data="{ values: Array({{ (int) $length }}).fill('') }" class="flex gap-2" role="group" aria-label="Code de vérification à {{ (int) $length }} chiffres">
  <template x-for="(v, i) in values" :key="i">
    <input type="text"
           inputmode="numeric"
           autocomplete="one-time-code"
           maxlength="1"
           class="w-10 h-10 text-center border rounded"
           :aria-label="`Chiffre ${i + 1} sur {{ (int) $length }}`"
           x-model="values[i]"
           @input="$event.target.value = $event.target.value.replace(/[^0-9]/g, '')"
    />
  </template>
  <input type="hidden" name="{{ $name }}" :value="values.join('')">
</div>
