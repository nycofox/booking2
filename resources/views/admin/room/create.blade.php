<x-admin>
    <x-card title="Legg til nytt rom">
        <form action="{{ route('rooms.store') }}" method="post">
            @include('admin.room._form')
            <button type="submit" class="btn btn-primary">Lagre</button>
        </form>
    </x-card>
</x-admin>
