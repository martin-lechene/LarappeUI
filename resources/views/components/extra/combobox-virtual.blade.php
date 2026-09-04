@props(['name' => 'combo', 'label' => 'Filtrer les options'])
@php
  $uid = uniqid();
@endphp
<div x-data="comboVirtual()" class="relative">
  <x-form.input placeholder="Tapez pour filtrer..."
                x-model="q"
                @focus="open = true"
                role="combobox"
                aria-autocomplete="list"
                aria-label="{{ $label }}"
                aria-controls="combo-list-{{ $uid }}"
                ::aria-expanded="open"
                ::aria-activedescendant="active ? 'combo-opt-{{ $uid }}-' + active : null"
                @keydown.escape="open = false" />
  <div class="absolute z-10 mt-1 bg-white border rounded w-full max-h-60 overflow-auto"
       id="combo-list-{{ $uid }}"
       role="listbox"
       aria-label="{{ $label }}"
       x-show="open">
    <template x-for="opt in visible" :key="opt.value">
      <div role="option"
           :id="'combo-opt-{{ $uid }}-' + opt.value"
           :aria-selected="value === opt.value"
           class="px-3 py-2 hover:bg-gray-50 cursor-pointer"
           @click="select(opt)"
           x-text="opt.label"></div>
    </template>
  </div>
  <input type="hidden" name="{{ $name }}" :value="value">
</div>
@once
  @push('scripts')
    <script nonce="{{ request()->attributes->get('csp_nonce') }}">
      function comboVirtual() {
        const all = Array.from({ length: 1000 }, (_, i) => ({ value: `v${i}`, label: `Option ${i}` }));
        return {
          open: false,
          q: '',
          value: '',
          active: '',
          start: 0,
          size: 50,
          get filtered() {
            return all.filter((o) => o.label.toLowerCase().includes(this.q.toLowerCase()));
          },
          get visible() {
            return this.filtered.slice(this.start, this.start + this.size);
          },
          select(opt) {
            this.value = opt.value;
            this.active = opt.value;
            this.q = opt.label;
            this.open = false;
          },
        };
      }
    </script>
  @endpush
@endonce
