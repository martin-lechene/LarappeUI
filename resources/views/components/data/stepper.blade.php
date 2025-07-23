@props([
    'steps' => [], // [{label, icon}]
    'current' => 1,
    'direction' => 'horizontal', // horizontal, vertical
])
@php
    $isHorizontal = $direction === 'horizontal';
@endphp
<div class="flex {{ $isHorizontal ? 'flex-row items-center gap-4' : 'flex-col gap-6' }}">
    @if(!empty($steps))
        @foreach($steps as $i => $step)
            <div class="flex items-center gap-2">
                <div class="flex items-center justify-center rounded-full border-2 {{ $i+1 <= $current ? 'border-blue-600 bg-blue-600 text-white' : 'border-gray-300 bg-white text-gray-400' }} w-8 h-8 font-bold">
                    @if(isset($step['icon']))
                        {!! $step['icon'] !!}
                    @else
                        {{ $i+1 }}
                    @endif
                </div>
                @if(isset($step['label']))
                    <span class="text-sm {{ $i+1 <= $current ? 'text-blue-600' : 'text-gray-500' }}">{{ $step['label'] }}</span>
                @endif
                @if($isHorizontal && $i < count($steps) - 1)
                    <div class="flex-1 h-0.5 bg-gray-200 mx-2"></div>
                @endif
            </div>
        @endforeach
    @else
        {{ $slot }}
    @endif
</div> 