<?php

namespace App\Http\Controllers;
use App\Models\Menue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenueController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('student')) {
            $menus = Menue::all();
            return view('students.viewMenue', compact('menus'));
        }
        else{
            $menus = Menue::all();
            return view('menues.index', compact('menus'));
        }
        
       
        
    }
    public function create()
    {
        return view('menues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|string',
            'breakfast' => 'required|string',
            'lunch' => 'required|string',
            'snacks' => 'required|string',
            'dinner' => 'required|string',
        ]);

        Menue::create([
            'day' => $request->input('day'),
            'breakfast' => $request->input('breakfast'),
            'lunch' => $request->input('lunch'),
            'snacks' => $request->input('snacks'),
            'dinner' => $request->input('dinner'),
        ]);

        return redirect()->route('menues.index')->with('success', 'Menu created successfully!');
    }


    public function edit($id)
    {
        $menu = Menue::findOrFail($id);
        return view('menues.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|string',
            'breakfast' => 'required|string',
            'lunch' => 'required|string',
            'snacks' => 'required|string',
            'dinner' => 'required|string',
        ]);

        $menu = Menue::findOrFail($id);

        $menu->update([
            'day' => $request->input('day'),
            'breakfast' => $request->input('breakfast'),
            'lunch' => $request->input('lunch'),
            'snacks' => $request->input('snacks'),
            'dinner' => $request->input('dinner'),
        ]);

        return redirect()->route('menues.index')->with('success', 'Menu updated successfully!');
    }

    public function destroy($id)
    {
        $menu = Menue::findOrFail($id);
        $menu->delete();

        return redirect()->route('menues.index')->with('success', 'Menu deleted successfully!');
    }

    public function viewMenue()
    {
        $menus = Menue::all();
        return view('students.viewMenue', compact('menus'));
    }


}
