@props(['initial' => 50, 'min' => 20, 'max' => 80, 'label' => 'Redimensionner les panneaux'])
<div x-data="{
        w: {{ (int) $initial }},
        min: {{ (int) $min }},
        max: {{ (int) $max }},
        poser(pourcent) {
            this.w = Math.min(this.max, Math.max(this.min, pourcent));
        },
        glisser(event) {
            const largeur = $el.parentElement.clientWidth;
            const mm = (e) => this.poser((e.clientX / largeur) * 100);
            const mu = () => {
                window.removeEventListener('mousemove', mm);
                window.removeEventListener('mouseup', mu);
            };
            window.addEventListener('mousemove', mm);
            window.addEventListener('mouseup', mu);
        },
     }"
     class="flex border rounded overflow-hidden">
  <div class="bg-white" :style="`width:${w}%`">
    <div class="p-3">{{ $left ?? 'Gauche' }}</div>
  </div>
  {{-- La poignee est un separateur manipulable : au clavier aussi, pas
       seulement a la souris. --}}
  <div class="w-1 bg-gray-200 cursor-col-resize focus:outline-none focus-visible:bg-primary"
       role="separator"
       aria-orientation="vertical"
       tabindex="0"
       :aria-valuenow="Math.round(w)"
       :aria-valuemin="min"
       :aria-valuemax="max"
       aria-label="{{ $label }}"
       @mousedown.prevent="glisser($event)"
       @keydown.arrow-left.prevent="poser(w - 2)"
       @keydown.arrow-right.prevent="poser(w + 2)"></div>
  <div class="flex-1 bg-white">
    <div class="p-3">{{ $right ?? 'Droite' }}</div>
  </div>
</div>
