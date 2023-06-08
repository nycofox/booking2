<x-admin>
    <x-card title="Endre på rom {{ $room->name }}">
        <form action="{{ route('rooms.update', $room) }}" method="post">
            @include('admin.room._form')
            <button type="submit" class="btn btn-primary">Lagre endringer</button>
        </form>
    </x-card>
</x-admin>
