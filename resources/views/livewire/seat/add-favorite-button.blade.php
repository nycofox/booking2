<div>
    @if($is_favorite)
        <button wire:click="toggleFavorite" class="btn btn-success py-0 px-2">Favoritt</button>
    @else
        <button wire:click="toggleFavorite" class="btn btn-danger py-0 px-2">Favoritt</button>
    @endif
</div>
