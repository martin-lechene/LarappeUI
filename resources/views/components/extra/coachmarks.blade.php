@props(['autostart' => false])
{{--
    La visite guidee est opt-in. Elle etait auparavant declenchee
    automatiquement 500 ms apres le chargement de n'importe quelle page, ce qui
    recouvrait toute l'interface d'un voile noir. Dans une galerie de
    composants, la demo ne doit pas prendre la main sur la page.
--}}
<div x-data="{
        step: 0,
        steps: [
          { sel: '[data-tour=header]', text: 'Voici le header' },
          { sel: '[data-tour=nav]', text: 'Navigation principale' },
          { sel: '[data-tour=content]', text: 'Zone de contenu' },
        ],
        start() { this.step = 1; },
        close() { this.step = 0; },
        next() { this.step = this.step < this.steps.length ? this.step + 1 : 0; },
     }"
     @if($autostart) x-init="$nextTick(() => start())" @endif>

    <x-button size="sm" x-show="step === 0" @click="start()">Lancer la visite</x-button>

    <template x-if="step > 0">
        <div class="fixed inset-0 z-[60]" role="dialog" aria-modal="true" aria-label="Visite guidée">
            <div class="absolute inset-0 bg-black/50" @click="close()"></div>
            <template x-if="steps[step-1]">
                <div class="absolute"
                     x-init="$nextTick(() => {
                        const el = document.querySelector(steps[step-1].sel);
                        if (!el) {
                            // Cible absente : on centre l'infobulle plutot que de
                            // la laisser collee en 0,0 par-dessus le logo.
                            $el.style.top = '50%';
                            $el.style.left = '50%';
                            $el.style.transform = 'translate(-50%, -50%)';
                            return;
                        }
                        const r = el.getBoundingClientRect();
                        $el.style.top = r.bottom + 8 + 'px';
                        $el.style.left = r.left + 'px';
                     })">
                    <div class="bg-white border rounded shadow p-3 w-64">
                        <div class="text-sm" x-text="steps[step-1].text"></div>
                        <div class="mt-2 flex justify-end gap-2">
                            <x-button size="sm" color="secondary" @click="close()">Fermer</x-button>
                            <x-button size="sm" @click="next()">Suivant</x-button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </template>
</div>
