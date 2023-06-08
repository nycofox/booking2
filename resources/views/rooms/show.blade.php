<x-app>
    <x-card title="{{ $room->name }} ({{ $date }})">
        <p>Plasser i dette kan reserveres mandag til fredag kl {{ $room->bookable_from }}
            til {{ $room->bookable_to }}. Du kan reservere en plass opptil en uke fremover i tid.</p>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Plass</th>
                <th scope="col" class="w-100">Reservasjoner</th>
                <th scope="col">Godkjennes?</th>
                <th scope="col">Handlinger</th>
            </tr>
            </thead>
            <tbody>
            @foreach($seats as $seat)
                <tr>
                    <th>{{ $seat->name }}</th>
                    <td>
                        @foreach($seat->bookings as $booking)
                            <span class="bg-warning">{{ $booking->booked_from }} - {{ $booking->booked_to }}</span>
                        @endforeach
                    </td>
                    <td>
                        @if($seat->requires_approval)
                            Ja
                        @else
                            Nei
                        @endif
                    </td>
                    <td>Favoritt, Reservér</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <small>
            Dersom en plass krever godkjenning, vil reservasjonen din bli sendt til en administrator for gjennomgang.
            Du vil få en e-post når reservasjonen er godkjent.
        </small>
    </x-card>
</x-app>
