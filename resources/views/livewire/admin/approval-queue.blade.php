<x-card title="Reservasjoner til godkjenning">
    @forelse($approvals as $approval)
        <div class="d-flex justify-content-between align-items-center">
            <div class="bg-light-subtle">
                <strong>{{ $approval->seat->name }}</strong> - {{ $approval->booked_from->format('Y-m-d H:i') }} -
                {{ $approval->booked_to->format('H:i') }} {{ $approval->user->name }}<br>
                <small>{{ $approval->request }}</small>
            </div>
            <div>
                <button class="btn btn-sm btn-success">Godkjenn</button>
                <button class="btn btn-sm btn-danger">Avvis</button>
            </div>
        </div>
    @empty
        <p>Det er ingen reservasjoner som venter på godkjenning for øyeblikket.</p>
    @endforelse
</x-card>
