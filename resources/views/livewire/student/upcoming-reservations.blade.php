<x-widget title="Kommende reservasjoner">
    <p>Du har {{ $bookings->count() }} kommende reservasjoner:</p>
    <ul>
        @foreach($bookings as $booking)
            <li>
                {{ $booking->room->name }} - {{ $booking->booked_from->format('d.m.Y H:i') }}
                - {{ $booking->booked_to->format('d.m.Y H:i') }}
            </li>
        @endforeach
    </ul>
</x-widget>
