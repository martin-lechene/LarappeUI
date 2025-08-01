@extends('layouts.app')

@section('title', 'Select - Documentation des Composants')

@section('content')
<!-- Header -->
<div class="mb-8">
    <div class="flex items-center mb-4">
        <span class="text-3xl mr-4">📋</span>
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Select</h1>
            <p class="text-gray-600">Composant Select réutilisable avec options configurables</p>
        </div>
    </div>
    
    <!-- Tabs -->
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8">
            <button @click="activeTab = 'preview'" 
                    :class="activeTab === 'preview' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                Preview
            </button>
            <button @click="activeTab = 'code'" 
                    :class="activeTab === 'code' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                Code
            </button>
            <button @click="activeTab = 'props'" 
                    :class="activeTab === 'props' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                Propriétés
            </button>
        </nav>
    </div>
</div>

<!-- Preview Tab -->
<div x-show="activeTab === 'preview'" class="space-y-8">
    <!-- Live Preview -->
    <div class="bg-white rounded-lg shadow-sm border p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Preview Interactive</h3>
        
        <!-- Preview Area -->
        <div class="bg-gray-50 rounded-lg p-8 mb-6 flex items-center justify-center">
            <div class="text-center">
                <p class="text-gray-600">Preview du composant Select</p>
                <p class="text-sm text-gray-500 mt-2">Configuration interactive à venir</p>
            </div>
        </div>

        <!-- Controls -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Configuration</label>
                <p class="text-sm text-gray-500">Les contrôles de configuration seront ajoutés ici</p>
            </div>
        </div>
    </div>

    <!-- Examples -->
    <div class="bg-white rounded-lg shadow-sm border p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Exemples</h3>
        
        <div class="space-y-6">
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Exemples de base</h4>
                <div class="space-y-3">
                    <p class="text-gray-600">Exemples du composant Select à venir</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Code Tab -->
<div x-show="activeTab === 'code'" class="space-y-8">
    <div class="bg-white rounded-lg shadow-sm border p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Code</h3>
        
        <div class="space-y-6">
            <!-- Basic Usage -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Utilisation de Base</h4>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;x-select&gt;Contenu&lt;/x-select&gt;</code></pre>
            </div>

            <!-- With Props -->
            <div>
                <h4 class="font-medium text-gray-900 mb-3">Avec Propriétés</h4>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto"><code class="language-html">&lt;x-select 
    prop1="value1"
    prop2="value2"
&gt;
    Contenu
&lt;/x-select&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Props Tab -->
<div x-show="activeTab === 'props'" class="space-y-8">
    <div class="bg-white rounded-lg shadow-sm border p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Propriétés</h3>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Propriété</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Défaut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Propriétés</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Documentation des propriétés à venir</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Configuration spécifique pour cette page
    document.addEventListener('alpine:init', () => {
        Alpine.data('Config', () => ({
            // Configuration spécifique au composant
        }));
    });
</script>
@endpush
