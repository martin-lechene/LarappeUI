@props(['columns' => [
  ['title'=>'À faire','items'=>['Tâche A','Tâche B']],
  ['title'=>'En cours','items'=>['Tâche C']],
  ['title'=>'Terminé','items'=>['Tâche D']]
]])
<div class="grid grid-cols-3 gap-4">
  @foreach($columns as $col)
    <div class="bg-surface border rounded p-3">
      <div class="font-semibold mb-2">{{ $col['title'] }}</div>
      <div class="space-y-2">
        @foreach($col['items'] as $it)
          <div class="bg-white border rounded p-2 shadow-sm">{{ $it }}</div>
        @endforeach
      </div>
    </div>
  @endforeach
</div>