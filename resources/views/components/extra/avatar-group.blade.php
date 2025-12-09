@props(['users' => [['name'=>'Alice'],['name'=>'Bob'],['name'=>'Céline']]])
<div class="flex -space-x-3">
  @foreach($users as $u)
    <div class="w-8 h-8 rounded-full bg-gray-200 border-2 border-white flex items-center justify-center text-xs" title="{{ $u['name'] }}">
      {{ strtoupper(substr($u['name'],0,1)) }}
    </div>
  @endforeach
</div>