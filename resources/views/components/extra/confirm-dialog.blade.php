@props(['title' => 'Confirmer', 'confirmText' => 'Confirmer', 'cancelText' => 'Annuler'])
@php
  $titleId = 'confirm-title-'.uniqid();
@endphp
<div x-data="{ open: false, onConfirm: null }"
     x-on:open-confirm.window="open = true; onConfirm = $event.detail?.onConfirm">
  <div x-show="open"
       role="dialog"
       aria-modal="true"
       aria-labelledby="{{ $titleId }}"
       x-trap.noscroll="open"
       @keydown.escape.window="open = false"
       class="fixed inset-0 bg-black/40 flex items-center justify-center p-4">
    {{-- Le clic sur le voile ferme, comme l'echappement. --}}
    <div class="absolute inset-0" aria-hidden="true" @click="open = false"></div>
    <div class="relative bg-white rounded-xl shadow-xl w-full max-w-md">
      <div id="{{ $titleId }}" class="p-4 border-b font-semibold">{{ $title }}</div>
      <div class="p-4">{{ $slot }}</div>
      <div class="flex justify-end gap-2 p-4 border-t">
        <x-button color="secondary" @click="open = false">{{ $cancelText }}</x-button>
        <x-button @click="if (onConfirm) { onConfirm() }; open = false">{{ $confirmText }}</x-button>
      </div>
    </div>
  </div>
</div>
