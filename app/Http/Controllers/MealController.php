<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Support\Facades\Auth;

class MealController extends Controller
{
    public function index()
    {   

        $user = Auth::user();
        if ($user->hasRole('student')) {
            $meals = Meal::all();
        return view('students.mealtime', compact('meals')); 
        } 
        else {
        $meals = Meal::all();
        return view('meals.index', compact('meals'));
        }
    }



    public function create()
    {
        return view('meals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'meal_type' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Meal::create($request->all());

        return redirect()->route('meals.index')->with('success', 'Meal created successfully');
    }
    // public function show(Meal $meal)
    // {
    //     return view('meals.show', compact('meal'));
    // }

    public function edit(Meal $meal)
    {
        return view('meals.edit', compact('meal'));
    }

    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'meal_type' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $meal->update($request->all());

        return redirect()->route('meals.index')->with('success', 'Meal updated successfully');
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();

        return redirect()->route('meals.index')->with('success', 'Meal deleted successfully');
    }
}
