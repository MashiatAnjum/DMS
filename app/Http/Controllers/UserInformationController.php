<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\UserInformation;
use App\Models\Department;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserInformationController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $userInformation = UserInformation::where('user_id',$user->id)->with('user', 'batch', 'department')->first();
        
        //   dd($userInformation);
        return view('user_informations.index', compact('userInformation'));
    }



    public function create()
    {
        // Fetch data for dropdowns
        $users = Auth::user();
        $batches = Batch::all();
        $departments = Department::all();

        return view('user_informations.create', compact('users', 'batches', 'departments'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'batch_id' => 'required|exists:batches,id',
            'department_id' => 'required|exists:departments,id',
            'mobile' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'unique_id' => 'required|string',
            'religion' => 'nullable|string',
            'blood_group' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation for file types and size
        ]);

        // Create a new UserInformation instance
        $userInformation = new UserInformation;

        // Assign values from the form to the model instance
        $userInformation->user_id = $request->user_id;
        $userInformation->batch_id = $request->batch_id;
        $userInformation->department_id = $request->department_id;
        $userInformation->mobile = $request->mobile;
        $userInformation->dob = $request->dob;
        $userInformation->gender = $request->gender;
        $userInformation->unique_id = $request->unique_id;
        $userInformation->religion = $request->religion;
        $userInformation->blood_group = $request->blood_group;

        // Handle file upload if a photo is provided
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $userInformation->photo = $photoPath;
        }

        // Save the user information
        $userInformation->save();
        // Redirect to a success page or wherever you want
        return redirect()->route('user_informations.index')->with('success', 'User information added successfully.');
    }


    public function edit($id)
    {
        $userInformation = UserInformation::findOrFail($id);

        // You may fetch additional data for dropdowns if needed
        $users = Auth::user();
        $batches = Batch::all();
        $departments = Department::all();

        return view('user_informations.edit', compact('userInformation', 'users', 'batches', 'departments'));
    }


    public function update(Request $request, $id)
    {
        $userInformation = UserInformation::findOrFail($id);

        // Validate the form data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'batch_id' => 'required|exists:batches,id',
            'department_id' => 'required|exists:departments,id',
            'mobile' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'unique_id' => 'required|string',
            'religion' => 'nullable|string',
            'blood_group' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation for file types and size
        ]);

        // Update the user information
        $userInformation->update([
            'user_id' => $request->user_id,
            'batch_id' => $request->batch_id,
            'department_id' => $request->department_id,
            'mobile' => $request->mobile,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'unique_id' => $request->unique_id,
            'religion' => $request->religion,
            'blood_group' => $request->blood_group,
        ]);

        // Handle file upload if a new photo is provided
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $userInformation->update(['photo' => $photoPath]);
        }

        // Redirect to a success page or wherever you want
        return redirect()->route('user_informations.index')->with('success', 'User information updated successfully.');
    }

    
    public function destroy($id)
    {
        $userInformation = UserInformation::findOrFail($id);
        $userInformation->delete();

        // Redirect to a success page or wherever you want
        return redirect()->route('user_informations.index')->with('success', 'User information deleted successfully.');
    }



    public function personalinfo()
    {

        $user = Auth::user();
        
            $userInformation = UserInformation::where('user_id', $user->id)->get();

            return view('students.personalinfo', compact('userInformation'));
        
    }
}
