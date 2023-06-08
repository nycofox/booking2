<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function show(Room $room, $date=null)
    {
        if(!$date) {
            return redirect()->route('booking.room.show', [$room, date('Y-m-d')]);
        }

        return view('rooms.show', [
            'room' => $room,
            'seats' => $room->seats()->orderBy('name')->bookingsDate($date)->get(),
            'date' => $date,
        ]);
    }

}
