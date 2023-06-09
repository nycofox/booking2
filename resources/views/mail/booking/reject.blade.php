@extends('layouts.email')

@section('content')
<p>
    Hei {{ $booking->user->name }},
</p>
<p>
    Plassen din på {{ $booking->room->name }} er avvist. Du kan prøve å booke en annen plass.
</p>
@endsection
