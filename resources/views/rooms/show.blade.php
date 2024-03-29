<x-app>
    <x-card
        title="{{ $room->name }} ({{ Carbon\Carbon::createFromFormat('Y-m-d', $date)->locale('no')->dayName }} {{ $date }})">
        <p>Plasser i dette kan reserveres mandag til fredag kl {{ $room->bookable_from }}
            til {{ $room->bookable_to }}. Du kan reservere en plass opptil en uke fremover i tid.</p>
        <p><a href="#">Her kan du se setekartet for rommet.</a></p>
        @if(Carbon\Carbon::createFromFormat('Y-m-d', $date)->diffInDays(now()) > 7)
            <p class="alert alert-danger">Du kan ikke reservere en plass mer enn en uke fremover i tid.</p>
        @endif
        <p>Velg dato:
            @foreach($dates as $currentDate)
                <a href="{{ route('booking.room.show', [$room, $currentDate]) }}"
                   class="btn btn-sm btn-outline-primary {{ $date == $currentDate ? 'active' : '' }}">
                    {{ $currentDate }}</a>
            @endforeach
        </p>
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
                        @forelse($seat->bookings as $booking)
                            <span class="text-bg-{{ $booking->status }} py-1 px-2 rounded shadow-sm">
                                @if(auth()->user()->hasRole('admin'))
                                    {{ $booking->user->name }}
                                @endif
                                {{ $booking->booked_from->format('H:i') }} - {{ $booking->booked_to->format('H:i') }}
                            </span>
                        @empty
                            <span>Ingen reservasjoner i dag.</span>
                        @endforelse
                    </td>
                    <td>
                        @if($seat->requires_approval)
                            Ja
                        @else
                            Nei
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('booking.create', [$seat, $date]) }}" class="btn btn-primary py-0 px-2 mb-1">Reservér</a>
                        @livewire('seat.add-favorite-button', ['seat' => $seat])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p>
            <small>
                Dersom en plass krever godkjenning, vil reservasjonen din bli sendt til en administrator for
                gjennomgang.
                Du vil få en e-post når reservasjonen er godkjent.
            </small>
        </p>
        <p>
            <span class="text-bg-success px-2 py-1 rounded shadow-sm">Godkjent reservasjon</span>
            <span class="text-bg-warning px-2 py-1 rounded shadow-sm">Venter på godkjenning</span>
            <span class="text-bg-danger px-2 py-1 rounded shadow-sm">Opptatt</span>
        </p>
    </x-card>
</x-app>
