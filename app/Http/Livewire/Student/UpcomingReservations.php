<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class UpcomingReservations extends Component
{
    public function render()
    {
        return view('livewire.student.upcoming-reservations', [
            'bookings' => $this->bookings(),
        ]);
    }

    private function bookings()
    {
        return auth()->user()->bookings()->where('booked_from', '>', now())->get();
    }
}
