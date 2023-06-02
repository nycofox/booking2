<div>
    @if($is_candidate)
        <button wire:click="toggleCandidate" class="btn btn-danger">Fjern som min deltaker</button>
    @else
        <button wire:click="toggleCandidate" class="btn btn-success">Gjør til min deltaker</button>
    @endif
</div>
