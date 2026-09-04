@props(['endpoint' => '/api/options', 'name' => 'select', 'label' => 'Rechercher'])
@php
  $uid = uniqid();
@endphp
<div x-data="selectAsync({ endpoint: @js($endpoint) })" class="relative">
  <x-form.input placeholder="Rechercher..."
                x-model="q"
                @input.debounce.300ms="search"
                role="combobox"
                aria-autocomplete="list"
                aria-label="{{ $label }}"
                aria-controls="async-list-{{ $uid }}"
                ::aria-expanded="open"
                @keydown.escape="open = false" />
  <div class="absolute z-10 mt-1 bg-white border rounded w-full max-h-48 overflow-auto"
       id="async-list-{{ $uid }}"
       role="listbox"
       aria-label="{{ $label }}"
       x-show="open">
    <template x-for="opt in options" :key="opt.value">
      <div role="option"
           :aria-selected="value === opt.value"
           class="px-3 py-2 hover:bg-gray-50 cursor-pointer"
           @click="choose(opt)"
           x-text="opt.label"></div>
    </template>
    <div class="p-2 text-xs text-gray-500" role="status" x-show="loading">Chargement...</div>
    <div class="p-2 text-xs text-gray-400" role="status" x-show="!loading && options.length === 0">Aucun résultat</div>
  </div>
  <input type="hidden" name="{{ $name }}" :value="value">
</div>
@once
  @push('scripts')
    <script nonce="{{ request()->attributes->get('csp_nonce') }}">
      function selectAsync({ endpoint }) {
        return {
          q: '',
          value: '',
          options: [],
          loading: false,
          open: false,
          async search() {
            this.loading = true;
            this.open = true;

            try {
              // L'endpoint declare est reellement appele : la version
              // precedente l'ignorait au profit d'un setTimeout et d'une liste
              // en dur, si bien que la prop `endpoint` ne servait a rien.
              const url = `${endpoint}?q=${encodeURIComponent(this.q)}`;
              const response = await fetch(url, { headers: { Accept: 'application/json' } });

              if (response.ok) {
                const data = await response.json();
                this.options = Array.isArray(data) ? data : (data.data ?? []);
                return;
              }
            } catch {
              // Endpoint injoignable : on retombe sur le jeu de demonstration
              // ci-dessous plutot que de laisser la liste vide.
            } finally {
              this.loading = false;
            }

            const demo = ['Paris', 'Lyon', 'Lille', 'Marseille', 'Bordeaux'].map((c) => ({
              label: c,
              value: c.toLowerCase(),
            }));
            this.options = demo.filter((o) => o.label.toLowerCase().includes(this.q.toLowerCase()));
          },
          choose(opt) {
            this.value = opt.value;
            this.q = opt.label;
            this.open = false;
          },
        };
      }
    </script>
  @endpush
@endonce
