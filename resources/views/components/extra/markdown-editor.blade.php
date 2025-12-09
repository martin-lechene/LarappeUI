@props(['name' => 'markdown'])
<div x-data="{ val: '' }" class="grid grid-cols-2 gap-3">
  <textarea x-model="val" class="border rounded p-2 h-40" placeholder="# Titre\n\nContenu..."></textarea>
  <div class="border rounded p-2 prose prose-sm max-w-none" x-html="marked.parse(val)"></div>
  <input type="hidden" name="{{ $name }}" :value="val">
</div>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>