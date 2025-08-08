@props(['position' => 'top-right'])
<div x-data="{ toasts: [] }" x-on:show-toast.window="toasts.push($event.detail)">
  <div class="fixed z-50 space-y-2"
       :class="{
         'top-4 right-4': '{{ $position }}' === 'top-right',
         'top-4 left-4': '{{ $position }}' === 'top-left',
         'bottom-4 right-4': '{{ $position }}' === 'bottom-right',
         'bottom-4 left-4': '{{ $position }}' === 'bottom-left'
       }">
    <template x-for="(t, i) in toasts" :key="i">
      <div class="rounded-lg border bg-white shadow-md px-3 py-2 text-sm flex items-center gap-2">
        <span x-text="t.message"></span>
        <button class="ml-2 text-gray-400 hover:text-gray-600" @click="toasts.splice(i,1)">✕</button>
      </div>
    </template>
  </div>
</div>