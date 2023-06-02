<div>
    @if($is_admin && $user->id != auth()->user()->id)
        <button wire:click="toggleAdminRole" class="btn btn-danger">Fjern som adminsitrator</button>
    @elseif(!$is_admin && $user->id != auth()->user()->id)
        <button wire:click="toggleAdminRole" class="btn btn-success">Gjør til administrator</button>
    @else
        <butoon class="btn btn-secondary" disabled>Du kan ikke fjerne deg selv som administrator</butoon>
    @endif
</div>
