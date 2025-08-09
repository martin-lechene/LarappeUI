@props(['text' => 'Info'])
<span class="relative group inline-block">
  {{ $slot ?? 'i' }}
  <span class="absolute -top-9 left-1/2 -translate-x-1/2 whitespace-nowrap bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition">
    {{ $text }}
    <span class="absolute left-1/2 -bottom-1 -translate-x-1/2 w-0 h-0 border-l-4 border-r-4 border-t-4 border-l-transparent border-r-transparent border-t-gray-900"></span>
  </span>
</span>