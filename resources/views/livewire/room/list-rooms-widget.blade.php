<x-card title="Reserver plass i et rom">
    @foreach($rooms as $room)
        <div class="d-flex justify-content-between bg-light mb-1">
            <a href="{{ route('booking.room.show', $room) }}">{{ $room->name }}</a>
            <small>{{ $room->seats_count }} plasser totalt</small>
        </div>
    @endforeach

    <h5 class="mt-3">
        Mine favorittseter:
    </h5>
    @forelse($favorite_seats as $seat)
        <div class="d-flex justify-content-between bg-light mb-1">
            <div>
                <a href="{{ route('booking.create', [$seat, now()->format('Y-m-d')]) }}">{{ $seat->name }}</a>
                <small>{{ $seat->description }}</small>
            </div>
            <small>{{ $seat->room->name }}</small>
        </div>
    @empty
        <div class="alert alert-info">Du har ingen favorittseter. Du kan legge til seter i romoversikten, trykk på
        knappen "Favoritt".</div>
    @endforelse
</x-card>
