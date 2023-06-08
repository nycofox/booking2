<x-card title="Oversikt over rom">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Rom</th>
            <th scope="col">Antall plasser</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @forelse($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->seats_count }}</td>
                <td><a href="{{ route('rooms.edit', $room) }}">Rediger</a></td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Ingen rom registrert.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <p><a href="{{ route('rooms.create') }}">Legg til nytt rom.</a></p>
</x-card>
