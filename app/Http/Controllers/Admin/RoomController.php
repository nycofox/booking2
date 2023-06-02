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
        //
    }

    public function show(Room $room)
    {
        return view('admin.room.show', [
            'room' => $room,
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
        //
    }

    public function destroy(Room $room)
    {
        //
    }

}
