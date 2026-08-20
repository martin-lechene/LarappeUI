@props(['tabs' => ['Tab 1','Tab 2','Tab 3'], 'active' => 0])
<div x-data="{ active: {{ (int) $active }} }">
    <div class="flex gap-2 border-b border-[var(--color-border)]" role="tablist">
        @foreach($tabs as $i => $t)
            <button type="button"
                    role="tab"
                    id="tab-{{ $i }}"
                    :aria-selected="(active === {{ $i }}).toString()"
                    :tabindex="active === {{ $i }} ? 0 : -1"
                    aria-controls="tabpanel-{{ $i }}"
                    class="px-3 py-2 text-sm border-b-2 transition-colors focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)] focus:ring-inset rounded-t"
                    :class="active === {{ $i }} ? 'border-[var(--color-primary)] text-[var(--color-primary-readable)]' : 'border-transparent text-[var(--color-textSecondary)] hover:text-[var(--color-text)]'"
                    @click="active = {{ $i }}"
                    @keydown.arrow-right.prevent="active = Math.min(active + 1, {{ count($tabs) - 1 }})"
                    @keydown.arrow-left.prevent="active = Math.max(active - 1, 0)"
                    @keydown.home.prevent="active = 0"
                    @keydown.end.prevent="active = {{ count($tabs) - 1 }}">
                {{ $t }}
            </button>
        @endforeach
    </div>
    @foreach($tabs as $i => $t)
        <div id="tabpanel-{{ $i }}"
             role="tabpanel"
             aria-labelledby="tab-{{ $i }}"
             x-show="active === {{ $i }}"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="p-3 text-[var(--color-text)]"
             x-cloak>
            {{ $slot }}
        </div>
    @endforeach
</div>
