<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('communivis-logo.png') }}" class="logo" alt="communivis-logo" />
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
