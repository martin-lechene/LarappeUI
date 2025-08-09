<div x-data="{ show:false, message:'' }" x-on:show-snackbar.window="message=$event.detail.message; show=true; setTimeout(()=>show=false, $event.detail.timeout||3000)">
  <div x-show="show" class="fixed bottom-6 inset-x-0 flex justify-center">
    <div class="bg-gray-900 text-white px-4 py-2 rounded-full shadow-lg">{{ $slot ?? '' }}<span x-text="message"></span></div>
  </div>
</div>