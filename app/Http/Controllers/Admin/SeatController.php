<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index(Room $room)
    {
        return view('admin.seat.index', [
            'room' => $room,
        ]);
    }

    public function create(Room $room)
    {
        return view('admin.seat.create', [
            'room' => $room,
            'seat' => new Seat(),
        ]);
    }

    public function store(Request $request, Room $room)
    {
        $room->seats()->create($request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'active' => 'boolean',
            'requires_approval' => 'boolean',
        ]));

        return redirect()->route('admin.rooms.seats.index', $room);
    }

    public function edit(Room $room, Seat $seat)
    {
        return view('admin.seat.edit', [
            'room' => $room,
            'seat' => $seat,
        ]);
    }

    public function update(Request $request, Room $room, Seat $seat)
    {
        $seat->update($request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'active' => 'boolean',
            'requires_approval' => 'boolean',
        ]));

        return redirect()->route('admin.rooms.seats.index', $room);
    }

    public function destroy(Room $room, Seat $seat)
    {
        $seat->delete();

        return redirect()->route('admin.rooms.seats.index', $room);
    }
}
