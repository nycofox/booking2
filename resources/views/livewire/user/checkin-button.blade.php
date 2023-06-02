<div>
    @if($user->isCheckedIn())
        <button wire:click="toggleCheckin" class="btn btn-danger">Sjekk ut</button>
    @else
        <button wire:click="toggleCheckin" class="btn btn-primary">Sjekk inn</button>
    @endif
</div>
