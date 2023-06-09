<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Seat $seat, $date)
    {
        return view('booking.create', [
            'seat' => $seat,
            'date' => $date,
        ]);
    }

    public function store(Request $request, Seat $seat)
    {
        $seat->book([
            'user' => auth()->user(),
            'starts_at' => $request->booked_from,
            'ends_at' => $request->booked_to,
        ]);

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
