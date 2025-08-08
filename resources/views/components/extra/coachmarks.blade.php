<div x-data="{ step: 0, steps: [
  { sel: '[data-tour=header]', text:'Voici le header' },
  { sel: '[data-tour=nav]', text:'Navigation principale' },
  { sel: '[data-tour=content]', text:'Zone de contenu' },
]}" x-init="setTimeout(()=>step=1,500)">
  <template x-if="step>0">
    <div class="fixed inset-0 z-[60]">
      <div class="absolute inset-0 bg-black/50"></div>
      <template x-if="steps[step-1]">
        <div class="absolute" x-init="$nextTick(()=>{ const el=document.querySelector(steps[step-1].sel); if(!el) return; const r=el.getBoundingClientRect(); $el.style.top=r.bottom+8+'px'; $el.style.left=r.left+'px'; })">
          <div class="bg-white border rounded shadow p-3 w-64">
            <div class="text-sm" x-text="steps[step-1].text"></div>
            <div class="mt-2 flex justify-end gap-2">
              <x-button size="sm" color="secondary" @click="step=0">Fermer</x-button>
              <x-button size="sm" @click="step = step < steps.length ? step+1 : 0">Suivant</x-button>
            </div>
          </div>
        </div>
      </template>
    </div>
  </template>
</div>