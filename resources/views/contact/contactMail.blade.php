@component('mail::message')
# {{$data['subject']}}

@component('mail::panel')
{{$data['message']}}
@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

From, {{$data['name']}}<br>
{{ $data['email'] }}
@endcomponent
