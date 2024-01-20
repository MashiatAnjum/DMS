@extends('app')

@section('content')
    <div class="container">
        <h2>Create a New Plan</h2>
        <form action="{{ route('plans.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="plan_name" class="form-label">Plan Name</label>
                <input type="text" class="form-control" id="plan_name" name="plan_name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="days" class="form-label">Number of Days</label>
                <input type="number" class="form-control" id="days" name="days" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Plan</button>
        </form>
    </div>
@endsection
