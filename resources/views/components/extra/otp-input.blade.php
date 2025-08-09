@props(['length' => 6])
<div x-data="{ values: Array({{ (int)$length }}).fill('') }" class="flex gap-2">
  <template x-for="(v,i) in values" :key="i">
    <input type="text" maxlength="1" class="w-10 h-10 text-center border rounded" x-model="values[i]"
      @input="$event.target.value=$event.target.value.replace(/[^0-9]/g,'')"
    />
  </template>
  <input type="hidden" name="otp" :value="values.join('')">
</div>