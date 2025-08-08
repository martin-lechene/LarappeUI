<div x-data="{ w: 50 }" class="flex border rounded overflow-hidden">
  <div class="bg-white" :style="`width:${w}%`">
    <div class="p-3">{{ $left ?? 'Gauche' }}</div>
  </div>
  <div class="w-1 bg-gray-200 cursor-col-resize" @mousedown.prevent="const mm=e=>{ w=Math.min(80, Math.max(20, (e.clientX/$el.parentElement.clientWidth)*100 ))}; const mu=()=>{ window.removeEventListener('mousemove',mm); window.removeEventListener('mouseup',mu); }; window.addEventListener('mousemove',mm); window.addEventListener('mouseup',mu);"></div>
  <div class="flex-1 bg-white">
    <div class="p-3">{{ $right ?? 'Droite' }}</div>
  </div>
</div>