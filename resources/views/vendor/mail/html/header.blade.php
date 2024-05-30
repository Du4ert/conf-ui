@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'GenBio2024')
<img src="{{ asset('images/conf-logo.svg') }}" class="logo" alt="GenBio2024">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>