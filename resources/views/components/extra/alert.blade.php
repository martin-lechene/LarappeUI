@props(['type' => 'info', 'title' => null, 'dismissible' => true])
@php
  $map = [
    'info' => 'bg-blue-50 text-blue-800 border-blue-200',
    'success' => 'bg-green-50 text-green-800 border-green-200',
    'warning' => 'bg-yellow-50 text-yellow-800 border-yellow-200',
    'danger' => 'bg-red-50 text-red-800 border-red-200',
  ];
  $cls = $map[$type] ?? $map['info'];
  // Les messages d'erreur sont annoncés immédiatement, les autres poliment.
  $role = in_array($type, ['danger', 'warning'], true) ? 'alert' : 'status';
@endphp
<div x-data="{ open: true }" x-show="open" role="{{ $role }}" {{ $attributes->merge(['class' => "flex items-start gap-3 border rounded-md px-3 py-2 $cls"]) }}>
  <div class="mt-0.5" aria-hidden="true">⚑</div>
  <div class="flex-1">
    @if($title)<div class="font-medium">{{ $title }}</div>@endif
    <div class="text-sm">{{ $slot }}</div>
  </div>
  @if($dismissible)
    <button type="button" class="text-current/50 hover:text-current" aria-label="Fermer" @click="open = false">✕</button>
  @endif
</div>
