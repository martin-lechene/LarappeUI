@props(['data' => [[1,2,3],[2,3,4],[3,4,5]]])
<div class="inline-grid" :style="`grid-template-columns: repeat(${rows[0]?.length||0}, 1fr);`" x-data="{ rows: @js($data) }">
  <template x-for="(row,i) in rows" :key="i">
    <template x-for="(v,j) in row" :key="j">
      <div class="w-4 h-4" :style="{ backgroundColor: `rgba(59,130,246,${v/5})` }"></div>
    </template>
  </template>
</div>