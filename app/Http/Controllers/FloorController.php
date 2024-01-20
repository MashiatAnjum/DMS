<?php

namespace App\Http\Controllers;
use App\Models\Floor;
use App\Models\Building;
use Illuminate\Http\Request;

class FloorController extends Controller
{

    //-----------------------show data------------
    public function index()
    {
        $floors = Floor::all();
        return view('floors.index', compact('floors'));
    }
    //-----------------create---------------
    public function create()
    {
        $buildings= Building::all();

        return view('floors.create',['buildings'=>$buildings]);
    }

   //------------------------store-----------------------

   public function store(Request $request)
    {
        $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'floor_number' => 'required|string|max:255',
        ]);

        Floor::create([
            'building_id' => $request->input('building_id'),
            'floor_number' => $request->input('floor_number'),
        ]);

        return redirect()->route('floors.index')->with('success', 'Floor created successfully!');
    }

//------------------------Edit--------------------------
public function edit($id)
{
    $buildings = Building::all();
    $floor = Floor::findOrFail($id);
    return view('floors.edit', compact('floor','buildings'));
}


//-------------------update---------------

public function update(Request $request, $id)
{
    $request->validate([
        'building_id' => 'required|exists:buildings,id',
        'floor_number' => 'required|string|max:255',
    ]);

    $floor = Floor::findOrFail($id);

    $floor->update([
        'building_id' => $request->input('building_id'),
        'floor_number' => $request->input('floor_number'),
    ]);

    return redirect()->route('floors.index')->with('success', 'Floor updated successfully!');
}
//-----------------------------delete------------------
public function delete($id)
    {
        $floor = Floor::findOrFail($id);
        $floor->delete();

        return redirect()->route('floors.index')->with('success', 'Floor deleted successfully!');
    }


}
