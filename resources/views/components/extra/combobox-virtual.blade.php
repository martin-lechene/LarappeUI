@props(['name' => 'combo'])
<div x-data="comboVirtual()" class="relative">
  <x-form.input placeholder="Tapez pour filtrer..." x-model="q" @focus="open=true" />
  <div class="absolute z-10 mt-1 bg-white border rounded w-full max-h-60 overflow-auto" x-show="open">
    <template x-for="opt in visible" :key="opt.value">
      <div class="px-3 py-2 hover:bg-gray-50 cursor-pointer" @click="select(opt)" x-text="opt.label"></div>
    </template>
  </div>
  <input type="hidden" name="{{ $name }}" :value="value">
</div>
<script>
function comboVirtual(){
  const all = Array.from({length:1000}, (_,i)=>({ value: `v${i}`, label: `Option ${i}` }));
  return {
    open:false, q:'', value:'', start:0, size:50,
    get filtered(){ return all.filter(o=>o.label.toLowerCase().includes(this.q.toLowerCase())); },
    get visible(){ return this.filtered.slice(this.start, this.start+this.size); },
    select(opt){ this.value=opt.value; this.q=opt.label; this.open=false; },
  }
}
</script>