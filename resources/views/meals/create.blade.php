@extends('app')
@section('content')
<div class="container mt-5">
    <h2>Create a New Meal</h2>

    <form action="{{ route('meals.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="meal_type" class="form-label">Meal Type</label>
            <input type="text" class="form-control" id="meal_type" name="meal_type" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" class="form-control" id="end_time" name="end_time" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection