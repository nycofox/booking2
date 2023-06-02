<x-widget title="Søk etter bruker">
    <input wire:model="search" type="text" placeholder="Begynn å skrive navnet..." class="form-control">
    <ul>
        @foreach($users as $user)
            <li><a href="{{ route('admin.profile', $user) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
</x-widget>
