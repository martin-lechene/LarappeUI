@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Démo des Inputs & Selects avancés</h1>

    <h2 class="text-xl font-semibold mt-8 mb-4">Inputs avancés</h2>
    <div class="space-y-4">
        <x-input label="Adresse IP v4" placeholder="192.168.0.1" />
        <x-input label="Adresse IP v6" placeholder="2001:0db8:85a3:0000:0000:8a2e:0370:7334" />
        <x-input label="Carte bancaire" placeholder="1234 5678 9012 3456" maxlength="19" />
        <x-input label="CVV" placeholder="123" maxlength="4" />
        <x-input label="Téléphone" placeholder="+33 6 12 34 56 78" />
        <x-input label="Code postal" placeholder="75001" maxlength="10" />
        <x-input label="IBAN" placeholder="FR76 3000 6000 0112 3456 7890 189" maxlength="34" />
        <x-input label="SIRET" placeholder="123 456 789 00012" maxlength="14" />
        <x-input label="SIREN" placeholder="123 456 789" maxlength="9" />
        <x-input label="Date" type="date" />
        <x-input label="Code de vérification" placeholder="123456" maxlength="6" />
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">OTP (inputs splittés)</label>
            <div class="flex space-x-2">
                <x-input maxlength="1" class="w-10 text-center" />
                <x-input maxlength="1" class="w-10 text-center" />
                <x-input maxlength="1" class="w-10 text-center" />
                <x-input maxlength="1" class="w-10 text-center" />
                <x-input maxlength="1" class="w-10 text-center" />
                <x-input maxlength="1" class="w-10 text-center" />
            </div>
        </div>
        <x-input label="Montant" placeholder="0.00" prefix="€" type="number" step="0.01" />
        <div class="flex space-x-2 items-end">
            <x-input label="Montant" placeholder="0.00" type="number" step="0.01" />
            <x-select :options="['EUR', 'USD', 'GBP']" />
        </div>
    </div>

    <h2 class="text-xl font-semibold mt-12 mb-4">Selects avancés</h2>
    <div class="space-y-4">
        <x-select label="Pays (optgroup)" :options="[
            ['label' => 'Europe', 'options' => [
                ['label' => 'France', 'value' => 'FR'],
                ['label' => 'Allemagne', 'value' => 'DE'],
            ]],
            ['label' => 'Asie', 'options' => [
                ['label' => 'Japon', 'value' => 'JP'],
                ['label' => 'Chine', 'value' => 'CN'],
            ]],
        ]" />
        <x-select label="Ville (asynchrone)" :options="[]" loading="true" placeholder="Chargement..." />
        <x-select label="Réseau social (icônes)" :options="[
            ['label' => 'Facebook', 'value' => 'fb', 'icon' => '<svg class=\'inline w-4 h-4 mr-1\' fill=\'currentColor\' viewBox=\'0 0 24 24\'><path d=\'M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.877v-6.987h-2.54v-2.89h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.242 0-1.632.771-1.632 1.562v1.875h2.773l-.443 2.89h-2.33v6.987C18.343 21.128 22 16.991 22 12z\'/></svg>'],
            ['label' => 'Twitter', 'value' => 'tw', 'icon' => '<svg class=\'inline w-4 h-4 mr-1\' fill=\'currentColor\' viewBox=\'0 0 24 24\'><path d=\'M24 4.557a9.93 9.93 0 01-2.828.775 4.932 4.932 0 002.165-2.724c-.951.564-2.005.974-3.127 1.195a4.92 4.92 0 00-8.384 4.482C7.691 8.095 4.066 6.13 1.64 3.161c-.542.929-.855 2.01-.855 3.17 0 2.188 1.115 4.116 2.823 5.247a4.904 4.904 0 01-2.229-.616c-.054 2.281 1.581 4.415 3.949 4.89a4.936 4.936 0 01-2.224.084c.627 1.956 2.444 3.377 4.6 3.417A9.867 9.867 0 010 21.543a13.94 13.94 0 007.548 2.209c9.058 0 14.009-7.513 14.009-14.009 0-.213-.005-.425-.014-.636z\'/></svg>'],
        ]" />
        @php $produits = array_map(fn($i) => 'Produit '.$i, range(1, 1000)); @endphp
        <x-select label="Produit (virtual scroll)" :options="$produits" placeholder="Sélectionner un produit..." />
        <x-select label="Technologies (recherche multi)" :options="['PHP', 'Laravel', 'Vue.js', 'React']" multiple="true" searchable="true" />
        <x-select label="Tags (taggable)" :options="['Laravel', 'PHP', 'Livewire']" multiple="true" taggable="true" placeholder="Ajouter un tag..." />
    </div>
</div>
@endsection 