<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        // $user = Auth::user();

        return view('users.index', compact('users'));
       
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,student,manager',
            'password' => 'required|string|min:6', 
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), 
        ]);
       
        $user->assignRole($request->input('role'));
        
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,student,manager',
            'password' => 'nullable|string|min:6', // Make password optional
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Update password only if provided
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        // Sync roles
        $user->syncRoles([$request->input('role')]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }
    
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    









////////function for viewing only the students////////
    public function studentsIndex()
  {

      $studentRole = Role::where('name', 'student')->first();

      if ($studentRole) {

          $students = $studentRole->users;
      } else {

          $students = collect(); 
      }

      return view('students.index', ['students' => $students]);
  }



}
