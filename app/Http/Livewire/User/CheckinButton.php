<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class CheckinButton extends Component
{

    public $user;

    public function render()
    {
        return view('livewire.user.checkin-button');
    }

//    public function toggleCheckin()
//    {
//        $this->user->toggleCheckin();
//    }

    public function checkIn()
    {
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Du har sjekket inn!']);

        $this->user->toggleCheckin();
    }

    public function checkOut()
    {
        $this->dispatchBrowserEvent('alert',
            ['type' => 'warning',  'message' => 'Du har sjekket ut!']);

        $this->user->toggleCheckin();
    }
}
