<x-card title="Kommende reservasjoner">
    @if($bookings->count() > 0)
        <p>{{ $name }} har {{ $bookings->count() }} kommende reservasjon(er):</p>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">
                    Dato
                </th>
                <th scope="col">
                    Plass
                </th>
                <th scope="col">
                    Periode
                </th>
                <th scope="col">
                    Handlinger
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                <tr class="@if($booking->approved_at) text-success @endif">
                    <td>{{ $booking->booked_from->format('Y-m-d') }}</td>
                    <td><a href="#">{{ $booking->seat->name }}</a></td>
                    <td>
                        {{ $booking->booked_from->format('H:i') }} -
                        {{ $booking->booked_to->format('H:i') }}
                    </td>
                    <td>
                        @livewire('student.delete-reservation', ['booking' => $booking])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p>Farger:</p>
        <ul>
            <li>Grønn: Godkjent</li>
            <li>Gul: Venter på godkjenning</li>
        </ul>
    @else
        <p>{{ $name }} har ingen kommende reservasjoner.</p>
    @endif
</x-card>
