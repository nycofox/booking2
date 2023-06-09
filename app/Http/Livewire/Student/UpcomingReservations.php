<?php

namespace App\Http\Livewire\Student;

use App\Models\User;
use Livewire\Component;

class UpcomingReservations extends Component
{

    public $user;

    public $name;

    public function render()
    {
        $this->setUser();

        return view('livewire.student.upcoming-reservations', [
            'bookings' => $this->user->upcomingBookings(),
            'name' => $this->name,
        ]);
    }
    private function setUser()
    {
        if (!$this->user) {
            $this->user = auth()->user();
            $this->name = 'Du';
        } else {
            $this->name = $this->user->firstname;
        }
    }

}
