<?php

// app/Http/Controllers/SeatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\Room;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::all();
        return view('seats.index', compact('seats'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('seats.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'seat_number' => 'required|string|max:255',
            'seat_capacity' => 'required|string|max:255',
        ]);

        Seat::create($request->all());

        return redirect()->route('seats.index')->with('success', 'Seat created successfully!');
    }

    public function edit($id)
    {
        $seat = Seat::findOrFail($id);
        $rooms = Room::all();

        return view('seats.edit', compact('seat', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'seat_number' => 'required|string|max:255',
            'seat_capacity' => 'required|string|max:255',
        ]);

        $seat = Seat::findOrFail($id);
        $seat->update($request->all());

        return redirect()->route('seats.index')->with('success', 'Seat updated successfully!');
    }

    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);
        $seat->delete();

        return redirect()->route('seats.index')->with('success', 'Seat deleted successfully!');
    }
}
