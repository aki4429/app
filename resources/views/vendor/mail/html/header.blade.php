@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'おだちんWEB')
<img src="https://odachin.net/wp-content/uploads/2025/02/logo512x120.png"  alt="おだちんWEB" style="height: 40px">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
