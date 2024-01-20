<?php

namespace App\Http\Controllers;

use App\Models\SelectPlan;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SelectPlanController extends Controller
{

    public function index(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $plan = Plan::find($request->input('plan_id'));
        return view('select_plans.index', compact('plan', 'user'));
    }

    public function create()
    {
        $plans = Plan::all();
        $users = Auth::user();
        return view('select_plans.create', compact('plans', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'user_id' => 'required|numeric',
        ]);

        SelectPlan::updateOrCreate(
            ['user_id' => $request->input('user_id')],
            ['plan_id' => $request->input('plan_id')]
        );
        $user = User::find($request->input('user_id'));
        $plan = Plan::find($request->input('plan_id'));
        return view('select_plans.index', compact('plan', 'user'));
    }
}
