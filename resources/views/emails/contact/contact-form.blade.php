@component('mail::message')
# Thanks for the message!

<strong>Name: </strong> {{ $data['name']}}
<strong>Email: </strong> {{ $data['name']}}

<strong>Message</strong>

{{$data['message']}}
@endcomponent
