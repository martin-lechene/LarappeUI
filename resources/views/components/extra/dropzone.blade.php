@props(['name' => 'files'])
<div x-data="{ over:false }" @dragover.prevent="over=true" @dragleave="over=false" @drop.prevent="over=false" class="border-2 border-dashed rounded-lg p-6 text-center" :class="over?'border-blue-400 bg-blue-50':'border-gray-300'">
  <div class="text-sm text-gray-600">Glissez-déposez vos fichiers ici ou cliquez</div>
  <input type="file" multiple name="{{ $name }}" class="mt-2" />
</div>