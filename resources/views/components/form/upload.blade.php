@props([
    'multiple' => false,
    'accept' => null,
    'maxSize' => null,
    'value' => null,
    'onChange' => null,
    'disabled' => false,
    'showList' => true,
    'listType' => 'text', // text, picture, picture-card
])
<div {{ $attributes->merge(['class' => 'w-full']) }}>
    <label class="block cursor-pointer">
        <input type="file"
            @if($multiple) multiple @endif
            @if($accept) accept="{{ $accept }}" @endif
            @if($disabled) disabled @endif
            class="hidden"
            onchange="{{ $onChange }}"
        >
        <span class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-700 border border-blue-200 rounded hover:bg-blue-100 cursor-pointer">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5-5m0 0l5 5m-5-5v12" /></svg>
            <span>{{ $slot ?: 'Choisir un fichier' }}</span>
        </span>
    </label>
    @if($showList && $value)
        <ul class="mt-3 space-y-1 text-xs">
            @foreach((array)$value as $file)
                <li class="truncate {{ $listType === 'picture' || $listType === 'picture-card' ? 'flex items-center gap-2' : '' }}">
                    @if($listType === 'picture' || $listType === 'picture-card')
                        <img src="{{ is_string($file) ? $file : (isset($file['url']) ? $file['url'] : '') }}" alt="file" class="w-8 h-8 object-cover rounded border" />
                    @endif
                    <span>{{ is_string($file) ? basename($file) : (isset($file['name']) ? $file['name'] : '') }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div> 