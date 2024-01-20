@extends('app')
@section('content')
 
<div class="container mt-5">
    <h2>Edit Meal</h2>

    <form action="{{ route('meals.update', $meal->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="meal_type" class="form-label">Meal Type</label>
            <input type="text" class="form-control" id="meal_type" name="meal_type" value="{{ $meal->meal_type }}" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $meal->start_time }}" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $meal->end_time }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection