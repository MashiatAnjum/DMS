<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use App\Models\SelectPlan;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index($id)
    {
        
        $user=User::find($id);
        $select_plan=SelectPlan::where('user_id',$user->id)->first();
        $plan=Plan::find($select_plan->plan_id);
        return view('students.report', compact('plan','user'));
       
    
    }
}
