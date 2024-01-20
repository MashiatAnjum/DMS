<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserGurdianInfromation;
use Illuminate\Http\Request;





class UserGurdianInformationController extends Controller
{

    

    public function index()
{
        $userGuardianInformations = UserGurdianInfromation::with('user')->get();
        return view('user_guardian_informations.index', compact('userGuardianInformations'));
}

    public function create()
{
    $users = Auth::user();
    return view('user_guardian_informations.create', compact('users'));
}

public function edit($id)
{
    $userGuardianInformation = UserGurdianInfromation::findOrFail($id);
    $users = Auth::user();
    return view('user_guardian_informations.edit', compact('userGuardianInformation', 'users'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'fathers_name' => 'required|string',
        'fathers_mobile' => 'required|string',
        'mothers_name' => 'required|string',
        'mothers_mobile' => 'required|string',
        'local_gurdian_name' => 'required|string',
        'local_gurdian_mobile' => 'required|string',
        'local_gurdian_address' => 'required|string',
    ]);

    UserGurdianInfromation::create($validatedData);

    return redirect()->route('user_guardian_informations.index')->with('success', 'User Guardian Information created successfully.');
}



public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id',
        'fathers_name' => 'required|string',
        'fathers_mobile' => 'required|string',
        'mothers_name' => 'required|string',
        'mothers_mobile' => 'required|string',
        'local_gurdian_name' => 'required|string',
        'local_gurdian_mobile' => 'required|string',
        'local_gurdian_address' => 'required|string',
    ]);

    $userGuardianInformation = UserGurdianInfromation::findOrFail($id);
    $userGuardianInformation->update($validatedData);

    return redirect()->route('user_guardian_informations.index')->with('success', 'User Guardian Information updated successfully.');
}

public function destroy($id)
{
    $userGuardianInformation = UserGurdianInfromation::findOrFail($id);
    $userGuardianInformation->delete();

    return redirect()->route('user_guardian_informations.index')->with('success', 'User Guardian Information deleted successfully.');
}


}
