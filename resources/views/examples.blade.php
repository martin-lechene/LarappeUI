@extends('layouts.app')

@section('title', 'Exemples')

@section('content')
<div class="space-y-8" x-data="examplesPage()">
    <header class="rounded-xl border border-[var(--color-border)] bg-[var(--color-surface)] p-6 shadow-sm">
        <h1 class="text-2xl font-semibold tracking-tight text-[var(--color-text)]">Exemples de mises en page</h1>
        <p class="mt-2 max-w-3xl text-sm text-[var(--color-textSecondary)]">Fragments réutilisables (barre d’en-tête, hero, CTA, formulaires) avec onglets Aperçu et Code. Le formulaire de contact envoie une requête AJAX avec validation Laravel&nbsp;; les erreurs s’affichent sous le bouton d’envoi.</p>
    </header>

    <!-- Header -->
    <div class="rounded-xl border border-[var(--color-border)] bg-[var(--color-surface)] shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b border-[var(--color-border)]">
            <div class="font-semibold text-[var(--color-text)]">Barre d’en-tête</div>
            <div class="flex items-center gap-2 text-sm" role="tablist" aria-label="Barre d’en-tête">
                <button type="button" role="tab" :aria-selected="headerTab === 'preview'" @click="headerTab = 'preview'" :class="headerTab === 'preview' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Aperçu</button>
                <span class="text-[var(--color-border)]" aria-hidden="true">|</span>
                <button type="button" role="tab" :aria-selected="headerTab === 'code'" @click="headerTab = 'code'" :class="headerTab === 'code' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Code</button>
            </div>
        </div>
        <div class="p-6">
            <div x-show="headerTab === 'preview'" class="flex items-center justify-between" x-cloak>
                <div class="text-xl font-bold text-[var(--color-text)]">LarappeUI</div>
                <div class="flex items-center gap-2">
                    <x-button color="secondary">Login</x-button>
                    <x-button>Sign Up</x-button>
                </div>
            </div>
            <div x-show="headerTab === 'code'" x-cloak>
<pre class="language-html rounded-lg border border-[var(--color-border)] bg-[var(--color-background)] p-4 text-sm overflow-x-auto"><code>&lt;div class=&quot;flex items-center justify-between&quot;&gt;
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
    <div class="rounded-xl border border-[var(--color-border)] bg-[var(--color-surface)] shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b border-[var(--color-border)]">
            <div class="font-semibold text-[var(--color-text)]">Hero</div>
            <div class="flex items-center gap-2 text-sm" role="tablist" aria-label="Hero">
                <button type="button" role="tab" :aria-selected="heroTab === 'preview'" @click="heroTab = 'preview'" :class="heroTab === 'preview' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Aperçu</button>
                <span class="text-[var(--color-border)]" aria-hidden="true">|</span>
                <button type="button" role="tab" :aria-selected="heroTab === 'code'" @click="heroTab = 'code'" :class="heroTab === 'code' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Code</button>
            </div>
        </div>
        <div class="p-6 text-center">
            <div x-show="heroTab === 'preview'" class="space-y-4" x-cloak>
                <h2 class="text-3xl font-bold text-[var(--color-text)]">Construisez des UI élégantes en quelques minutes</h2>
                <p class="text-[var(--color-textSecondary)]">Une collection de composants modernes, themés et réutilisables pour Laravel 12.</p>
                <div class="flex items-center justify-center gap-3">
                    <x-button>Commencer</x-button>
                    <x-button color="secondary">Documentation</x-button>
                </div>
            </div>
            <div x-show="heroTab === 'code'" x-cloak>
<pre class="language-html rounded-lg border border-[var(--color-border)] bg-[var(--color-background)] p-4 text-sm overflow-x-auto"><code>&lt;h2 class=&quot;text-3xl font-bold&quot;&gt;Construisez des UI élégantes en quelques minutes&lt;/h2&gt;
&lt;p class=&quot;text-[var(--color-textSecondary)]&quot;&gt;Une collection de composants modernes, themés et réutilisables pour Laravel 12.&lt;/p&gt;
&lt;div class=&quot;flex items-center justify-center gap-3&quot;&gt;
  &lt;x-button&gt;Commencer&lt;/x-button&gt;
  &lt;x-button color=&quot;secondary&quot;&gt;Documentation&lt;/x-button&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="rounded-xl border border-[var(--color-border)] bg-[var(--color-surface)] shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b border-[var(--color-border)]">
            <div class="font-semibold text-[var(--color-text)]">Call to action</div>
            <div class="flex items-center gap-2 text-sm" role="tablist" aria-label="Call to action">
                <button type="button" role="tab" :aria-selected="ctaTab === 'preview'" @click="ctaTab = 'preview'" :class="ctaTab === 'preview' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Aperçu</button>
                <span class="text-[var(--color-border)]" aria-hidden="true">|</span>
                <button type="button" role="tab" :aria-selected="ctaTab === 'code'" @click="ctaTab = 'code'" :class="ctaTab === 'code' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Code</button>
            </div>
        </div>
        <div class="p-6">
            <div x-show="ctaTab === 'preview'" class="flex flex-col md:flex-row items-center justify-between gap-4" x-cloak>
                <div>
                    <div class="text-xl font-semibold text-[var(--color-text)]">Prêt à démarrer ?</div>
                    <div class="text-[var(--color-textSecondary)]">Installez LarappeUI et gagnez du temps.</div>
                </div>
                <div class="flex gap-3">
                    <x-button>Installer</x-button>
                    <x-button color="secondary">En savoir plus</x-button>
                </div>
            </div>
            <div x-show="ctaTab === 'code'" x-cloak>
<pre class="language-html rounded-lg border border-[var(--color-border)] bg-[var(--color-background)] p-4 text-sm overflow-x-auto"><code>&lt;div class=&quot;flex flex-col md:flex-row items-center justify-between gap-4&quot;&gt;
  &lt;div&gt;
    &lt;div class=&quot;text-xl font-semibold&quot;&gt;Prêt à démarrer ?&lt;/div&gt;
    &lt;div class=&quot;text-[var(--color-textSecondary)]&quot;&gt;Installez LarappeUI et gagnez du temps.&lt;/div&gt;
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
    <div class="rounded-xl border border-[var(--color-border)] bg-[var(--color-surface)] shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b border-[var(--color-border)]">
            <div class="font-semibold text-[var(--color-text)]">Formulaire de contact (AJAX)</div>
            <div class="flex items-center gap-2 text-sm" role="tablist" aria-label="Formulaire de contact">
                <button type="button" role="tab" :aria-selected="contactTab === 'preview'" @click="contactTab = 'preview'" :class="contactTab === 'preview' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Aperçu</button>
                <span class="text-[var(--color-border)]" aria-hidden="true">|</span>
                <button type="button" role="tab" :aria-selected="contactTab === 'code'" @click="contactTab = 'code'" :class="contactTab === 'code' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Code</button>
            </div>
        </div>
        <div class="p-6" x-data="contactForm()">
            <div x-show="contactTab === 'preview'" x-cloak>
                <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-4" novalidate>
                    <div>
                        <x-form.input label="Nom" x-model="form.name" placeholder="John Doe" />
                    </div>
                    <div>
                        <x-form.input type="email" label="Email" x-model="form.email" placeholder="john@doe.com" />
                    </div>
                    <div class="md:col-span-2">
                        <x-form.textarea label="Message" x-model="form.message" placeholder="Votre message..." />
                    </div>
                    <div class="md:col-span-2 flex flex-wrap items-center gap-3">
                        <x-button type="submit" x-bind:disabled="loading" x-text="loading ? 'Envoi...' : 'Envoyer'"></x-button>
                        <template x-if="success">
                            <span class="text-success" role="status">Message envoyé.</span>
                        </template>
                        <template x-if="error">
                            <span class="text-danger text-sm max-w-prose" role="alert" x-text="error"></span>
                        </template>
                    </div>
                </form>
            </div>
            <div x-show="contactTab === 'code'" x-cloak>
<pre class="language-html rounded-lg border border-[var(--color-border)] bg-[var(--color-background)] p-4 text-sm overflow-x-auto"><code>&lt;form @submit.prevent=&quot;submit&quot; class=&quot;grid grid-cols-1 md:grid-cols-2 gap-4&quot;&gt;
  ...
&lt;/form&gt;

// Alpine — gère success, error (422 Laravel), et erreurs réseau
function contactForm() {
  return {
    form: { name: '', email: '', message: '' },
    loading: false,
    success: false,
    error: '',
    async submit() { /* fetch + JSON errors */ }
  };
}</code></pre>
            </div>
        </div>
    </div>

    <!-- Multi-step Form -->
    <div class="rounded-xl border border-[var(--color-border)] bg-[var(--color-surface)] shadow-sm" x-data="multiStepForm()">
        <div class="flex items-center justify-between px-4 py-3 border-b border-[var(--color-border)]">
            <div class="font-semibold text-[var(--color-text)]">Formulaire multi-étapes</div>
            <div class="flex items-center gap-2 text-sm" role="tablist" aria-label="Formulaire multi-étapes">
                <button type="button" role="tab" :aria-selected="msTab === 'preview'" @click="msTab = 'preview'" :class="msTab === 'preview' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Aperçu</button>
                <span class="text-[var(--color-border)]" aria-hidden="true">|</span>
                <button type="button" role="tab" :aria-selected="msTab === 'code'" @click="msTab = 'code'" :class="msTab === 'code' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Code</button>
            </div>
        </div>
        <div class="p-6">
            <div x-show="msTab === 'preview'" x-cloak>
                <div class="flex flex-wrap items-center gap-4" aria-label="Progression du formulaire">
                    <template x-for="(s, i) in ['Infos','Adresse','Confirmation']" :key="i">
                        <div class="flex items-center gap-2">
                            <div class="flex items-center justify-center rounded-full border-2 w-8 h-8 text-sm font-bold"
                                 :class="i <= step ? 'border-primary bg-primary text-white' : 'border-[var(--color-border)] bg-[var(--color-surface)] text-[var(--color-textSecondary)]'">
                                <span x-text="i + 1"></span>
                            </div>
                            <span class="text-sm" :class="i <= step ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'" x-text="s"></span>
                            <template x-if="i < 2">
                                <div class="hidden sm:block w-12 h-0.5 bg-[var(--color-border)] mx-2" aria-hidden="true"></div>
                            </template>
                        </div>
                    </template>
                </div>

                <div class="mt-4" x-show="step === 0">
                    <x-form.input label="Nom" x-model="data.name" />
                    <x-form.input label="Email" type="email" x-model="data.email" class="mt-3" />
                </div>
                <div class="mt-4" x-show="step === 1">
                    <x-form.input label="Adresse" x-model="data.address" />
                    <x-form.input label="Ville" x-model="data.city" class="mt-3" />
                </div>
                <div class="mt-4" x-show="step === 2">
                    <div class="text-[var(--color-text)]">Vérifiez vos informations puis validez.</div>
                </div>
                <div class="mt-4 flex flex-wrap gap-2">
                    <x-button type="button" color="secondary" @click="prev" x-bind:disabled="step === 0">Précédent</x-button>
                    <x-button type="button" @click="next" x-text="step === 2 ? 'Valider' : 'Suivant'"></x-button>
                </div>
            </div>
            <div x-show="msTab === 'code'" x-cloak>
<pre class="language-html rounded-lg border border-[var(--color-border)] bg-[var(--color-background)] p-4 text-sm overflow-x-auto"><code>&lt;!-- Étapes pilotées par Alpine --&gt;
&lt;div class=&quot;flex flex-wrap items-center gap-4&quot;&gt;
  &lt;template x-for=&quot;(s, i) in ['Infos','Adresse','Confirmation']&quot; :key=&quot;i&quot;&gt;
    ...
  &lt;/template&gt;
&lt;/div&gt;

function multiStepForm() {
  return {
    step: 0,
    data: { name: '', email: '', address: '', city: '' },
    next() { ... },
    prev() { ... },
  };
}</code></pre>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="rounded-xl border border-[var(--color-border)] bg-[var(--color-surface)] shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 border-b border-[var(--color-border)]">
            <div class="font-semibold text-[var(--color-text)]">Table avec recherche</div>
            <div class="flex items-center gap-2 text-sm" role="tablist" aria-label="Table avec recherche">
                <button type="button" role="tab" :aria-selected="tableTab === 'preview'" @click="tableTab = 'preview'" :class="tableTab === 'preview' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Aperçu</button>
                <span class="text-[var(--color-border)]" aria-hidden="true">|</span>
                <button type="button" role="tab" :aria-selected="tableTab === 'code'" @click="tableTab = 'code'" :class="tableTab === 'code' ? 'text-primary font-medium' : 'text-[var(--color-textSecondary)]'">Code</button>
            </div>
        </div>
        <div class="p-6" x-data="tableDemo()">
            <div x-show="tableTab === 'preview'" x-cloak>
                <div class="mb-3">
                    <x-form.input placeholder="Rechercher..." x-model="q" />
                </div>
                <div class="overflow-x-auto rounded-lg border border-[var(--color-border)]">
                    <table class="min-w-full divide-y divide-[var(--color-border)]">
                        <thead>
                            <tr class="bg-[var(--color-background)]">
                                <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-[var(--color-text)]">Nom</th>
                                <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-[var(--color-text)]">Email</th>
                                <th scope="col" class="px-4 py-2 text-left text-sm font-semibold text-[var(--color-text)]">Rôle</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[var(--color-border)]">
                            <template x-for="row in filtered" :key="row.email">
                                <tr class="hover:bg-[var(--color-background)]/80">
                                    <td class="px-4 py-2 text-[var(--color-text)]" x-text="row.name"></td>
                                    <td class="px-4 py-2 text-[var(--color-textSecondary)]" x-text="row.email"></td>
                                    <td class="px-4 py-2 text-[var(--color-textSecondary)]" x-text="row.role"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
            <div x-show="tableTab === 'code'" x-cloak>
<pre class="language-html rounded-lg border border-[var(--color-border)] bg-[var(--color-background)] p-4 text-sm overflow-x-auto"><code>&lt;table class=&quot;min-w-full divide-y divide-[var(--color-border)]&quot;&gt;...&lt;/table&gt;
function tableDemo() {
  return {
    q: '',
    rows: [...],
    get filtered() { ... },
  };
}</code></pre>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function examplesPage() {
    return {
        headerTab: 'preview',
        heroTab: 'preview',
        ctaTab: 'preview',
        contactTab: 'preview',
        msTab: 'preview',
        tableTab: 'preview',
    };
}

function contactForm() {
    return {
        form: { name: '', email: '', message: '' },
        loading: false,
        success: false,
        error: '',
        async submit() {
            this.loading = true;
            this.success = false;
            this.error = '';
            try {
                const res = await fetch("{{ route('contact.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
                    },
                    body: JSON.stringify(this.form),
                });
                let data = {};
                try {
                    data = await res.json();
                } catch (_) {}
                if (res.ok) {
                    this.success = true;
                    return;
                }
                if (data.errors && typeof data.errors === 'object') {
                    const first = Object.values(data.errors).flat()[0];
                    this.error = first || data.message || 'Vérifiez les champs et réessayez.';
                } else {
                    this.error = data.message || ('Envoi impossible (HTTP ' + res.status + ').');
                }
            } catch (e) {
                this.error = 'Réseau indisponible ou erreur inattendue.';
            } finally {
                this.loading = false;
            }
        },
    };
}

function multiStepForm() {
    return {
        step: 0,
        data: { name: '', email: '', address: '', city: '' },
        next() {
            if (this.step < 2) {
                this.step++;
            } else {
                alert('Formulaire soumis (démo).');
            }
        },
        prev() {
            if (this.step > 0) this.step--;
        },
    };
}

function tableDemo() {
    return {
        q: '',
        rows: [
            { name: 'Alice', email: 'alice@example.com', role: 'Admin' },
            { name: 'Bob', email: 'bob@example.com', role: 'User' },
            { name: 'Céline', email: 'celine@example.com', role: 'Manager' },
            { name: 'David', email: 'david@example.com', role: 'User' },
        ],
        get filtered() {
            const q = this.q.toLowerCase();
            return this.rows.filter((r) =>
                Object.values(r).some((v) => String(v).toLowerCase().includes(q))
            );
        },
    };
}
</script>
@endpush
@endsection
