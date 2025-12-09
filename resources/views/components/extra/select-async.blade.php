@props(['endpoint' => '/api/options', 'name' => 'select'])
<div x-data="selectAsync({ endpoint: '{{ $endpoint }}' })" class="relative">
  <x-form.input placeholder="Rechercher..." x-model="q" @input.debounce.300ms="search" />
  <div class="absolute z-10 mt-1 bg-white border rounded w-full max-h-48 overflow-auto" x-show="open">
    <template x-for="opt in options" :key="opt.value">
      <div class="px-3 py-2 hover:bg-gray-50 cursor-pointer" @click="choose(opt)" x-text="opt.label"></div>
    </template>
    <div class="p-2 text-xs text-gray-500" x-show="loading">Chargement...</div>
    <div class="p-2 text-xs text-gray-400" x-show="!loading && options.length===0">Aucun résultat</div>
  </div>
  <input type="hidden" name="{{ $name }}" :value="value">
</div>
<script>
function selectAsync({ endpoint }){
  return {
    q:'', value:'', options:[], loading:false, open:false,
    async search(){
      this.loading=true; this.open=true;
      // Démo: simuler une requête
      await new Promise(r=>setTimeout(r,200));
      const all = ['Paris','Lyon','Lille','Marseille','Bordeaux'].map(c=>({label:c,value:c.toLowerCase()}));
      this.options = all.filter(o=>o.label.toLowerCase().includes(this.q.toLowerCase()));
      this.loading=false;
    },
    choose(opt){ this.value = opt.value; this.q = opt.label; this.open=false; }
  }
}
</script>