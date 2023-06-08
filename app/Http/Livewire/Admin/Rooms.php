<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Rooms extends Component
{
    public function render()
    {
        return view('livewire.admin.rooms',
        [
                'rooms' => \App\Models\Room::withCount('seats')->orderBy('name')->get()
        ]);
    }
}
