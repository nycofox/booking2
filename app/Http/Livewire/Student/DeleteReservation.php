<?php

namespace App\Http\Livewire\Student;

use App\Models\Booking;
use Livewire\Component;

class DeleteReservation extends Component
{

    public $selectedBooking;

    public function render()
    {
        return view('livewire.student.delete-reservation');
    }

    public function destroyBooking($id)
    {
        $booking = Booking::find($id);

        if ($booking->user_id != auth()->user()->id && !auth()->user()->hasRole('admin')) {
            session()->flash('error', 'Du kan ikke slette andres reservasjoner.');
            return redirect()->back();
        }

        $booking->delete();
        session()->flash('success', 'Du har slettet reservasjonen din.');
        return redirect()->back();
    }

}
