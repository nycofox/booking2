<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Seat $seat, $date)
    {
        $room = $seat->room;

        return view('booking.create', [
            'seat' => $seat,
            'room' => $room,
            'date' => $date,
        ]);
    }

    public function store(Request $request, Seat $seat)
    {
        $booking = $seat->bookings()->create($this->validateRequest());

        return redirect()->route('seats.show', $seat);

    }

    private function validateRequest()
    {
        return request()->validate([
            'seat_id' => 'required|exists:seats,id',
            'user_id' => 'required|exists:users,id',
            'booked_from' => 'required|timestamp|after_or_equal:today|before_or_equal:today + 7days',
            'booked_to' => 'required|date|after_or_equal:booked_from|before_or_equal:booked_from + 1day',
            'request' => 'nullable|string',
        ]);
    }

}
