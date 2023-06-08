<x-admin>
    <x-card title="{{ $room->name }}">
        <p>Antall plasser: {{ $seats->count() }}</p>
    </x-card>
    <x-card title="Plasser">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Navn</th>
                <th scope="col">Aktiv?</th>
                <th scope="col">Må godkjennes?</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($seats as $seat)
                <tr>
                    <td>{{ $seat->name }}</td>
                    <td>
                        @if($seat->active)
                            <span class="badge badge-success">Ja</span>
                        @else
                            <span class="badge badge-danger">Nei</span>
                        @endif
                    </td>
                    <td>
                        @if($seat->requires_approval)
                            <span class="badge badge-success">Ja</span>
                        @else
                            <span class="badge badge-danger">Nei</span>
                        @endif
                    </td>
                    <td><a href="{{ route('seats.edit', [$room, $seat]) }}">Rediger</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p><a href="{{ route('seats.create', $room) }}">Legg til ny plass</a></p>
    </x-card>
</x-admin>
