@extends('app')

@section('content')
<div class="container">
    <h2>Select a Plan:</h2>
    <form method="POST" action="{{ route('select_plans.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Select a Plan:</label>
            @foreach($plans as $plan)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="plan_id" value="{{ $plan->id }}" id="plan{{ $plan->id }}">
                <label class="form-check-label" for="plan{{ $plan->id }}">Name: {{ $plan->description }} Price: {{ $plan->price }}</label>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id" class="form-control">
                <!-- Populate this dropdown with user options if needed -->

                <option value="{{ $users->id }}">{{ $users->name }}</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection