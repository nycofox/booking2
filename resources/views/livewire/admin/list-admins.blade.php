<x-card title="Administratorer">
    <ul>
        @foreach($admins as $user)
            <li><a href="{{ route('admin.profile', $user) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
</x-card>
