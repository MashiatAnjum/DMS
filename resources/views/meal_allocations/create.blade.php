@extends('app')

@section('content')
<div class="container mt-5">
    <h2 class="text-primary">Assigning Meal to Students <i class="fas fa-utensils"></i></h2>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('meal.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="meal_allocation_date" class="text-primary"><b>Meal Allocation Date</b> <i class="far fa-calendar-alt"></i>:</label>
            <input type="date" class="form-control" id="meal_allocation_date" name="assign_date" required>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mealItems" class="text-primary"><b>Meal Items</b> <i class="fas fa-hamburger"></i>:</label>
                    <select multiple data-actions-box="true" class="form-control selectpicker" id="meal_items" name="meals" required>
                        
                        @foreach($mealItems as $id => $meal_type)
                            <option value="{{ $id }}">{{ $meal_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mealItems" class="text-primary"><b>Students</b> <i class="fas fa-user"></i>:</label>
                    <select  multiple data-actions-box="true" class="form-control selectpicker" id="meal_items" name="users[]">
                    <option disabled value="">Select a Student</option>
                    @foreach($users as $user)
                     <option value="{{ $user->id }}">{{ $user->name }}</option>
    
                    @endforeach
                    </select>
                </div>
            </div>

            <!-- <div class="col-md-6">
                <div class="form-group">
                    <label for="users" class="text-info"><b> Users</b><i class="fas fa-users"></i>:</label>
                    <select>
                        <option value="">Select a user</option>
                    @foreach($users as $user)
                     <option value="{{ $user->id }}">>{{ $user->name }}</option>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="user_{{ $user->id }}" name="users[]" value="{{ $user->id }}">
                            <label class="form-check-label" for="user_{{ $user->id }}">{{ $user->name }} </label>
                        </div> 
                    @endforeach
                    </select>
                </div>
            </div> -->
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-utensil-spoon"></i> Assign Meal</button>
        </div>
    </form>
</div>
@endsection
