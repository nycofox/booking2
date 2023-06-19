<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function create(Room $room)
    {
        return view('admin.room.seat.create', [
            'room' => $room,
            'seat' => new Seat(['active' => true]),
        ]);
    }

    public function store(Request $request, Room $room)
    {
        $room->seats()->create($this->rules());

        return redirect()->route('rooms.show', $room);
    }

    public function edit(Room $room, Seat $seat)
    {
        return view('admin.room.seat.edit', [
            'room' => $room,
            'seat' => $seat,
        ]);
    }

    public function update(Request $request, Room $room, Seat $seat)
    {
        $seat->update($this->rules());

        return redirect()->route('rooms.show', $room);
    }

    public function destroy(Room $room, Seat $seat)
    {
        $seat->delete();

        return redirect()->route('admin.rooms.seats.index', $room);
    }

    private function rules()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $attributes['active'] = request()->has('active');
        $attributes['requires_approval'] = request()->has('requires_approval');

        return $attributes;
    }
}
