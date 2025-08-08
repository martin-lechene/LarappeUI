@props(['title' => 'Section Title', 'subtitle' => 'Optional description'])
<div {{ $attributes->merge(['class' => 'flex items-center justify-between bg-surface rounded-lg border p-4']) }}>
  <div>
    <h2 class="text-xl font-semibold">{{ $title }}</h2>
    @if($subtitle)
      <p class="text-sm text-gray-500">{{ $subtitle }}</p>
    @endif
  </div>
  <div class="flex gap-2">
    <x-button size="sm" color="secondary">Action</x-button>
    <x-button size="sm">Primary</x-button>
  </div>
</div>