<x-card title="Mine deltakere">
    <ul>
        @foreach($candidates as $candidate)
            <li><a href="{{ route('admin.profile', $candidate) }}">{{ $candidate->name }}</a></li>
        @endforeach
    </ul>
</x-card>
