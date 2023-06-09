<?php

namespace App\Http\Livewire\Seat;

use Livewire\Component;

class AddFavoriteButton extends Component
{

    public $seat;

    public $is_favorite;

    public function render()
    {
        $this->is_favorite = auth()->user()->hasFavorite($this->seat->id);

        return view('livewire.seat.add-favorite-button');
    }

    public function toggleFavorite()
    {
        if($this->is_favorite) {
            auth()->user()->removeFavorite($this->seat->id);
        } else {
            auth()->user()->addFavorite($this->seat->id);
        }
    }
}
