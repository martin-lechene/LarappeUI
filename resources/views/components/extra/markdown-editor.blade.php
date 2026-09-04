@props(['name' => 'markdown'])
{{--
    marked est fourni par le bundle Vite (resources/js/app.js) et non plus par
    un <script> CDN place apres le composant : Alpine evaluait x-html avant que
    la balise ne se soit executee, d'ou "marked is not defined". Le garde sur
    typeof couvre le cas ou le bundle n'a pas encore ete evalue.
--}}
<div x-data="{ val: '' }" class="grid grid-cols-2 gap-3">
  <textarea x-model="val"
            class="border rounded p-2 h-40"
            aria-label="Source Markdown"
            placeholder="# Titre&#10;&#10;Contenu..."></textarea>
  <div class="border rounded p-2 prose prose-sm max-w-none"
       aria-live="polite"
       x-html="typeof marked !== 'undefined' ? marked.parse(val) : ''"></div>
  <input type="hidden" name="{{ $name }}" :value="val">
</div>
