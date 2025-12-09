@props(['data' => []])
<pre class="bg-gray-50 border rounded p-3 text-xs overflow-auto"><code>{!! json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) !!}</code></pre>