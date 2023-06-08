<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.room.index', [
            'rooms' => Room::all(),
        ]);
    }

    public function create()
    {
        return view('admin.room.create', [
            'room' => new Room(),
        ]);
    }

    public function store(Request $request)
    {
        $room = Room::create(
            $request->validate($this->rules())
        );

        return redirect()->route('rooms.show', $room);
    }

    public function show(Room $room)
    {
        return view('admin.room.show', [
            'room' => $room,
            'seats' => $room->seats()->orderBy('name')->get(),
        ]);
    }

    public function edit(Room $room)
    {
        return view('admin.room.edit', [
            'room' => $room,
        ]);
    }

    public function update(Request $request, Room $room)
    {
        $room->update($request->validate($this->rules()));

        return redirect()->route('rooms.show', $room);
    }

    public function destroy(Room $room)
    {
        //
    }

    private function rules()
    {
        return [
            'name' => 'required|unique:rooms|max:100',
            'description' => 'nullable',
            'seat_map_url' => 'nullable|url',
            'bookable_from' => 'required',
            'bookable_to' => 'required',
        ];
    }

}
