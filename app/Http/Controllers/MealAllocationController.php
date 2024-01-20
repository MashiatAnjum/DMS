<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meal;
use App\Models\MealAllocation;

class MealAllocationController extends Controller
{
    
    public function index()
    {
        // Fetch meal allocations or any other data you want to display on the index page
        // $mealAllocations = MealAllocation::all();
        $mealAllocations = MealAllocation::orderBy('created_at', 'desc')->get();
      
        // $users = User::all();
        // $meals= Meal::all();

        // return view('meal_allocations.index', compact('mealAllocations','users','meals'));
        return view('meal_allocations.index', compact('mealAllocations'));
        
    }

    public function create()
    {
        $users = User::role('student')->get();
        $mealItems = Meal::pluck('meal_type','id'); 

        return view('meal_allocations.create', compact('users', 'mealItems'));

       
    }

    public function store(Request $request)
    {
        
        $selectedUserIds = $request->input('users', []);
       
        $selectedMealIds = $request->input('meals');
        foreach ($selectedUserIds as $key => $value) {

       
            $mealAllocation = new MealAllocation();
            $mealAllocation->user_id = $value;
            $mealAllocation->meal_id = $selectedMealIds;
            $mealAllocation->assign_date = $request->input('assign_date');
            $mealAllocation->save();
            
        }
        return redirect()->route('meal.index')->with('success', 'You have assigned meal successfully.');
    }

    




}
