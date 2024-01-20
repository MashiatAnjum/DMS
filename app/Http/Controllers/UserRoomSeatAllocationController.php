<?php

namespace App\Http\Controllers;

use App\Models\UserRoomSeatAllocation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Room;
use App\Models\Seat;
use App\Models\User;

class UserRoomSeatAllocationController extends Controller
{
    public function index()
    {
        $allocations = UserRoomSeatAllocation::all();

        return view('allocations.index', compact('allocations'));
    }

    public function create()
    {
    
        $rooms=Room::where('room_capacity', '>', 0)->get(); 
        $seats = Seat::where('seat_capacity', '>', 0)->get();       
        $students = Role::where('name', 'student')
        ->first()
        ->users()
        ->doesntHave('userRoomSeatAllocations')
        ->get();
        return view('allocations.create', compact('students','rooms','seats'));

       
    }

    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'room_id' => 'required|exists:rooms,id',
        'seat_id' => 'required|exists:seats,id',
        'allocation_date' => 'required|date',
    ]);

    $user = User::find($request->input('user_id'));
    $room = Room::find($request->input('room_id'));
    $seat = Seat::find($request->input('seat_id'));

    

    // Check if the user, room, and seat exist
    if (!$user || !$room || !$seat) {
        return redirect()->back()->with('error', 'Invalid user, room, or seat selected.');
    }

    if($seat->seat_capacity > 0){
          
        UserRoomSeatAllocation::create([
            'user_id' => $user->id,
            'room_id' => $room->id,
            'seat_id' => $seat->id,
            'allocation_date' => $request->input('allocation_date'),
        ]);
        
        $seat->decrement('seat_capacity');
        $room->decrement('room_capacity');
        $seat->save();
    }
    

    return redirect()->route('allocations.index')->with(['success' => 'Allocation successful']);
}

    


    public function edit($id)
    {
        
        // You may want to pass data needed for the form, e.g., users, rooms, seats
        $allocation=UserRoomSeatAllocation::findOrFail($id);
        $rooms=Room::all();
        $seats = Seat::all();      
        $students = User::role('student')->get();
        return view('allocations.edit', compact('allocation','students','seats','rooms'));
        
    }

    public function update(Request $request, UserRoomSeatAllocation $allocation)
    {
        $request->validate([
            'user_id' => 'required',
            'room_id' => 'required',
            'seat_id' => 'required',
            'allocation_date' => 'required|date',
            // Add other validation rules as needed
        ]);

        $allocation->update($request->all());

        return redirect()->route('allocations.index')
            ->with('success', 'Allocation updated successfully.');
    }

    public function destroy(UserRoomSeatAllocation $allocation)
    {
        $allocation->delete();

        return redirect()->route('allocations.index')
            ->with('success', 'Allocation deleted successfully.');
    }


    public function fetchRooms(){
        $rooms = Room::all(); 
        return response()->json( $rooms);
       }
       public function fetchSeatss($id){
        $seats=Seat::where('seat_id',$id)->get();
    
        return response()->json($seats); 
       }


       

}
