<x-admin>
    <x-card title="Endre {{ $room->name }}">
        <form action="{{ route('seats.update', [$room, $seat]) }}" method="post">
            @csrf
            @method('patch')
            @include('admin.room.seat._form')
            <button type="submit" class="btn btn-primary">Lagre endringer</button>
        </form>
    </x-card>
</x-admin>
