<x-admin>
    <div class="row">
        <div class="col-md">
            <x-card>
                <div class="d-flex">
                    <div>
                        <img src="{{ $user->profile_picture }}" alt="Profile picture" class="img-thumbnail">
                    </div>
                    <div class="px-2">
                        <h5>{{ $user->name }}</h5>
                        <p>{{ $user->first_name }} var sist aktiv for {{ $user->last_active_at->diffForHumans() }}.</p>
                        <p>Opprettet: {{ $user->created_at->format('Y-m-d') }}</p>
                        @if($user->anonymized_at)
                            <p>Anonymisert: {{ $user->anonymized_at->format('Y-m-d') }}</p>
                        @endif
                    </div>
                </div>

            </x-card>
            <x-card>
                <h5>Administrasjon</h5>
                @livewire('admin.user.give-admin-role', ['user' => $user])
                @livewire('admin.user.toggle-candidate', ['user' => $user])
                @livewire('user.checkin-button', ['user' => $user])
            </x-card>
        </div>
        <div class="col-md-8">
            <x-card title="Kommende reservasjoner"></x-card>
            @livewire('student.statistics')
        </div>
    </div>
</x-admin>
