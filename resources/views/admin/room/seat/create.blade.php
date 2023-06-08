<x-admin>
    <x-card title="Legg til ny plass i {{ $room->name }}">
        <form action="{{ route('seats.store', $room) }}" method="post">
            @csrf
            @include('admin.room.seat._form')
            <button type="submit" class="btn btn-primary">Lagre</button>
        </form>
    </x-card>
</x-admin>
