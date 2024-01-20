<?php

// app/Http/Controllers/RoomController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Building;
use App\Models\Floor;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $buildings = Building::all();
        $floors = Floor::all();

        return view('rooms.create', compact('buildings', 'floors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'floor_id' => 'required|exists:floors,id',
            'room_number' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'room_capacity' => 'required|integer',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room created successfully!');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $buildings = Building::all();
        $floors = Floor::all();

        return view('rooms.edit', compact('room', 'buildings', 'floors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'floor_id' => 'required|exists:floors,id',
            'room_number' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'room_capacity' => 'required|integer',
        ]);

        $room = Room::findOrFail($id);
        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully!');
    }

    public function delete($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully!');
    }

    public function availableRooms()
    {
        $rooms = Room::all();
        $buildings = Building::all();
        return view('students.availableRoom', compact('rooms','buildings'));
    }

   public function fetchBuildings(){
    $buildings = Building::all(); 
    return response()->json( $buildings);
   }
   public function fetchFloors($id){
    $rooms=Floor::where('building_id',$id)->get();

    return response()->json($rooms); 
   }



}

