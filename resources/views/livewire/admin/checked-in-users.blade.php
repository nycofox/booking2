<x-card title="Innsjekkede kandidater">
    <ul>
        @forelse($users as $user)
            <li><a href="{{ route('admin.profile', $user) }}">{{ $user->name }}</a></li>
        @empty
            <li>Ingen innsjekkede kandidater</li>
        @endforelse
    </ul>
</x-card>
