@extends('layouts.app')

@section('title', 'Examples')

@section('content')
<div class="space-y-6" x-data="examplesPage()">
    <!-- Header -->
    <div class="bg-white border rounded-lg shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <div class="font-semibold">Header</div>
            <div class="flex items-center gap-2 text-sm">
                <button @click="headerTab = 'preview'" :class="headerTab === 'preview' ? 'text-primary' : 'text-gray-500'">Aperçu</button>
                <span class="text-gray-300">|</span>
                <button @click="headerTab = 'code'" :class="headerTab === 'code' ? 'text-primary' : 'text-gray-500'">Code</button>
            </div>
        </div>
        <div class="p-6">
            <div x-show="headerTab === 'preview'" class="flex items-center justify-between">
                <div class="text-xl font-bold">LarappeUI</div>
                <div class="flex items-center gap-2">
                    <x-button color="secondary">Login</x-button>
                    <x-button>Sign Up</x-button>
                </div>
            </div>
            <div x-show="headerTab === 'code'">
<pre class="language-html"><code>&lt;div class=&quot;flex items-center justify-between&quot;&gt;
  &lt;div class=&quot;text-xl font-bold&quot;&gt;LarappeUI&lt;/div&gt;
  &lt;div class=&quot;flex items-center gap-2&quot;&gt;
    &lt;x-button color=&quot;secondary&quot;&gt;Login&lt;/x-button&gt;
    &lt;x-button&gt;Sign Up&lt;/x-button&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Hero -->
    <div class="bg-white border rounded-lg shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <div class="font-semibold">Hero</div>
            <div class="flex items-center gap-2 text-sm">
                <button @click="heroTab = 'preview'" :class="heroTab === 'preview' ? 'text-primary' : 'text-gray-500'">Aperçu</button>
                <span class="text-gray-300">|</span>
                <button @click="heroTab = 'code'" :class="heroTab === 'code' ? 'text-primary' : 'text-gray-500'">Code</button>
            </div>
        </div>
        <div class="p-6 text-center">
            <div x-show="heroTab === 'preview'" class="space-y-4">
                <h2 class="text-3xl font-bold">Construisez des UI élégantes en quelques minutes</h2>
                <p class="text-gray-600">Une collection de composants modernes, themés et réutilisables pour Laravel 12.</p>
                <div class="flex items-center justify-center gap-3">
                    <x-button>Commencer</x-button>
                    <x-button color="secondary">Documentation</x-button>
                </div>
            </div>
            <div x-show="heroTab === 'code'">
<pre class="language-html"><code>&lt;h2 class=&quot;text-3xl font-bold&quot;&gt;Construisez des UI élégantes en quelques minutes&lt;/h2&gt;
&lt;p class=&quot;text-gray-600&quot;&gt;Une collection de composants modernes, themés et réutilisables pour Laravel 12.&lt;/p&gt;
&lt;div class=&quot;flex items-center justify-center gap-3&quot;&gt;
  &lt;x-button&gt;Commencer&lt;/x-button&gt;
  &lt;x-button color=&quot;secondary&quot;&gt;Documentation&lt;/x-button&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="bg-white border rounded-lg shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <div class="font-semibold">Call to action</div>
            <div class="flex items-center gap-2 text-sm">
                <button @click="ctaTab = 'preview'" :class="ctaTab === 'preview' ? 'text-primary' : 'text-gray-500'">Aperçu</button>
                <span class="text-gray-300">|</span>
                <button @click="ctaTab = 'code'" :class="ctaTab === 'code' ? 'text-primary' : 'text-gray-500'">Code</button>
            </div>
        </div>
        <div class="p-6">
            <div x-show="ctaTab === 'preview'" class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div>
                    <div class="text-xl font-semibold">Prêt à démarrer ?</div>
                    <div class="text-gray-600">Installez LarappeUI et gagnez du temps.</div>
                </div>
                <div class="flex gap-3">
                    <x-button>Installer</x-button>
                    <x-button color="secondary">En savoir plus</x-button>
                </div>
            </div>
            <div x-show="ctaTab === 'code'">
<pre class="language-html"><code>&lt;div class=&quot;flex flex-col md:flex-row items-center justify-between gap-4&quot;&gt;
  &lt;div&gt;
    &lt;div class=&quot;text-xl font-semibold&quot;&gt;Prêt à démarrer ?&lt;/div&gt;
    &lt;div class=&quot;text-gray-600&quot;&gt;Installez LarappeUI et gagnez du temps.&lt;/div&gt;
  &lt;/div&gt;
  &lt;div class=&quot;flex gap-3&quot;&gt;
    &lt;x-button&gt;Installer&lt;/x-button&gt;
    &lt;x-button color=&quot;secondary&quot;&gt;En savoir plus&lt;/x-button&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Contact Form (fonctionnel) -->
    <div class="bg-white border rounded-lg shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <div class="font-semibold">Formulaire de contact (AJAX)</div>
            <div class="flex items-center gap-2 text-sm">
                <button @click="contactTab = 'preview'" :class="contactTab === 'preview' ? 'text-primary' : 'text-gray-500'">Aperçu</button>
                <span class="text-gray-300">|</span>
                <button @click="contactTab = 'code'" :class="contactTab === 'code' ? 'text-primary' : 'text-gray-500'">Code</button>
            </div>
        </div>
        <div class="p-6" x-data="contactForm()">
            <div x-show="contactTab === 'preview'">
                <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <x-form.input label="Nom" x-model="form.name" placeholder="John Doe" />
                    </div>
                    <div>
                        <x-form.input type="email" label="Email" x-model="form.email" placeholder="john@doe.com" />
                    </div>
                    <div class="md:col-span-2">
                        <x-form.textarea label="Message" x-model="form.message" placeholder="Votre message..." />
                    </div>
                    <div class="md:col-span-2 flex items-center gap-3">
                        <x-button type="submit" x-bind:disabled="loading" x-text="loading ? 'Envoi...' : 'Envoyer'"></x-button>
                        <template x-if="success">
                            <span class="text-success">Message envoyé ✅</span>
                        </template>
                    </div>
                </form>
            </div>
            <div x-show="contactTab === 'code'">
<pre class="language-html"><code>&lt;form @submit.prevent=&quot;submit&quot; class=&quot;grid grid-cols-1 md:grid-cols-2 gap-4&quot;&gt;
  ...
&lt;/form&gt;

// JS (Alpine)
function contactForm() {
  return {
    form: { name: '', email: '', message: '' }, loading: false, success: false,
    async submit() {
      this.loading = true; this.success = false;
      const res = await fetch('{{ route('contact.store') }}', {
        method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
        body: JSON.stringify(this.form)
      });
      this.loading = false; this.success = res.ok;
    }
  }
}</code></pre>
            </div>
        </div>
    </div>

    <!-- Multi-step Form -->
    <div class="bg-white border rounded-lg shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <div class="font-semibold">Formulaire multi-étapes</div>
            <div class="flex items-center gap-2 text-sm">
                <button @click="msTab = 'preview'" :class="msTab === 'preview' ? 'text-primary' : 'text-gray-500'">Aperçu</button>
                <span class="text-gray-300">|</span>
                <button @click="msTab = 'code'" :class="msTab === 'code' ? 'text-primary' : 'text-gray-500'">Code</button>
            </div>
        </div>
        <div class="p-6" x-data="multiStepForm()">
            <div x-show="msTab === 'preview'">
                <x-data.stepper :steps="[['label' => 'Infos'], ['label' => 'Adresse'], ['label' => 'Confirmation']]" :current="step + 1"></x-data.stepper>
                <div class="mt-4" x-show="step === 0">
                    <x-form.input label="Nom" x-model="data.name" />
                    <x-form.input label="Email" type="email" x-model="data.email" class="mt-3" />
                </div>
                <div class="mt-4" x-show="step === 1">
                    <x-form.input label="Adresse" x-model="data.address" />
                    <x-form.input label="Ville" x-model="data.city" class="mt-3" />
                </div>
                <div class="mt-4" x-show="step === 2">
                    <div class="text-gray-700">Vérifiez vos informations puis validez.</div>
                </div>
                <div class="mt-4 flex gap-2">
                    <x-button color="secondary" @click="prev" x-bind:disabled="step === 0">Précédent</x-button>
                    <x-button @click="next" x-text="step === 2 ? 'Valider' : 'Suivant'"></x-button>
                </div>
            </div>
            <div x-show="msTab === 'code'">
<pre class="language-html"><code>&lt;x-data.stepper :steps=&quot;[['label' =&gt; 'Infos'], ['label' =&gt; 'Adresse'], ['label' =&gt; 'Confirmation']]&quot; :current=&quot;step + 1&quot; /&gt;
 // JS (Alpine)
 function multiStepForm(){ return { step: 0, data: { name:'', email:'', address:'', city:'' }, next(){ if(this.step&lt;2) this.step++; }, prev(){ if(this.step&gt;0) this.step--; } } }</code></pre>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white border rounded-lg shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b">
            <div class="font-semibold">Table avec recherche</div>
            <div class="flex items-center gap-2 text-sm">
                <button @click="tableTab = 'preview'" :class="tableTab === 'preview' ? 'text-primary' : 'text-gray-500'">Aperçu</button>
                <span class="text-gray-300">|</span>
                <button @click="tableTab = 'code'" :class="tableTab === 'code' ? 'text-primary' : 'text-gray-500'">Code</button>
            </div>
        </div>
        <div class="p-6" x-data="tableDemo()">
            <div x-show="tableTab === 'preview'">
                <div class="mb-3">
                    <x-form.input placeholder="Rechercher..." x-model="q" />
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-surface">
                                <th class="px-4 py-2 text-left text-sm font-semibold">Nom</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold">Email</th>
                                <th class="px-4 py-2 text-left text-sm font-semibold">Rôle</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <template x-for="row in filtered" :key="row.email">
                                <tr>
                                    <td class="px-4 py-2" x-text="row.name"></td>
                                    <td class="px-4 py-2" x-text="row.email"></td>
                                    <td class="px-4 py-2" x-text="row.role"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
            <div x-show="tableTab === 'code'">
<pre class="language-html"><code>&lt;table&gt;...&lt;/table&gt;
// JS (Alpine)
function tableDemo(){ return { q:'', rows:[{name:'Alice',email:'alice@ex.com',role:'Admin'},{name:'Bob',email:'bob@ex.com',role:'User'},{name:'Céline',email:'celine@ex.com',role:'Manager'}], get filtered(){ const q=this.q.toLowerCase(); return this.rows.filter(r =&gt; Object.values(r).some(v =&gt; String(v).toLowerCase().includes(q))); } } }</code></pre>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function examplesPage(){ return { headerTab:'preview', heroTab:'preview', ctaTab:'preview', contactTab:'preview', msTab:'preview', tableTab:'preview' } }
function contactForm(){ return { form:{ name:'', email:'', message:'' }, loading:false, success:false, async submit(){ this.loading=true; this.success=false; try{ const res = await fetch("{{ route('contact.store') }}", { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content }, body: JSON.stringify(this.form) }); this.success = res.ok; } finally { this.loading=false; } } } }
function multiStepForm(){ return { step:0, data:{ name:'', email:'', address:'', city:'' }, next(){ if(this.step<2) this.step++; else alert('Formulaire soumis!'); }, prev(){ if(this.step>0) this.step--; } } }
function tableDemo(){ return { q:'', rows:[ {name:'Alice',email:'alice@example.com',role:'Admin'}, {name:'Bob',email:'bob@example.com',role:'User'}, {name:'Céline',email:'celine@example.com',role:'Manager'}, {name:'David',email:'david@example.com',role:'User'} ], get filtered(){ const q=this.q.toLowerCase(); return this.rows.filter(r => Object.values(r).some(v => String(v).toLowerCase().includes(q))); } } }
</script>
@endpush
@endsection