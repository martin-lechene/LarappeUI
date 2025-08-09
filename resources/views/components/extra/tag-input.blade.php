@props(['name' => 'tags'])
<div x-data="{ tags: [], input:'' }" class="border rounded-lg p-2">
  <div class="flex flex-wrap gap-2">
    <template x-for="(t,i) in tags" :key="i">
      <span class="px-2 py-0.5 text-sm rounded-full bg-gray-100">
        <span x-text="t"></span>
        <button class="ml-1 text-gray-400" @click="tags.splice(i,1)">✕</button>
      </span>
    </template>
    <input type="text" class="flex-1 outline-none" placeholder="Ajouter..." x-model="input" @keydown.enter.prevent="if(input){tags.push(input); input=''}">
  </div>
  <input type="hidden" name="{{ $name }}" :value="JSON.stringify(tags)">
</div>