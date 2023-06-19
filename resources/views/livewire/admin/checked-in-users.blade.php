<x-card title="Innsjekkede kandidater">
    <ul>
        @forelse($users as $user)
            <li>
                <a href="{{ route('admin.profile', $user) }}">{{ $user->name }}</a>
                kl. {{ $user->checked_in_at->format('H:i') }}
            </li>
        @empty
            <li>Ingen innsjekkede kandidater</li>
        @endforelse
    </ul>
</x-card>
