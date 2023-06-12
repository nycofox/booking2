<?php

namespace App\Http\Livewire\Admin\Booking;

use App\Models\Booking;
use App\Models\Seat;
use App\Models\User;
use Livewire\Component;

class CreateManualBooking extends Component
{
    public $user_id;
    public $seat_id;
    public $booked_from;
    public $booked_to;

    protected $rules = [
        'user_id' => 'required|exists:users,id',
        'seat_id' => 'required|exists:seats,id',
        'booked_from' => 'required|date',
        'booked_to' => 'required|date|after:booked_from',
    ];

    public function render()
    {
        return view('livewire.admin.booking.create-manual-booking', [
            'users' => User::whereNull('anonymized_at')->orderBy('name')->get(['id', 'name']),
            'seats' => Seat::whereActive(true)->orderBy('name')->get(['id', 'name']),
        ]);
    }

    public function submit()
    {
        $this->validate();

        $booking = Booking::create([
            'user_id' => $this->user_id,
            'seat_id' => $this->seat_id,
            'booked_from' => $this->booked_from,
            'booked_to' => $this->booked_to,
            'approved_at' => now(),
            'approved_by' => auth()->id(),
        ]);

        session()->flash('success', 'Booking created successfully.');

        return redirect()->route('admin.dashboard');

    }

}
