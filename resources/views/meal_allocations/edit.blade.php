@extends('app')

@section('content')
<div class="container mt-5">
    <h2 class="text-primary">Edit Meal Assignment <i class="fas fa-utensils"></i></h2>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('meal.update', $mealAssignment->id) }}" method="post">
        @csrf
        @method('PUT') {{-- Use the appropriate HTTP method for updating, e.g., PUT or PATCH --}}

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mealItems" class="text-info"><b>Meal Items</b> <i class="fas fa-hamburger"></i>:</label>
                    @foreach($mealItems as $id => $meal_type)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="meal_item_{{ $id }}" name="meal_items[]" value="{{ $id }}" @if(in_array($id, $selectedMealItems)) checked @endif>
                            <label class="form-check-label" for="meal_item_{{ $id }}">{{ $meal_type }} <i class="fas fa-check-square"></i></label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="users" class="text-info"><b> Users</b><i class="fas fa-users"></i>:</label>
                    @foreach($users as $user)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="user_{{ $user->id }}" name="users[]" value="{{ $user->id }}" @if(in_array($user->id, $selectedUsers)) checked @endif>
                            <label class="form-check-label" for="user_{{ $user->id }}">{{ $user->name }} <i class="fas fa-user"></i></label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fas fa-utensil-spoon"></i> Update Meal Assignment</button>
        </div>
    </form>
</div>
@endsection
