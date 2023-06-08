<x-card title="Innsjekkede kandidater">
    <ul>
        @foreach($users as $user)
            <li><a href="{{ route('admin.profile', $user) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
</x-card>
