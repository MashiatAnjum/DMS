<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;

class BuildingController extends Controller
{

// -------------------Index for showing all the data----------------//

    public function index()
    {
        $buildings = Building::all(); 

        return view('buildings.index', compact('buildings'));
    }
// -------------------function building create page----------------//

public function create()
{
    return view('buildings.create');
}


// -------------------function building store page----------------//

    public function store(Request $request)
    {
        $request->validate([
            'building_name' => 'required|string|max:255',
            
        ]);

        Building::create([
            'building_name' => $request->input('building_name'),
            
        ]);

        return redirect()->route('building.index')->with('success', 'Building created successfully!');
    }

//---------------------- function for edit page-----------------------

public function edit($id)
    {
        $building = Building::findOrFail($id);
        return view('buildings.edit', compact('building'));
    }

// ------update-----------------------//


public function update(Request $request, $id)
    {
        $request->validate([
            'building_name' => 'required|string|max:255',    
        ]);

        $building = Building::findOrFail($id);

        $building->update([
            'building_name' => $request->input('building_name'),
        ]);

        return redirect()->route('building.index')->with('success','Building updated successfully!');
    }
  

    //-----------------------------------delete-----------------------//

    public function delete($id)
    {
        $building = Building::findOrFail($id);
        $building->delete();

        return redirect()->route('building.index')->with('success', 'Building deleted successfully!');
    }

}
