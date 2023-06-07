<div>
    @if($user->isCheckedIn())
        <button wire:click="checkOut" class="btn btn-danger">Sjekk ut</button>
    @else
        <button wire:click="checkIn" class="btn btn-primary">Sjekk inn</button>
    @endif
</div>
