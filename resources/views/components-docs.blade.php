@extends('layouts.app')

@section('title', 'Documentation des Composants')

@section('content')
<!-- Hero Section -->
<div class="text-center mb-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-4">Bibliothèque de Composants</h1>
    <p class="text-xl text-gray-600 mb-8">Découvrez tous nos composants réutilisables avec leurs options et thèmes</p>
    
    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="text-2xl font-bold text-blue-600" x-text="components.length"></div>
            <div class="text-sm text-gray-600">Composants</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="text-2xl font-bold text-green-600" x-text="themes.length"></div>
            <div class="text-sm text-gray-600">Thèmes</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="text-2xl font-bold text-purple-600">4</div>
            <div class="text-sm text-gray-600">Catégories</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border">
            <div class="text-2xl font-bold text-orange-600">100%</div>
            <div class="text-sm text-gray-600">Responsive</div>
        </div>
    </div>
</div>

<!-- Components Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <template x-for="component in components" :key="component.name">
        <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow">
            <a :href="'/components-docs/' + component.path" class="block p-6">
                <div class="flex items-center mb-4">
                    <span class="text-2xl mr-3" x-text="component.icon"></span>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900" x-text="component.name"></h3>
                        <p class="text-sm text-gray-500" x-text="component.category"></p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm">Composant réutilisable avec options configurables et support multi-thèmes.</p>
            </a>
        </div>
    </template>
</div>
@endsection