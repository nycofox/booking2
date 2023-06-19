<x-card title="Søk etter bruker">
    <input wire:model="search" type="text" placeholder="Begynn å skrive navnet..." class="form-control mb-3">
    <ul>
        @foreach($users as $user)
            <li><a href="{{ route('admin.profile', $user) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
</x-card>
