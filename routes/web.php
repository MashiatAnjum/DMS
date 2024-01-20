<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('homepage');
});

Route::get('/h', function () {
    return view('homelayout');
});




//////////////////////////////////////////////////////######################




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('Admin.admindashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::get('/test', function () {
        return view('');
    });
    Route::get('/home', function () {
        return view('home');
    });

    ///--------------------------------------------Admin---------------------------------

    Route::get('/admin', function () {
        return view('Admin.admindashboard');
    });



    //--------------------------------------------Building-------------------------------------------
    Route::get('/building', [BuildingController::class, 'index'])->name('building.index');
    Route::get('/building/create', [BuildingController::class, 'create'])->name('building.create');
    Route::post('/building', [BuildingController::class, 'store'])->name('building.store');
    Route::get('/building/edit/{id}', [BuildingController::class, 'edit'])->name('building.edit');
    Route::post('/building/update/{id}', [BuildingController::class, 'update'])->name('building.update');
    Route::delete('/building/delete/{id}', [BuildingController::class, 'delete'])->name('building.delete');
    //--------------------------------------------Floor-------------------------------------------

    Route::get('/floors', [FloorController::class, 'index'])->name('floors.index');
    Route::get('/floors/create', [FloorController::class, 'create'])->name('floors.create');
    Route::post('/floors', [FloorController::class, 'store'])->name('floors.store');
    Route::get('/floors/{id}/edit', [FloorController::class, 'edit'])->name('floors.edit');
    Route::put('/floors/{id}', [FloorController::class, 'update'])->name('floors.update');
    Route::delete('/floors/{id}', [FloorController::class, 'delete'])->name('floors.delete');

    ///-----------------------------------------Room-----------------------------------------------
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
    Route::get('/availableRooms', [RoomController::class, 'availableRooms'])->name('availableRooms.availableRooms');
    Route::delete('/rooms/{id}', [RoomController::class, 'delete'])->name('rooms.delete');
    Route::get('/floors-fetch/{id}', [RoomController::class, 'fetchFloors'])->name('floorsFetch');
    Route::get('/buildings-fetch', [RoomController::class, 'fetchBuildings'])->name('buildingsFetch');
    ///-----------------------------------------Seat-----------------------------------------------

    Route::get('/seats', [SeatController::class, 'index'])->name('seats.index');
    Route::get('/seats/create', [SeatController::class, 'create'])->name('seats.create');
    Route::post('/seats', [SeatController::class, 'store'])->name('seats.store');
    Route::get('/seats/{id}/edit', [SeatController::class, 'edit'])->name('seats.edit');
    Route::put('/seats/{id}', [SeatController::class, 'update'])->name('seats.update');
    Route::delete('/seats/{id}', [SeatController::class, 'destroy'])->name('seats.destroy');


    //-----------------------------------Room seat Allocation--------------------------------------
    Route::get('/allocations', [UserRoomSeatAllocationController::class, 'index'])->name('allocations.index');
    Route::get('/allocations/create', [UserRoomSeatAllocationController::class, 'create'])->name('allocations.create');
    Route::post('/allocations/store', [UserRoomSeatAllocationController::class, 'store'])->name('allocations.store');
    Route::get('/allocations/{allocation}/edit', [UserRoomSeatAllocationController::class, 'edit'])->name('allocations.edit');
    Route::put('/allocations/{allocation}', [UserRoomSeatAllocationController::class, 'update'])->name('allocations.update');
    Route::delete('/allocations/{allocation}', [UserRoomSeatAllocationController::class, 'destroy'])->name('allocations.destroy');
    Route::get('/seats-fetch/{id}', [UserRoomSeatAllocationController::class, 'fetchseats'])->name('seatsFetch');
    Route::get('/rooms-fetch', [UserRoomSeatAllocationController::class, 'fetchRooms'])->name('roomsFetch');

    //------------------------------------user-Module---------------------------------------
    //------------------------------------Create-users---------------------------------------
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    //----------------------------------User-info-------------------------

    Route::get('/user_informations', [UserInformationController::class, 'index'])->name('user_informations.index');
    Route::get('/user_informations/create', [UserInformationController::class, 'create'])->name('user_informations.create');
    Route::post('/user_informations/store', [UserInformationController::class, 'store'])->name('user_informations.store');
    Route::get('user_informations/{id}/edit', [UserInformationController::class, 'edit'])->name('user_informations.edit');
    Route::put('user_informations/{id}', [UserInformationController::class, 'update'])->name('user_informations.update');
    Route::delete('user_informations/{id}', [UserInformationController::class, 'destroy'])->name('user_informations.destroy');
    Route::get('/students', [UserController::class, 'studentsIndex'])->name('students.index');
    Route::get('/personalInfo', [UserInformationController::class, 'personalinfo'])->name('info.index');
    //////------------------------user-gurdian-info----------------------------------
    Route::get('user_guardian_informations', [UserGurdianInformationController::class, 'index'])->name('user_guardian_informations.index');
    Route::get('user_guardian_informations/create', [UserGurdianInformationController::class, 'create'])->name('user_guardian_informations.create');
    Route::post('user_guardian_informations', [UserGurdianInformationController::class, 'store'])->name('user_guardian_informations.store');
    Route::get('user_guardian_informations/{id}/edit', [UserGurdianInformationController::class, 'edit'])->name('user_guardian_informations.edit');
    Route::put('user_guardian_informations/{id}', [UserGurdianInformationController::class, 'update'])->name('user_guardian_informations.update');
    Route::delete('user_guardian_informations/{id}', [UserGurdianInformationController::class, 'destroy'])->name('user_guardian_informations.destroy');



    //-------------------------------------Module= Meal Management---------------------------------------
    // --------------------------------------------Meals--------------------------------------------------
    Route::get('/meals', [MealController::class, 'index'])->name('meals.index');
    Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');
    Route::post('/meals', [MealController::class, 'store'])->name('meals.store');
    // Route::get('/meals/{meal}', [MealController::class, 'show'])->name('meals.show');
    Route::get('/meals/{meal}/edit', [MealController::class, 'edit'])->name('meals.edit');
    Route::put('/meals/{meal}', [MealController::class, 'update'])->name('meals.update');
    Route::delete('/meals/{meal}', [MealController::class, 'destroy'])->name('meals.destroy');


    // --------------------------------------------Meal-Allocations--------------------------------------------------


    Route::get('/meal_allocation', [MealAllocationController::class, 'index'])->name('meal.index');
    Route::get('/meal_allocation/create', [MealAllocationController::class, 'create'])->name('meal.create');
    Route::post('/meal_allocation/store', [MealAllocationController::class, 'store'])->name('meal.store');


    // ---------------------------Meal menue Items---------------------------
    Route::get('/menues/create', [MenueController::class, 'create'])->name('menues.create');
    Route::post('/menues', [MenueController::class, 'store'])->name('menues.store');
    Route::get('/menues', [MenueController::class, 'index'])->name('menues.index');
    Route::get('/menues/{id}/edit', [MenueController::class, 'edit'])->name('menues.edit');
    Route::put('/menues/{id}', [MenueController::class, 'update'])->name('menues.update');
    Route::delete('/menues/{id}', [MenueController::class, 'destroy'])->name('menues.destroy');
    Route::get('/viewMenue', [MenueController::class, 'viewMenue'])->name('menues.index');

    //----------------------------------Plans----------------------------------------

    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/plans/{id}', [PlanController::class, 'update'])->name('plans.update');
    Route::delete('/plans/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');


    /////////---------------selectplans-------------------
    Route::get('/select_plans/create', [SelectPlanController::class, 'create'])->name('select_plans.create');

    Route::post('/select_plans', [SelectPlanController::class, 'store'])->name('select_plans.store');
    //////////////---------report--------------------- ///////////////////////////////
    Route::get('/report/{id}', [ReportController::class, 'index'])->name('report.index');
});

require __DIR__ . '/auth.php';
