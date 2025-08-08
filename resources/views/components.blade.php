@extends('layouts.app')

@section('title', 'Components')

@section('content')
<div x-data="componentsPage()" class="[&_h3]:text-sm [&_h3]:font-semibold [&_h3]:text-gray-600">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <template x-for="block in componentBlocks" :key="block.key">
                <div class="bg-white border rounded-xl shadow-sm">
                    <div class="flex items-center justify-between px-4 py-3 border-b">
                        <div>
                            <div class="text-sm uppercase tracking-wide text-gray-400" x-text="block.category"></div>
                            <div class="font-semibold text-lg" x-text="block.title"></div>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <button @click="block.activeTab = 'preview'" :class="block.activeTab === 'preview' ? 'text-primary' : 'text-gray-500'">Aperçu</button>
                            <span class="text-gray-300">|</span>
                            <button @click="block.activeTab = 'variants'" :class="block.activeTab === 'variants' ? 'text-primary' : 'text-gray-500'">Variantes</button>
                            <span class="text-gray-300">|</span>
                            <button @click="block.activeTab = 'code'" :class="block.activeTab === 'code' ? 'text-primary' : 'text-gray-500'">Code</button>
                        </div>
                    </div>
                    <div class="p-5">
                        <div x-show="block.activeTab === 'preview'" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <template x-if="block.key === 'button'"><div class="flex gap-3 flex-wrap items-center">
                                <x-button>Primary</x-button>
                                <x-button color="secondary">Secondary</x-button>
                                <x-button color="success">Success</x-button>
                                <x-button color="warning">Warning</x-button>
                                <x-button color="danger">Danger</x-button>
                                <x-button color="info">Info</x-button>
                            </div></template>
                            <template x-if="block.key === 'base-inputs'"><div class="space-y-4">
                                <x-input placeholder="Global input" />
                                <x-input type="password" placeholder="Password" />
                            </div></template>
                            <template x-if="block.key === 'calendar'"><div class="rounded-lg border p-3"><x-calendar /></div></template>
                            <template x-if="block.key === 'card'"><div class="space-y-3"><x-card title="Titre de la carte">Contenu de la carte</x-card></div></template>
                            <template x-if="block.key === 'dropdown'"><div><x-dropdown><x-slot name="trigger"><x-button>Ouvrir</x-button></x-slot><a class="block px-4 py-2 hover:bg-gray-50">Action 1</a><a class="block px-4 py-2 hover:bg-gray-50">Action 2</a></x-dropdown></div></template>
                            <template x-if="block.key.startsWith('form-')">
                                <div class="space-y-4">
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
                                </div>
                            </template>
                            <template x-if="block.key.startsWith('data-')">
                                <div class="space-y-4">
                                    <template x-if="block.key === 'data-pagination'"><div><x-data.pagination :total="200" :pageSize="10" :currentPage="3" /></div></template>
                                    <template x-if="block.key === 'data-statistic'"><div><x-data.statistic title="CA" value="3490" suffix="€" /></div></template>
                                    <template x-if="block.key === 'data-stepper'"><div><x-data.stepper :steps="[['label'=>'Étape 1'],['label'=>'Étape 2'],['label'=>'Étape 3']]" :current="2" /></div></template>
                                    <template x-if="block.key === 'data-timeline'"><div><x-data.timeline :items="[['label'=>'12:00','content'=>'Création'],['label'=>'14:00','content'=>'Mise à jour'],['label'=>'16:00','content'=>'Publication']]" /></div></template>
                                    <template x-if="block.key === 'data-descriptions'"><div><x-data.descriptions :items="[['label'=>'Nom','content'=>'Doe'],['label'=>'Ville','content'=>'Paris']]" /></div></template>
                                </div>
                            </template>
                            <template x-if="block.key.startsWith('layout-')">
                                <div class="space-y-4">
                                    <template x-if="block.key === 'layout-card'"><div><x-layout.card>Contenu</x-layout.card></div></template>
                                    <template x-if="block.key === 'layout-collapse'"><div><x-layout.collapse title="Détails">Contenu</x-layout.collapse></div></template>
                                    <template x-if="block.key === 'layout-divider'"><div><x-layout.divider /></div></template>
                                    <template x-if="block.key === 'layout-drawer'"><div><x-layout.drawer title="Menu"><div class="p-4">Contenu</div></x-layout.drawer></div></template>
                                    <template x-if="block.key === 'layout-popover'"><div><x-layout.popover text="Plus d'infos">Texte du popover</x-layout.popover></div></template>
                                    <template x-if="block.key === 'layout-tooltip'"><div><x-layout.tooltip text="Indice">Survolez-moi</x-layout.tooltip></div></template>
                                </div>
                            </template>
                            <template x-if="block.key.startsWith('navigation-')">
                                <div class="space-y-4">
                                    <template x-if="block.key === 'navigation-affix'"><div><x-navigation.affix>Affix</x-navigation.affix></div></template>
                                    <template x-if="block.key === 'navigation-anchor'"><div><x-navigation.anchor href="#">Anchor</x-navigation.anchor></div></template>
                                    <template x-if="block.key === 'navigation-breadcrumbs'"><div><x-navigation.breadcrumbs :items="[['label'=>'Accueil','href'=>'/'],['label'=>'Section','href'=>'#'],['label'=>'Page']]" /></div></template>
                                    <template x-if="block.key === 'navigation-sidebar'"><div><x-navigation.sidebar :items="[['label'=>'Item 1'],['label'=>'Item 2']]" /></div></template>
                                </div>
                            </template>
                            <template x-if="block.key.startsWith('feedback-')">
                                <div class="space-y-4">
                                    <template x-if="block.key === 'feedback-badge'"><div><x-feedback.badge color="primary">Nouveau</x-feedback.badge></div></template>
                                    <template x-if="block.key === 'feedback-empty'"><div><x-feedback.empty title="Aucun résultat" description="Essayez de modifier les filtres." /></div></template>
                                    <template x-if="block.key === 'feedback-progress'"><div><x-feedback.progress value="60" /></div></template>
                                    <template x-if="block.key === 'feedback-spinner'"><div><x-feedback.spinner /></div></template>
                                </div>
                            </template>
                            <template x-if="block.key.startsWith('media-')">
                                <div class="space-y-4">
                                    <template x-if="block.key === 'media-avatar'"><div><x-media.avatar name="John Doe" /></div></template>
                                    <template x-if="block.key === 'media-image'"><div><x-media.image src="https://picsum.photos/300/180" alt="Demo" /></div></template>
                                </div>
                            </template>
                            <template x-if="block.key === 'charts-charts'"><div><x-charts.charts /></div></template>
                            <template x-if="block.key === 'tag'"><div><x-tag>Tag</x-tag></div></template>
                            <template x-if="block.key === 'extra-section-header'"><div><x-extra.section-header title="Titre" subtitle="Description" /></div></template>
                            <template x-if="block.key === 'extra-tabs'"><div><x-extra.tabs :tabs="['Tab 1','Tab 2','Tab 3']">Contenu</x-extra.tabs></div></template>
                            <template x-if="block.key === 'extra-modal'"><div><x-extra.modal title="Demo"><div class='p-2'>Contenu modal</div></x-extra.modal></div></template>
                            <template x-if="block.key === 'extra-command-palette'"><div><x-extra.command-palette /></div></template>
                            <template x-if="block.key === 'extra-toast'"><div>
                                <x-extra.toast />
                                <x-button size="sm" @click="window.dispatchEvent(new CustomEvent('show-toast',{detail:{message:'Action effectuée'}}))">Show Toast</x-button>
                             </div></template>
                             <template x-if="block.key === 'extra-alert'"><div><x-extra.alert type="info" title="Information">Message</x-extra.alert></div></template>
                             <template x-if="block.key === 'extra-snackbar'"><div>
                                <x-extra.snackbar />
                                <x-button size="sm" @click="window.dispatchEvent(new CustomEvent('show-snackbar',{detail:{message:'Enregistré',timeout:2000}}))">Show</x-button>
                             </div></template>
                             <template x-if="block.key === 'extra-confirm-dialog'"><div>
                                <x-extra.confirm-dialog title="Confirmer">Êtes-vous sûr ?</x-extra.confirm-dialog>
                                <x-button size="sm" color="danger" @click="window.dispatchEvent(new CustomEvent('open-confirm',{detail:{onConfirm:()=>alert('OK')}}))">Supprimer</x-button>
                             </div></template>
                             <template x-if="block.key === 'extra-otp-input'"><div><x-extra.otp-input :length="6" /></div></template>
                             <template x-if="block.key === 'extra-rating'"><div><x-extra.rating :value="3" :max="5" /></div></template>
                             <template x-if="block.key === 'extra-progress-circular'"><div><x-extra.progress-circular :value="50" /></div></template>
                             <template x-if="block.key === 'extra-skeleton'"><div><x-extra.skeleton :lines="3" /></div></template>
                             <template x-if="block.key === 'extra-data-table'"><div><x-extra.data-table :columns="[['key'=>'name','label'=>'Nom'],['key'=>'email','label'=>'Email']]" :rows="[['name'=>'Alice','email'=>'alice@ex.com'],['name'=>'Bob','email'=>'bob@ex.com']]" /></div></template>
                             <template x-if="block.key === 'extra-date-range'"><div><x-extra.date-range /></div></template>
                             <template x-if="block.key === 'extra-time-picker'"><div><x-extra.time-picker /></div></template>
                             <template x-if="block.key === 'extra-dropzone'"><div><x-extra.dropzone /></div></template>
                             <template x-if="block.key === 'extra-tag-input'"><div><x-extra.tag-input /></div></template>
                             <template x-if="block.key === 'extra-phone-input'"><div><x-extra.phone-input /></div></template>
                             <template x-if="block.key === 'extra-slider-range'"><div><x-extra.slider-range :min="0" :max="100" :start="20" :end="80" /></div></template>
                             <template x-if="block.key === 'extra-avatar-group'"><div><x-extra.avatar-group /></div></template>
                             <template x-if="block.key === 'extra-gallery'"><div><x-extra.gallery /></div></template>
                             <template x-if="block.key === 'extra-json-viewer'"><div><x-extra.json-viewer :data="['a'=>1,'b'=>['c'=>2]]" /></div></template>
                             <template x-if="block.key === 'extra-tree-view'"><div><x-extra.tree-view /></div></template>
                             <template x-if="block.key === 'extra-kanban'"><div><x-extra.kanban /></div></template>
                             <template x-if="block.key === 'extra-segmented-tabs'"><div><x-extra.segmented-tabs :tabs="['A','B','C']" /></div></template>
                             <template x-if="block.key === 'extra-vertical-tabs'"><div><x-extra.vertical-tabs :tabs="['Profil','Sécurité','Notifications']">Contenu</x-extra.vertical-tabs></div></template>
                             <template x-if="block.key === 'extra-mega-menu'"><div><x-extra.mega-menu /></div></template>
                             <template x-if="block.key === 'extra-pagination-compact'"><div><x-extra.pagination-compact :page="1" :pages="10" /></div></template>
                             <template x-if="block.key === 'extra-markdown-editor'"><div><x-extra.markdown-editor /></div></template>
                             <template x-if="block.key === 'extra-table-of-contents'"><div><x-extra.table-of-contents /></div></template>
                             <template x-if="block.key === 'extra-masonry'"><div><x-extra.masonry /></div></template>
                             <template x-if="block.key === 'extra-split-pane'"><div><x-extra.split-pane /></div></template>
                             <template x-if="block.key === 'extra-breadcrumbs-overflow'"><div><x-extra.breadcrumbs-overflow /></div></template>
                        </div>

                        <div x-show="block.activeTab === 'variants'" class="space-y-3">
                            <h3>États</h3>
                            <div class="flex flex-wrap items-center gap-3">
                                <template x-if="block.key === 'button'">
                                    <div class="flex gap-3 flex-wrap items-center">
                                        <x-button disabled>Disabled</x-button>
                                        <x-button loading>Loading</x-button>
                                        <x-button outline>Outline</x-button>
                                        <x-button size="sm">Small</x-button>
                                        <x-button size="lg">Large</x-button>
                                    </div>
                                </template>
                                <template x-if="block.key === 'form-input'">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 w-full">
                                        <x-form.input label="Erreur" error="Message d'erreur" />
                                        <x-form.input label="Disabled" disabled />
                                    </div>
                                </template>
                                <template x-if="block.key === 'feedback-progress'">
                                    <div class="flex items-center gap-3">
                                        <x-feedback.progress value="10" />
                                        <x-feedback.progress value="50" />
                                        <x-feedback.progress value="90" />
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div x-show="block.activeTab === 'code'">
<pre class="language-html"><code x-text="block.code"></code></pre>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <aside class="lg:col-span-1">
            <div class="bg-white border rounded-xl shadow-sm p-4 sticky top-6">
                <h3 class="font-semibold mb-3">Paramètres du composant</h3>
                <template x-if="!currentParams.length"><p class="text-sm text-gray-500">Sélectionnez un bloc pour voir ses paramètres.</p></template>
                <div class="space-y-4" x-show="currentParams.length">
                    <template x-for="section in currentParams" :key="section.title">
                        <div>
                            <div class="text-sm font-semibold text-gray-700" x-text="section.title"></div>
                            <table class="mt-2 w-full text-sm">
                                <thead>
                                    <tr class="text-left text-gray-400">
                                        <th class="py-1 pr-2">Prop</th>
                                        <th class="py-1 pr-2">Type</th>
                                        <th class="py-1">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="param in section.items" :key="param.name">
                                        <tr class="border-t">
                                            <td class="py-1 pr-2 font-medium" x-text="param.name"></td>
                                            <td class="py-1 pr-2 text-gray-500" x-text="param.type || ''"></td>
                                            <td class="py-1 text-gray-600" x-text="param.desc"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
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
    const params = {
        button: [{ title: 'Props', items: [
            { name: 'color', type: 'string', desc: 'primary | secondary | success | warning | danger | info' },
            { name: 'size', type: 'string', desc: 'sm | md | lg' },
            { name: 'loading', type: 'bool', desc: 'Affiche un spinner' },
            { name: 'disabled', type: 'bool', desc: 'Désactive le bouton' },
            { name: 'outline', type: 'bool', desc: 'Style contour' },
            { name: 'block', type: 'bool', desc: 'Prend toute la largeur' },
            { name: 'type', type: 'string', desc: 'button | submit | reset' },
        ]}],
        'form-input': [{ title: 'Props', items: [
            { name: 'label', type: 'string' , desc: 'Label du champ' },
            { name: 'type', type: 'string' , desc: 'text|email|password|number|date|...' },
            { name: 'placeholder', type: 'string' , desc: 'Texte indicatif' },
            { name: 'error', type: 'string|bool' , desc: 'Message d’erreur' },
            { name: 'disabled', type: 'bool' , desc: 'Désactive le champ' },
            { name: 'readonly', type: 'bool' , desc: 'Lecture seule' },
        ]}],
        'form-select': [{ title: 'Props', items: [
            { name: 'label', type: 'string', desc: 'Label du select' },
            { name: 'options', type: 'array', desc: 'Liste d’options' },
            { name: 'multiple', type: 'bool', desc: 'Sélection multiple' },
            { name: 'searchable', type: 'bool', desc: 'Recherche' },
        ]}],
        'feedback-progress': [{ title: 'Props', items: [
            { name: 'value', type: 'number', desc: 'Valeur 0-100' },
        ]}],
        'data-pagination': [{ title: 'Props', items: [
            { name: 'total', type: 'number', desc: 'Total d’items' },
            { name: 'pageSize', type: 'number', desc: 'Taille page' },
            { name: 'currentPage', type: 'number', desc: 'Page courante' },
        ]}],
        'data-stepper': [{ title: 'Props', items: [
            { name: 'steps', type: 'array', desc: 'Liste des étapes' },
            { name: 'current', type: 'number', desc: 'Étape courante (1-based)' },
        ]}],
        'extra-section-header': [{ title: 'Props', items: [
            { name: 'title', type: 'string', desc: 'Titre de section' },
            { name: 'subtitle', type: 'string', desc: 'Description facultative' },
         ]}],
         'extra-tabs': [{ title: 'Props', items: [
            { name: 'tabs', type: 'array', desc: 'Liste des onglets' },
            { name: 'active', type: 'number', desc: 'Index actif' },
         ]}],
         'extra-modal': [{ title: 'Props', items: [
            { name: 'title', type: 'string', desc: 'Titre du modal' },
         ]}],
         'extra-command-palette': [{ title: 'Props', items: [
            { name: 'placeholder', type: 'string', desc: 'Texte indicatif' },
         ]}],
         'extra-toast': [{ title: 'Props', items: [
            { name: 'position', type: 'string', desc: 'top-right|top-left|bottom-right|bottom-left' },
         ]}],
         'extra-alert': [{ title: 'Props', items: [
            { name: 'type', type: 'string', desc: 'info|success|warning|danger' },
            { name: 'title', type: 'string', desc: 'Titre optionnel' },
            { name: 'dismissible', type: 'bool', desc: 'Affichage bouton fermer' },
         ]}],
         'extra-snackbar': [{ title: 'Props', items: [] }],
         'extra-confirm-dialog': [{ title: 'Props', items: [
            { name: 'title', type: 'string', desc: 'Titre du dialogue' },
            { name: 'confirmText', type: 'string', desc: 'Texte bouton confirmer' },
            { name: 'cancelText', type: 'string', desc: 'Texte bouton annuler' },
         ]}],
         'extra-otp-input': [{ title: 'Props', items: [
            { name: 'length', type: 'number', desc: 'Nombre de cases OTP' },
         ]}],
         'extra-rating': [{ title: 'Props', items: [
            { name: 'value', type: 'number', desc: 'Valeur initiale' },
            { name: 'max', type: 'number', desc: 'Nombre d’étoiles' },
            { name: 'readonly', type: 'bool', desc: 'Lecture seule' },
            { name: 'name', type: 'string', desc: 'Nom du champ' },
         ]}],
         'extra-progress-circular': [{ title: 'Props', items: [
            { name: 'value', type: 'number', desc: 'Progression 0-100' },
            { name: 'size', type: 'number', desc: 'Taille en px' },
            { name: 'stroke', type: 'number', desc: 'Épaisseur du trait' },
         ]}],
         'extra-skeleton': [{ title: 'Props', items: [
            { name: 'lines', type: 'number', desc: 'Nombre de lignes' },
         ]}],
         'extra-data-table': [{ title: 'Props', items: [
            { name: 'columns', type: 'array', desc: "[{key,label}]" },
            { name: 'rows', type: 'array', desc: 'Données' },
         ]}],
         'extra-date-range': [{ title: 'Props', items: [
            { name: 'startName', type: 'string', desc: 'Nom champ début' },
            { name: 'endName', type: 'string', desc: 'Nom champ fin' },
         ]}],
         'extra-time-picker': [{ title: 'Props', items: [
            { name: 'name', type: 'string', desc: 'Nom du champ' },
         ]}],
         'extra-dropzone': [{ title: 'Props', items: [
            { name: 'name', type: 'string', desc: 'Nom du champ (input file)' },
         ]}],
         'extra-tag-input': [{ title: 'Props', items: [
            { name: 'name', type: 'string', desc: 'Nom du champ' },
         ]}],
         'extra-phone-input': [{ title: 'Props', items: [
            { name: 'name', type: 'string', desc: 'Nom du champ' },
         ]}],
         'extra-slider-range': [{ title: 'Props', items: [
            { name: 'min', type: 'number', desc: 'Valeur min' },
            { name: 'max', type: 'number', desc: 'Valeur max' },
            { name: 'start', type: 'number', desc: 'Début' },
            { name: 'end', type: 'number', desc: 'Fin' },
            { name: 'name', type: 'string', desc: 'Nom du champ' },
         ]}],
         'extra-avatar-group': [{ title: 'Props', items: [
            { name: 'users', type: 'array', desc: "[{name}]" },
         ]}],
         'extra-gallery': [{ title: 'Props', items: [
            { name: 'images', type: 'array', desc: 'URLs des images' },
         ]}],
         'extra-json-viewer': [{ title: 'Props', items: [
            { name: 'data', type: 'array|object', desc: 'Données JSON' },
         ]}],
         'extra-tree-view': [{ title: 'Props', items: [
            { name: 'items', type: 'array', desc: "[{label,children?}]" },
         ]}],
         'extra-kanban': [{ title: 'Props', items: [
            { name: 'columns', type: 'array', desc: "[{title,items}]" },
         ]}],
         'extra-segmented-tabs': [{ title: 'Props', items: [
            { name: 'tabs', type: 'array', desc: 'Libellés' },
            { name: 'active', type: 'number', desc: 'Index actif' },
         ]}],
         'extra-vertical-tabs': [{ title: 'Props', items: [
            { name: 'tabs', type: 'array', desc: 'Libellés' },
            { name: 'active', type: 'number', desc: 'Index actif' },
         ]}],
         'extra-mega-menu': [{ title: 'Props', items: [] }],
         'extra-pagination-compact': [{ title: 'Props', items: [
            { name: 'page', type: 'number', desc: 'Page actuelle' },
            { name: 'pages', type: 'number', desc: 'Nombre de pages' },
         ]}],
         'extra-markdown-editor': [{ title: 'Props', items: [
            { name: 'name', type: 'string', desc: 'Nom du champ' },
         ]}],
         'extra-table-of-contents': [{ title: 'Props', items: [
            { name: 'items', type: 'array', desc: "[{id,label}]" },
         ]}],
         'extra-masonry': [{ title: 'Props', items: [
            { name: 'items', type: 'array', desc: 'Blocs à afficher' },
         ]}],
         'extra-split-pane': [{ title: 'Props', items: [] }],
         'extra-breadcrumbs-overflow': [{ title: 'Props', items: [] }],
    };

    return {
        activeKey: 'button',
        componentBlocks: [
            { key: 'button', category: 'Basic', title: 'Button', activeTab: 'preview', code: `<x-button>Primary</x-button>\n<x-button color="secondary">Secondary</x-button>\n<x-button color="success">Success</x-button>\n<x-button color="warning">Warning</x-button>\n<x-button color="danger">Danger</x-button>\n<x-button color="info">Info</x-button>` },
            { key: 'base-inputs', category: 'Basic', title: 'Base Inputs', activeTab: 'preview', code: `<x-input placeholder="Global input" />\n<x-input type="password" placeholder="Password" />` },
            { key: 'calendar', category: 'Basic', title: 'Calendar', activeTab: 'preview', code: `<x-calendar />` },
            { key: 'card', category: 'Basic', title: 'Card', activeTab: 'preview', code: `<x-card title="Titre de la carte">Contenu de la carte</x-card>` },
            { key: 'dropdown', category: 'Navigation', title: 'Dropdown', activeTab: 'preview', code: `<x-dropdown>\n  <x-slot name="trigger"><x-button>Ouvrir</x-button></x-slot>\n  <a class="block px-4 py-2">Action 1</a>\n  <a class="block px-4 py-2">Action 2</a>\n</x-dropdown>` },
            { key: 'form-input', category: 'Form', title: 'Form: Input', activeTab: 'preview', code: `<x-form.input label="Nom" placeholder="John Doe" />` },
            { key: 'form-select', category: 'Form', title: 'Form: Select', activeTab: 'preview', code: `<x-form.select label="Pays" :options="['France','Belgique','Suisse']" />` },
            { key: 'form-checkbox', category: 'Form', title: 'Form: Checkbox', activeTab: 'preview', code: `<x-form.checkbox label="J'accepte" />` },
            { key: 'form-switch', category: 'Form', title: 'Form: Switch', activeTab: 'preview', code: `<x-form.switch label="Actif" />` },
            { key: 'form-textarea', category: 'Form', title: 'Form: Textarea', activeTab: 'preview', code: `<x-form.textarea label="Message" placeholder="..." />` },
            { key: 'form-radio', category: 'Form', title: 'Form: Radio', activeTab: 'preview', code: `<x-form.radio :options="[['label'=>'A','value'=>'a'],['label'=>'B','value'=>'b']]" name="r" />` },
            { key: 'form-slider', category: 'Form', title: 'Form: Slider', activeTab: 'preview', code: `<x-form.slider />` },
            { key: 'form-upload', category: 'Form', title: 'Form: Upload', activeTab: 'preview', code: `<x-form.upload label="Fichier" />` },
            { key: 'form-texteditor', category: 'Form', title: 'Form: TextEditor', activeTab: 'preview', code: `<x-form.texteditor />` },
            { key: 'form-autocomplete', category: 'Form', title: 'Form: Autocomplete', activeTab: 'preview', code: `<x-form.autocomplete :options="['Paris','Lyon','Lille']" />` },
            { key: 'form-combobox', category: 'Form', title: 'Form: Combobox', activeTab: 'preview', code: `<x-form.combobox :options="['Vue','React','Alpine']" />` },
            { key: 'form-mentions', category: 'Form', title: 'Form: Mentions', activeTab: 'preview', code: `<x-form.mentions :options="['@john','@jane','@jack']" />` },
            { key: 'data-pagination', category: 'Data', title: 'Data: Pagination', activeTab: 'preview', code: `<x-data.pagination :total="200" :pageSize="10" :currentPage="3" />` },
            { key: 'data-statistic', category: 'Data', title: 'Data: Statistic', activeTab: 'preview', code: `<x-data.statistic title="CA" value="3490" suffix="€" />` },
            { key: 'data-stepper', category: 'Data', title: 'Data: Stepper', activeTab: 'preview', code: `<x-data.stepper :steps="[['label'=>'Étape 1'],['label'=>'Étape 2'],['label'=>'Étape 3']]" :current="2" />` },
            { key: 'data-timeline', category: 'Data', title: 'Data: Timeline', activeTab: 'preview', code: `<x-data.timeline :items="[['label'=>'12:00','content'=>'Création'],['label'=>'14:00','content'=>'Mise à jour'],['label'=>'16:00','content'=>'Publication']]" />` },
            { key: 'data-descriptions', category: 'Data', title: 'Data: Descriptions', activeTab: 'preview', code: `<x-data.descriptions :items="[['label'=>'Nom','content'=>'Doe'],['label'=>'Ville','content'=>'Paris']]" />` },
            { key: 'layout-card', category: 'Layout', title: 'Layout: Card', activeTab: 'preview', code: `<x-layout.card>Contenu</x-layout.card>` },
            { key: 'layout-collapse', category: 'Layout', title: 'Layout: Collapse', activeTab: 'preview', code: `<x-layout.collapse title="Détails">Contenu</x-layout.collapse>` },
            { key: 'layout-divider', category: 'Layout', title: 'Layout: Divider', activeTab: 'preview', code: `<x-layout.divider />` },
            { key: 'layout-drawer', category: 'Layout', title: 'Layout: Drawer', activeTab: 'preview', code: `<x-layout.drawer title="Menu"><div class='p-4'>Contenu</div></x-layout.drawer>` },
            { key: 'layout-popover', category: 'Layout', title: 'Layout: Popover', activeTab: 'preview', code: `<x-layout.popover text="Plus d'infos">Texte du popover</x-layout.popover>` },
            { key: 'layout-tooltip', category: 'Layout', title: 'Layout: Tooltip', activeTab: 'preview', code: `<x-layout.tooltip text="Indice">Survolez-moi</x-layout.tooltip>` },
            { key: 'navigation-affix', category: 'Navigation', title: 'Navigation: Affix', activeTab: 'preview', code: `<x-navigation.affix>Affix</x-navigation.affix>` },
            { key: 'navigation-anchor', category: 'Navigation', title: 'Navigation: Anchor', activeTab: 'preview', code: `<x-navigation.anchor href="#">Anchor</x-navigation.anchor>` },
            { key: 'navigation-breadcrumbs', category: 'Navigation', title: 'Navigation: Breadcrumbs', activeTab: 'preview', code: `<x-navigation.breadcrumbs :items="[['label'=>'Accueil','href'=>'/'],['label'=>'Section','href'=>'#'],['label'=>'Page']]" />` },
            { key: 'navigation-sidebar', category: 'Navigation', title: 'Navigation: Sidebar', activeTab: 'preview', code: `<x-navigation.sidebar :items="[['label'=>'Item 1'],['label'=>'Item 2']]" />` },
            { key: 'feedback-badge', category: 'Feedback', title: 'Feedback: Badge', activeTab: 'preview', code: `<x-feedback.badge color="primary">Nouveau</x-feedback.badge>` },
            { key: 'feedback-empty', category: 'Feedback', title: 'Feedback: Empty', activeTab: 'preview', code: `<x-feedback.empty title="Aucun résultat" description="Essayez de modifier les filtres." />` },
            { key: 'feedback-progress', category: 'Feedback', title: 'Feedback: Progress', activeTab: 'preview', code: `<x-feedback.progress value="60" />` },
            { key: 'feedback-spinner', category: 'Feedback', title: 'Feedback: Spinner', activeTab: 'preview', code: `<x-feedback.spinner />` },
            { key: 'media-avatar', category: 'Media', title: 'Media: Avatar', activeTab: 'preview', code: `<x-media.avatar name="John Doe" />` },
            { key: 'media-image', category: 'Media', title: 'Media: Image', activeTab: 'preview', code: `<x-media.image src="https://picsum.photos/300/180" alt="Demo" />` },
            { key: 'charts-charts', category: 'Charts', title: 'Charts', activeTab: 'preview', code: `<x-charts.charts />` },
            { key: 'tag', category: 'Basic', title: 'Tag', activeTab: 'preview', code: `<x-tag>Tag</x-tag>` },
            { key: 'extra-section-header', category: 'Layout', title: 'Section Header', activeTab: 'preview', code: `<x-extra.section-header title="Titre" subtitle="Description" />` },
            { key: 'extra-tabs', category: 'Navigation', title: 'Tabs', activeTab: 'preview', code: `<x-extra.tabs :tabs="['Tab 1','Tab 2','Tab 3']">Contenu</x-extra.tabs>` },
            { key: 'extra-modal', category: 'Layout', title: 'Modal', activeTab: 'preview', code: `<x-extra.modal title="Demo"><div class='p-2'>Contenu modal</div></x-extra.modal>` },
            { key: 'extra-command-palette', category: 'Navigation', title: 'Command Palette', activeTab: 'preview', code: `<x-extra.command-palette />` },
            { key: 'extra-toast', category: 'Feedback', title: 'Toast', activeTab: 'preview', code: `<x-extra.toast />` },
            { key: 'extra-alert', category: 'Feedback', title: 'Alert', activeTab: 'preview', code: `<x-extra.alert type="info" title="Information">Message</x-extra.alert>` },
            { key: 'extra-snackbar', category: 'Feedback', title: 'Snackbar', activeTab: 'preview', code: `<x-extra.snackbar />` },
            { key: 'extra-confirm-dialog', category: 'Feedback', title: 'Confirm Dialog', activeTab: 'preview', code: `<x-extra.confirm-dialog title="Confirmer">Êtes-vous sûr ?</x-extra.confirm-dialog>` },
            { key: 'extra-otp-input', category: 'Form', title: 'OTP Input', activeTab: 'preview', code: `<x-extra.otp-input :length="6" />` },
            { key: 'extra-rating', category: 'Form', title: 'Rating', activeTab: 'preview', code: `<x-extra.rating :value="3" :max="5" />` },
            { key: 'extra-progress-circular', category: 'Feedback', title: 'Progress Circular', activeTab: 'preview', code: `<x-extra.progress-circular :value="50" />` },
            { key: 'extra-skeleton', category: 'Feedback', title: 'Skeleton', activeTab: 'preview', code: `<x-extra.skeleton :lines="3" />` },
            { key: 'extra-data-table', category: 'Data', title: 'Data Table', activeTab: 'preview', code: `<x-extra.data-table :columns="[['key'=>'name','label'=>'Nom'],['key'=>'email','label'=>'Email']]" :rows="[['name'=>'Alice','email'=>'alice@ex.com'],['name'=>'Bob','email'=>'bob@ex.com']]" />` },
            { key: 'extra-date-range', category: 'Form', title: 'Date Range', activeTab: 'preview', code: `<x-extra.date-range />` },
            { key: 'extra-time-picker', category: 'Form', title: 'Time Picker', activeTab: 'preview', code: `<x-extra.time-picker />` },
            { key: 'extra-dropzone', category: 'Form', title: 'Dropzone', activeTab: 'preview', code: `<x-extra.dropzone />` },
            { key: 'extra-tag-input', category: 'Form', title: 'Tag Input', activeTab: 'preview', code: `<x-extra.tag-input />` },
            { key: 'extra-phone-input', category: 'Form', title: 'Phone Input', activeTab: 'preview', code: `<x-extra.phone-input />` },
            { key: 'extra-slider-range', category: 'Form', title: 'Slider Range', activeTab: 'preview', code: `<x-extra.slider-range :min="0" :max="100" :start="20" :end="80" />` },
            { key: 'extra-avatar-group', category: 'Media', title: 'Avatar Group', activeTab: 'preview', code: `<x-extra.avatar-group />` },
            { key: 'extra-gallery', category: 'Media', title: 'Gallery', activeTab: 'preview', code: `<x-extra.gallery />` },
            { key: 'extra-json-viewer', category: 'Data', title: 'JSON Viewer', activeTab: 'preview', code: `<x-extra.json-viewer :data="['a'=>1,'b'=>['c'=>2]]" />` },
            { key: 'extra-tree-view', category: 'Navigation', title: 'Tree View', activeTab: 'preview', code: `<x-extra.tree-view />` },
            { key: 'extra-kanban', category: 'Data', title: 'Kanban', activeTab: 'preview', code: `<x-extra.kanban />` },
            { key: 'extra-segmented-tabs', category: 'Navigation', title: 'Segmented Tabs', activeTab: 'preview', code: `<x-extra.segmented-tabs :tabs="['A','B','C']" />` },
            { key: 'extra-vertical-tabs', category: 'Navigation', title: 'Vertical Tabs', activeTab: 'preview', code: `<x-extra.vertical-tabs :tabs="['Profil','Sécurité','Notifications']">Contenu</x-extra.vertical-tabs>` },
            { key: 'extra-mega-menu', category: 'Navigation', title: 'Mega Menu', activeTab: 'preview', code: `<x-extra.mega-menu />` },
            { key: 'extra-pagination-compact', category: 'Data', title: 'Pagination Compact', activeTab: 'preview', code: `<x-extra.pagination-compact :page="1" :pages="10" />` },
            { key: 'extra-markdown-editor', category: 'Form', title: 'Markdown Editor', activeTab: 'preview', code: `<x-extra.markdown-editor />` },
            { key: 'extra-table-of-contents', category: 'Navigation', title: 'Table of Contents', activeTab: 'preview', code: `<x-extra.table-of-contents />` },
            { key: 'extra-masonry', category: 'Layout', title: 'Masonry', activeTab: 'preview', code: `<x-extra.masonry />` },
            { key: 'extra-split-pane', category: 'Layout', title: 'Split Pane', activeTab: 'preview', code: `<x-extra.split-pane />` },
            { key: 'extra-breadcrumbs-overflow', category: 'Navigation', title: 'Breadcrumbs Overflow', activeTab: 'preview', code: `<x-extra.breadcrumbs-overflow />` },
        ],
        get currentParams() {
            const active = this.componentBlocks.find(b => b.activeTab && b.activeTab !== undefined);
            const key = (active && active.key) || this.activeKey;
            return params[key] || [];
        },
    };
}
</script>
@endpush
@endsection