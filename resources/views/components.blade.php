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
                            <template x-if="block.key === 'button'">
                                <div class="flex gap-3 flex-wrap">
                                    <x-button>Primary</x-button>
                                    <x-button color="secondary">Secondary</x-button>
                                    <x-button color="success">Success</x-button>
                                    <x-button color="warning">Warning</x-button>
                                    <x-button color="danger">Danger</x-button>
                                    <x-button color="info">Info</x-button>
                                </div>
                            </template>

                            <template x-if="block.key === 'inputs'">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <x-form.input label="Nom" placeholder="John Doe" />
                                    <x-form.input type="email" label="Email" placeholder="john@doe.com" />
                                    <x-form.select label="Pays" :options="['France','Belgique','Suisse']" />
                                    <x-form.switch label="Actif" />
                                    <x-form.checkbox label="J'accepte" />
                                    <x-form.textarea label="Message" placeholder="Votre message..." />
                                </div>
                            </template>

                            <template x-if="block.key === 'feedback'">
                                <div class="flex items-center gap-3 flex-wrap">
                                    <x-feedback.badge color="primary">Nouveau</x-feedback.badge>
                                    <x-feedback.badge color="success">Succès</x-feedback.badge>
                                    <x-feedback.badge color="warning">Attention</x-feedback.badge>
                                    <x-feedback.badge color="danger">Erreur</x-feedback.badge>
                                    <x-feedback.progress value="40" />
                                    <x-feedback.spinner />
                                </div>
                            </template>

                            <template x-if="block.key === 'data'">
                                <div class="space-y-4">
                                    <x-data.statistic title="Ventes" value="1245" suffix="(+12%)" />
<x-data.timeline :items="[
                                        ['label' => '2025-01-01', 'content' => 'Lancement du projet'],
                                        ['label' => '2025-02-15', 'content' => '1k utilisateurs'],
                                        ['label' => '2025-03-10', 'content' => 'v1.0.0']
                                    ]" />
                                </div>
                            </template>
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
            {
                key: 'button',
                title: 'Button',
                activeTab: 'preview',
                code: `<x-button>Primary</x-button>
<x-button color="secondary">Secondary</x-button>
<x-button color="success">Success</x-button>
<x-button color="warning">Warning</x-button>
<x-button color="danger">Danger</x-button>
<x-button color="info">Info</x-button>`
            },
            {
                key: 'inputs',
                title: 'Form Inputs',
                activeTab: 'preview',
                code: `<x-form.input label="Nom" placeholder="John Doe" />
<x-form.input type="email" label="Email" placeholder="john@doe.com" />
<x-form.select label="Pays" :options="['France','Belgique','Suisse']" />
<x-form.switch label="Actif" />
<x-form.checkbox label="J'accepte" />
<x-form.textarea label="Message" placeholder="Votre message..." />`
            },
            {
                key: 'feedback',
                title: 'Feedback',
                activeTab: 'preview',
                code: `<x-feedback.badge color="primary">Nouveau</x-feedback.badge>
<x-feedback.badge color="success">Succès</x-feedback.badge>
<x-feedback.badge color="warning">Attention</x-feedback.badge>
<x-feedback.badge color="danger">Erreur</x-feedback.badge>
<x-feedback.progress value="40" />
<x-feedback.spinner />`
            },
            {
                key: 'data',
                title: 'Data components',
                activeTab: 'preview',
                code: `<x-data.statistic label="Ventes" value="1 245" trend="+12%" />
<x-data.timeline :items="[['2025-01-01','Lancement du projet'],['2025-02-15','1k utilisateurs'],['2025-03-10','v1.0.0']]" />`
            },
        ],
        get currentParams() {
            const map = {
                button: [
                    { title: 'Props', items: [
                        { name: 'color', desc: 'primary | secondary | success | warning | danger | info' },
                        { name: 'size', desc: 'sm | md | lg' },
                        { name: 'loading', desc: 'bool' },
                        { name: 'disabled', desc: 'bool' },
                        { name: 'outline', desc: 'bool' },
                        { name: 'block', desc: 'bool' },
                        { name: 'type', desc: 'button | submit | reset' },
                    ]}
                ],
                inputs: [
                    { title: 'Props communs', items: [
                        { name: 'label', desc: 'string' },
                        { name: 'placeholder', desc: 'string' },
                        { name: 'error', desc: 'string|bool' },
                        { name: 'disabled', desc: 'bool' },
                        { name: 'readonly', desc: 'bool' },
                    ]},
                    { title: 'Input', items: [
                        { name: 'type', desc: 'text|email|password|number|date|...' },
                    ]},
                    { title: 'Select', items: [
                        { name: 'options', desc: 'array|string[]' },
                        { name: 'multiple', desc: 'bool' },
                        { name: 'searchable', desc: 'bool' },
                    ]},
                ],
                feedback: [
                    { title: 'Badge', items: [
                        { name: 'color', desc: 'primary|success|warning|danger' }
                    ]},
                    { title: 'Progress', items: [
                        { name: 'value', desc: '0-100' }
                    ]}
                ],
                data: [
                    { title: 'Statistic', items: [
                        { name: 'label', desc: 'string' },
                        { name: 'value', desc: 'string|number' },
                        { name: 'trend', desc: 'string' },
                    ]},
                    { title: 'Timeline', items: [
                        { name: 'items', desc: 'array[[date,label]]' },
                    ]},
                ],
            };
            return map[this.activeKey] || [];
        },
    };
}
</script>
@endpush
@endsection