<div>
    @if(auth()->user()->isCheckedIn())
        <button wire:click="toggleCheckin" class="btn btn-danger">Check Out</button>
    @else
        <button wire:click="toggleCheckin" class="btn btn-primary">Check In</button>
    @endif
</div>
