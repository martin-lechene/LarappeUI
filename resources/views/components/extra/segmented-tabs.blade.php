@props(['tabs' => ['A', 'B', 'C'], 'active' => 0, 'label' => 'Sélection'])
{{--
    Un controle segmente choisit une valeur parmi N sans posseder de panneau :
    c'est un radiogroup, pas un tablist. role="tab" sans tabpanel associe serait
    invalide.
--}}
<div x-data="{ active: {{ (int) $active }} }"
     role="radiogroup"
     aria-label="{{ $label }}"
     class="inline-flex rounded-lg border bg-surface p-1"
     @keydown.arrow-right.prevent="$focus.next()"
     @keydown.arrow-left.prevent="$focus.previous()">
  @foreach($tabs as $i => $t)
    <button type="button"
            role="radio"
            :aria-checked="active === {{ $i }}"
            :tabindex="active === {{ $i }} ? 0 : -1"
            class="px-3 py-1.5 text-sm rounded-md focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
            :class="active === {{ $i }} ? 'bg-white shadow text-gray-900' : 'text-gray-600 hover:text-gray-900'"
            @click="active = {{ $i }}">{{ $t }}</button>
  @endforeach
</div>
