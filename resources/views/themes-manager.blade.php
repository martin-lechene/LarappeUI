@extends('layouts.app')

@section('title', 'Gestionnaire de Thèmes - Documentation des Composants')

@section('content')
<div class="mb-8">
    <div class="flex items-center mb-4">
        <span class="text-3xl mr-4">🎨</span>
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Gestionnaire de Thèmes</h1>
            <p class="text-gray-600">Personnalisez l'apparence de vos composants avec nos thèmes prédéfinis</p>
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
            <button @click="activeTab = 'themes'"
                    :class="activeTab === 'themes' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                Thèmes
            </button>
            <button @click="activeTab = 'custom'"
                    :class="activeTab === 'custom' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                    class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                Personnalisé
            </button>
        </nav>
    </div>
</div>

<!-- Preview Tab -->
<div x-show="activeTab === 'preview'" class="space-y-8">
    <!-- Theme Preview -->
    <div class="bg-white rounded-lg shadow-sm border p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Preview du Thème</h3>

        <!-- Component Showcase -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Buttons -->
            <div>
                <h4 class="font-medium text-gray-900 mb-4">Boutons</h4>
                <div class="space-y-3">
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500 px-4 py-2 text-sm rounded-md">
                        Primary
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-gray-100 text-gray-900 hover:bg-gray-200 focus:ring-gray-400 px-4 py-2 text-sm rounded-md">
                        Secondary
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 px-4 py-2 text-sm rounded-md">
                        Danger
                    </button>
                    <button class="inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-green-600 text-white hover:bg-green-700 focus:ring-green-500 px-4 py-2 text-sm rounded-md">
                        Success
                    </button>
                </div>
            </div>

            <!-- Form Elements -->
            <div>
                <h4 class="font-medium text-gray-900 mb-4">Éléments de Formulaire</h4>
                <div class="space-y-3">
                    <input type="text" placeholder="Input field" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>Select option</option>
                    </select>
                    <div class="flex items-center">
                        <input type="checkbox" class="mr-2">
                        <span class="text-sm">Checkbox</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Themes Tab -->
<div x-show="activeTab === 'themes'" class="space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <template x-for="theme in themes" :key="theme.key">
            <div class="bg-white rounded-lg shadow-sm border p-6 hover:shadow-md transition-shadow cursor-pointer"
                 @click="
                     currentTheme = theme.key;
                     if (window.ThemeManager) {
                         window.ThemeManager.applyTheme(theme.key);
                     }
                 "
                 :class="currentTheme === theme.key ? 'ring-2 ring-blue-500' : ''">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900" x-text="theme.name"></h3>
                    <div x-show="currentTheme === theme.key" class="text-blue-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mb-4" x-text="theme.description"></p>
                
                <!-- Color Preview -->
                <div class="grid grid-cols-5 gap-2">
                    <div class="w-6 h-6 rounded bg-blue-500"></div>
                    <div class="w-6 h-6 rounded bg-green-500"></div>
                    <div class="w-6 h-6 rounded bg-red-500"></div>
                    <div class="w-6 h-6 rounded bg-yellow-500"></div>
                    <div class="w-6 h-6 rounded bg-purple-500"></div>
                </div>
            </div>
        </template>
    </div>
</div>

<!-- Custom Tab -->
<div x-show="activeTab === 'custom'" class="space-y-8">
    <div class="bg-white rounded-lg shadow-sm border p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Personnalisation des Couleurs</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium text-gray-900 mb-4">Couleurs Principales</h4>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary</label>
                        <input type="color" x-model="customTheme.primary" class="w-full h-10 rounded border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary</label>
                        <input type="color" x-model="customTheme.secondary" class="w-full h-10 rounded border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Success</label>
                        <input type="color" x-model="customTheme.success" class="w-full h-10 rounded border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Warning</label>
                        <input type="color" x-model="customTheme.warning" class="w-full h-10 rounded border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Danger</label>
                        <input type="color" x-model="customTheme.danger" class="w-full h-10 rounded border">
                    </div>
                </div>
            </div>
            
            <div>
                <h4 class="font-medium text-gray-900 mb-4">Couleurs d'Interface</h4>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Background</label>
                        <input type="color" x-model="customTheme.background" class="w-full h-10 rounded border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Surface</label>
                        <input type="color" x-model="customTheme.surface" class="w-full h-10 rounded border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Text</label>
                        <input type="color" x-model="customTheme.text" class="w-full h-10 rounded border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Border</label>
                        <input type="color" x-model="customTheme.border" class="w-full h-10 rounded border">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Appliquer le Thème Personnalisé
            </button>
        </div>
    </div>
</div>
@endsection
