<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class CheckinButton extends Component
{
    public function render()
    {
        return view('livewire.user.checkin-button');
    }

    public function toggleCheckin()
    {
        auth()->user()->toggleCheckin();
    }
}
