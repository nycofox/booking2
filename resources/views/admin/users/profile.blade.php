<x-admin>
    <div class="row">
        <div class="col-md">
            <x-card>
                <div class="d-flex">
                    <img src="{{ $user->avatar_url }}" alt="Profile picture" class="img-thumbnail">
                    <div>
                        <h5>{{ $user->name }}</h5>
                        <p>{{ $user->first_name }} var sist aktiv for {{ $user->last_active_at->diffForHumans() }}.</p>
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
            <x-card>Kommende reservasjoner:</x-card>
        </div>
    </div>
</x-admin>
