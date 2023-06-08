<x-admin>
    <div class="container">
        <div class="row">
            <div class="col-md">
                @livewire('admin.checked-in-users')
                @livewire('admin.search-users')
            </div>

            <div class="col-md">
                <x-card>
                    <h5>Mine kandidater:</h5>
                    <ul>
                        @foreach($candidates as $candidate)
                            <li><a href="{{ route('admin.profile', $candidate) }}">{{ $candidate->name }}</a></li>
                        @endforeach
                    </ul>
                </x-card>
                @livewire('admin.rooms')

            </div>
        </div>
    </div>
</x-admin>
