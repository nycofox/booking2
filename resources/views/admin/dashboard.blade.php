<x-admin>
    <div class="container">
        <div class="row">
            <div class="col-md">
                <x-card>Kandidater sjekket inn nå:</x-card>

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

                <x-card>Statistikk:</x-card>
            </div>
        </div>
    </div>
</x-admin>
