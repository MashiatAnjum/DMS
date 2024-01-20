<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    public function index()
    {
        $plans = Plan::all();

        return view('plans.index', compact('plans'));
    }
    public function create()
    {
        return view('plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'days' => 'required|integer',
        ]);

        Plan::create([
            'plan_name' => $request->input('plan_name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'days' => $request->input('days'),
        ]);

        return redirect()->route('plans.index')->with('success', 'Plan created successfully!');
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);

        return view('plans.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plan_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'days' => 'required|integer',
        ]);

        $plan = Plan::findOrFail($id);

        $plan->update([
            'plan_name' => $request->input('plan_name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'days' => $request->input('days'),
        ]);

        return redirect()->route('plans.index')->with('success', 'Plan updated successfully!');
    }

    public function destroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();

        return redirect()->route('plans.index')->with('success', 'Plan deleted successfully!');
    }
}
