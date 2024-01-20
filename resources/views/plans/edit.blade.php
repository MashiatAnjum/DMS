@extends('app')

@section('content')
    <div class="container">
        <h2>Edit Plan</h2>
        <form action="{{ route('plans.update', $plan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="plan_name" class="form-label">Plan Name</label>
                <input type="text" class="form-control" id="plan_name" name="plan_name" value="{{ $plan->plan_name }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $plan->price }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $plan->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="days" class="form-label">Number of Days</label>
                <input type="number" class="form-control" id="days" name="days" value="{{ $plan->days }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Plan</button>
        </form>
    </div>
@endsection
