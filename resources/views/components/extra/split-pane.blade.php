@props(['initial' => 50, 'min' => 20, 'max' => 80, 'label' => 'Redimensionner les panneaux'])
<div x-data="{
        w: {{ (int) $initial }},
        resize(event) {
            const move = (e) => {
                this.w = Math.min({{ (int) $max }}, Math.max({{ (int) $min }}, (e.clientX / event.target.parentElement.clientWidth) * 100));
            };
            const up = () => {
                window.removeEventListener('mousemove', move);
                window.removeEventListener('mouseup', up);
            };
            window.addEventListener('mousemove', move);
            window.addEventListener('mouseup', up);
        },
        nudge(delta) {
            this.w = Math.min({{ (int) $max }}, Math.max({{ (int) $min }}, this.w + delta));
        }
     }"
     class="flex border rounded overflow-hidden">
  <div class="bg-white" :style="`width:${w}%`">
    <div class="p-3">{{ $left ?? 'Gauche' }}</div>
  </div>
  <div class="w-1 bg-gray-200 cursor-col-resize"
       role="separator"
       tabindex="0"
       aria-orientation="vertical"
       aria-label="{{ $label }}"
       :aria-valuenow="Math.round(w)"
       aria-valuemin="{{ (int) $min }}"
       aria-valuemax="{{ (int) $max }}"
       @mousedown.prevent="resize($event)"
       @keydown.arrow-left.prevent="nudge(-2)"
       @keydown.arrow-right.prevent="nudge(2)"></div>
  <div class="flex-1 bg-white">
    <div class="p-3">{{ $right ?? 'Droite' }}</div>
  </div>
</div>
