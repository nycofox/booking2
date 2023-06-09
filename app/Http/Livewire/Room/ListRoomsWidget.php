<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class ListRoomsWidget extends Component
{
    public function render()
    {
        return view('livewire.room.list-rooms-widget', [
            'rooms' => Room::whereActive(true)->orderBy('name')->withCount('seats')->get(),
            'favorite_seats' => auth()->user()->favorites()->with('room')->orderBy('name')->get(),
        ]);
    }
}
