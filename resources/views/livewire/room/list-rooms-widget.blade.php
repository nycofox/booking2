<x-card title="Reserver plass i et rom">
    @foreach($rooms as $room)
        <div class="d-flex justify-content-between">
            <a href="{{ route('booking.room.show', $room) }}">{{ $room->name }}</a>
            <small>{{ $room->seats_count }} plasser totalt</small>
        </div>
    @endforeach
</x-card>
