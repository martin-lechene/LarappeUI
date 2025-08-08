@extends('layouts.app')

@section('title', 'Components')

@section('content')
<div x-data="componentsPage()">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <template x-for="block in componentBlocks" :key="block.key">
                <div class="bg-white border rounded-lg shadow-sm">
                    <div class="flex items-center justify-between px-4 py-3 border-b">
                        <div class="font-semibold" x-text="block.title"></div>
                        <div class="flex items-center gap-2 text-sm">
                            <button @click="block.activeTab = 'preview'" :class="block.activeTab === 'preview' ? 'text-primary' : 'text-gray-500'">Aperçu</button>
                            <span class="text-gray-300">|</span>
                            <button @click="block.activeTab = 'code'" :class="block.activeTab === 'code' ? 'text-primary' : 'text-gray-500'">Code</button>
                        </div>
                    </div>
                    <div class="p-4">
                        <div x-show="block.activeTab === 'preview'" class="space-y-4">
                            <template x-if="block.key === 'button'"><div class="flex gap-3 flex-wrap">
                                <x-button>Primary</x-button>
                                <x-button color="secondary">Secondary</x-button>
                                <x-button color="success">Success</x-button>
                                <x-button color="warning">Warning</x-button>
                                <x-button color="danger">Danger</x-button>
                                <x-button color="info">Info</x-button>
                            </div></template>

                            <template x-if="block.key === 'base-inputs'"><div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <x-input placeholder="Global input" />
                                <x-input type="password" placeholder="Password" />
                            </div></template>

                            <template x-if="block.key === 'calendar'"><div>
                                <x-calendar />
                            </div></template>

                            <template x-if="block.key === 'card'"><div>
                                <x-card title="Titre de la carte">Contenu de la carte</x-card>
                            </div></template>

                            <template x-if="block.key === 'dropdown'"><div>
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <x-button>Ouvrir</x-button>
                                    </x-slot>
                                    <a class="block px-4 py-2 hover:bg-gray-50">Action 1</a>
                                    <a class="block px-4 py-2 hover:bg-gray-50">Action 2</a>
                                </x-dropdown>
                            </div></template>

                            <template x-if="block.key === 'form-input'"><div><x-form.input label="Nom" placeholder="John Doe" /></div></template>
                            <template x-if="block.key === 'form-select'"><div><x-form.select label="Pays" :options="['France','Belgique','Suisse']" /></div></template>
                            <template x-if="block.key === 'form-checkbox'"><div><x-form.checkbox label="J'accepte" /></div></template>
                            <template x-if="block.key === 'form-switch'"><div><x-form.switch label="Actif" /></div></template>
                            <template x-if="block.key === 'form-textarea'"><div><x-form.textarea label="Message" placeholder="..." /></div></template>
                            <template x-if="block.key === 'form-radio'"><div><x-form.radio :options="[['label'=>'A','value'=>'a'],['label'=>'B','value'=>'b']]" name="r" /></div></template>
                            <template x-if="block.key === 'form-slider'"><div><x-form.slider /></div></template>
                            <template x-if="block.key === 'form-upload'"><div><x-form.upload label="Fichier" /></div></template>
                            <template x-if="block.key === 'form-texteditor'"><div><x-form.texteditor /></div></template>
                            <template x-if="block.key === 'form-autocomplete'"><div><x-form.autocomplete :options="['Paris','Lyon','Lille']" /></div></template>
                            <template x-if="block.key === 'form-combobox'"><div><x-form.combobox :options="['Vue','React','Alpine']" /></div></template>
                            <template x-if="block.key === 'form-mentions'"><div><x-form.mentions :options="['@john','@jane','@jack']" /></div></template>

                            <template x-if="block.key === 'data-pagination'"><div><x-data.pagination :total="200" :pageSize="10" :currentPage="3" /></div></template>
                            <template x-if="block.key === 'data-statistic'"><div><x-data.statistic title="CA" value="3490" suffix="€" /></div></template>
                            <template x-if="block.key === 'data-stepper'"><div>
                                <x-data.stepper :steps="[['label'=>'Étape 1'],['label'=>'Étape 2'],['label'=>'Étape 3']]" :current="2" />
                            </div></template>
                            <template x-if="block.key === 'data-timeline'"><div>
                                <x-data.timeline :items="[
                                    ['label'=>'12:00','content'=>'Création'],
                                    ['label'=>'14:00','content'=>'Mise à jour'],
                                    ['label'=>'16:00','content'=>'Publication']
                                ]" />
                            </div></template>
                            <template x-if="block.key === 'data-descriptions'"><div>
                                <x-data.descriptions :items="[['label'=>'Nom','content'=>'Doe'],['label'=>'Ville','content'=>'Paris']]" />
                            </div></template>

                            <template x-if="block.key === 'layout-card'"><div><x-layout.card>Contenu</x-layout.card></div></template>
                            <template x-if="block.key === 'layout-collapse'"><div><x-layout.collapse title="Détails">Contenu</x-layout.collapse></div></template>
                            <template x-if="block.key === 'layout-divider'"><div><x-layout.divider /></div></template>
                            <template x-if="block.key === 'layout-drawer'"><div><x-layout.drawer title="Menu"><div class="p-4">Contenu</div></x-layout.drawer></div></template>
                            <template x-if="block.key === 'layout-popover'"><div><x-layout.popover text="Plus d'infos">Texte du popover</x-layout.popover></div></template>
                            <template x-if="block.key === 'layout-tooltip'"><div><x-layout.tooltip text="Indice">Survolez-moi</x-layout.tooltip></div></template>

                            <template x-if="block.key === 'navigation-affix'"><div><x-navigation.affix>Affix</x-navigation.affix></div></template>
                            <template x-if="block.key === 'navigation-anchor'"><div><x-navigation.anchor href="#">Anchor</x-navigation.anchor></div></template>
                            <template x-if="block.key === 'navigation-breadcrumbs'"><div>
                                <x-navigation.breadcrumbs :items="[['label'=>'Accueil','href'=>'/'],['label'=>'Section','href'=>'#'],['label'=>'Page']]" />
                            </div></template>
                            <template x-if="block.key === 'navigation-sidebar'"><div>
                                <x-navigation.sidebar :items="[['label'=>'Item 1'],['label'=>'Item 2']]" />
                            </div></template>

                            <template x-if="block.key === 'feedback-badge'"><div>
                                <x-feedback.badge color="primary">Nouveau</x-feedback.badge>
                            </div></template>
                            <template x-if="block.key === 'feedback-empty'"><div>
                                <x-feedback.empty title="Aucun résultat" description="Essayez de modifier les filtres." />
                            </div></template>
                            <template x-if="block.key === 'feedback-progress'"><div>
                                <x-feedback.progress value="60" />
                            </div></template>
                            <template x-if="block.key === 'feedback-spinner'"><div>
                                <x-feedback.spinner />
                            </div></template>

                            <template x-if="block.key === 'media-avatar'"><div><x-media.avatar name="John Doe" /></div></template>
                            <template x-if="block.key === 'media-image'"><div><x-media.image src="https://picsum.photos/300/180" alt="Demo" /></div></template>

                            <template x-if="block.key === 'charts-charts'"><div><x-charts.charts /></div></template>

                            <template x-if="block.key === 'tag'"><div><x-tag>Tag</x-tag></div></template>
                        </div>
                        <div x-show="block.activeTab === 'code'">
<pre class="language-html"><code x-text="block.code"></code></pre>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <aside class="lg:col-span-1">
            <div class="bg-white border rounded-lg shadow-sm p-4 sticky top-6">
                <h3 class="font-semibold mb-3">Paramètres du composant</h3>
                <div class="space-y-4">
                    <template x-for="section in currentParams" :key="section.title">
                        <div>
                            <div class="text-sm font-semibold text-gray-700" x-text="section.title"></div>
                            <ul class="mt-2 space-y-1 text-sm text-gray-600">
                                <template x-for="param in section.items" :key="param.name">
                                    <li>
                                        <span class="font-medium" x-text="param.name"></span>
                                        <span class="text-gray-400">—</span>
                                        <span x-text="param.desc"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </template>
                </div>
            </div>
        </aside>
    </div>
</div>

@push('scripts')
<script>
function componentsPage() {
    return {
        activeKey: 'button',
        componentBlocks: [
            { key: 'button', title: 'Button', activeTab: 'preview', code: `<x-button>Primary</x-button>\n<x-button color="secondary">Secondary</x-button>\n<x-button color="success">Success</x-button>\n<x-button color="warning">Warning</x-button>\n<x-button color="danger">Danger</x-button>\n<x-button color="info">Info</x-button>` },
            { key: 'base-inputs', title: 'Base Inputs', activeTab: 'preview', code: `<x-input placeholder="Global input" />\n<x-input type="password" placeholder="Password" />` },
            { key: 'calendar', title: 'Calendar', activeTab: 'preview', code: `<x-calendar />` },
            { key: 'card', title: 'Card', activeTab: 'preview', code: `<x-card title="Titre de la carte">Contenu de la carte</x-card>` },
            { key: 'dropdown', title: 'Dropdown', activeTab: 'preview', code: `<x-dropdown>\n  <x-slot name="trigger"><x-button>Ouvrir</x-button></x-slot>\n  <a class="block px-4 py-2">Action 1</a>\n  <a class="block px-4 py-2">Action 2</a>\n</x-dropdown>` },
            { key: 'form-input', title: 'Form: Input', activeTab: 'preview', code: `<x-form.input label="Nom" placeholder="John Doe" />` },
            { key: 'form-select', title: 'Form: Select', activeTab: 'preview', code: `<x-form.select label="Pays" :options="['France','Belgique','Suisse']" />` },
            { key: 'form-checkbox', title: 'Form: Checkbox', activeTab: 'preview', code: `<x-form.checkbox label="J'accepte" />` },
            { key: 'form-switch', title: 'Form: Switch', activeTab: 'preview', code: `<x-form.switch label="Actif" />` },
            { key: 'form-textarea', title: 'Form: Textarea', activeTab: 'preview', code: `<x-form.textarea label="Message" placeholder="..." />` },
            { key: 'form-radio', title: 'Form: Radio', activeTab: 'preview', code: `<x-form.radio :options="[['label'=>'A','value'=>'a'],['label'=>'B','value'=>'b']]" name="r" />` },
            { key: 'form-slider', title: 'Form: Slider', activeTab: 'preview', code: `<x-form.slider />` },
            { key: 'form-upload', title: 'Form: Upload', activeTab: 'preview', code: `<x-form.upload label="Fichier" />` },
            { key: 'form-texteditor', title: 'Form: TextEditor', activeTab: 'preview', code: `<x-form.texteditor />` },
            { key: 'form-autocomplete', title: 'Form: Autocomplete', activeTab: 'preview', code: `<x-form.autocomplete :options="['Paris','Lyon','Lille']" />` },
            { key: 'form-combobox', title: 'Form: Combobox', activeTab: 'preview', code: `<x-form.combobox :options="['Vue','React','Alpine']" />` },
            { key: 'form-mentions', title: 'Form: Mentions', activeTab: 'preview', code: `<x-form.mentions :options="['@john','@jane','@jack']" />` },
            { key: 'data-pagination', title: 'Data: Pagination', activeTab: 'preview', code: `<x-data.pagination :total="200" :pageSize="10" :currentPage="3" />` },
            { key: 'data-statistic', title: 'Data: Statistic', activeTab: 'preview', code: `<x-data.statistic title="CA" value="3490" suffix="€" />` },
            { key: 'data-stepper', title: 'Data: Stepper', activeTab: 'preview', code: `<x-data.stepper :steps="[['label'=>'Étape 1'],['label'=>'Étape 2'],['label'=>'Étape 3']]" :current="2" />` },
            { key: 'data-timeline', title: 'Data: Timeline', activeTab: 'preview', code: `<x-data.timeline :items="[['label'=>'12:00','content'=>'Création'],['label'=>'14:00','content'=>'Mise à jour'],['label'=>'16:00','content'=>'Publication']]" />` },
            { key: 'data-descriptions', title: 'Data: Descriptions', activeTab: 'preview', code: `<x-data.descriptions :items="[['label'=>'Nom','content'=>'Doe'],['label'=>'Ville','content'=>'Paris']]" />` },
            { key: 'layout-card', title: 'Layout: Card', activeTab: 'preview', code: `<x-layout.card>Contenu</x-layout.card>` },
            { key: 'layout-collapse', title: 'Layout: Collapse', activeTab: 'preview', code: `<x-layout.collapse title="Détails">Contenu</x-layout.collapse>` },
            { key: 'layout-divider', title: 'Layout: Divider', activeTab: 'preview', code: `<x-layout.divider />` },
            { key: 'layout-drawer', title: 'Layout: Drawer', activeTab: 'preview', code: `<x-layout.drawer title="Menu"><div class='p-4'>Contenu</div></x-layout.drawer>` },
            { key: 'layout-popover', title: 'Layout: Popover', activeTab: 'preview', code: `<x-layout.popover text="Plus d'infos">Texte du popover</x-layout.popover>` },
            { key: 'layout-tooltip', title: 'Layout: Tooltip', activeTab: 'preview', code: `<x-layout.tooltip text="Indice">Survolez-moi</x-layout.tooltip>` },
            { key: 'navigation-affix', title: 'Navigation: Affix', activeTab: 'preview', code: `<x-navigation.affix>Affix</x-navigation.affix>` },
            { key: 'navigation-anchor', title: 'Navigation: Anchor', activeTab: 'preview', code: `<x-navigation.anchor href="#">Anchor</x-navigation.anchor>` },
            { key: 'navigation-breadcrumbs', title: 'Navigation: Breadcrumbs', activeTab: 'preview', code: `<x-navigation.breadcrumbs :items="[['label'=>'Accueil','href'=>'/'],['label'=>'Section','href'=>'#'],['label'=>'Page']]" />` },
            { key: 'navigation-sidebar', title: 'Navigation: Sidebar', activeTab: 'preview', code: `<x-navigation.sidebar :items="[['label'=>'Item 1'],['label'=>'Item 2']]" />` },
            { key: 'feedback-badge', title: 'Feedback: Badge', activeTab: 'preview', code: `<x-feedback.badge color="primary">Nouveau</x-feedback.badge>` },
            { key: 'feedback-empty', title: 'Feedback: Empty', activeTab: 'preview', code: `<x-feedback.empty title="Aucun résultat" description="Essayez de modifier les filtres." />` },
            { key: 'feedback-progress', title: 'Feedback: Progress', activeTab: 'preview', code: `<x-feedback.progress value="60" />` },
            { key: 'feedback-spinner', title: 'Feedback: Spinner', activeTab: 'preview', code: `<x-feedback.spinner />` },
            { key: 'media-avatar', title: 'Media: Avatar', activeTab: 'preview', code: `<x-media.avatar name="John Doe" />` },
            { key: 'media-image', title: 'Media: Image', activeTab: 'preview', code: `<x-media.image src="https://picsum.photos/300/180" alt="Demo" />` },
            { key: 'charts-charts', title: 'Charts', activeTab: 'preview', code: `<x-charts.charts />` },
            { key: 'tag', title: 'Tag', activeTab: 'preview', code: `<x-tag>Tag</x-tag>` },
        ],
        get currentParams() {
            // Minimal pour l’instant; pourrait être enrichi par composant
            return [];
        },
    };
}
</script>
@endpush
@endsection