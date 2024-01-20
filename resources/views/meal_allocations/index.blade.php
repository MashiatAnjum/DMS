@extends('app')

@section('content')
<div class="container mt-2">
    <h2 class="text-primary">
        <i class="fas fa-utensils"></i> Meal Allocations
    </h2>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('meal.create') }}" class="btn btn-outline-primary mb-3">
        <i class="fas fa-plus"></i> Assign Meal
    </a>

    <table class="table table-hover table-striped table-sm text-center text-primary ">
        <thead>
            <tr>
                <th scope="col">
                    <i class="fas fa-user"></i> Student
                </th>
                <th scope="col">
                    <i class="fas fa-hamburger"></i> Meal Item
                </th>
                <th scope="col">
                    <i class="far fa-calendar-alt"></i> Date
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($mealAllocations as $mealAllocation)
                <tr>
                    <td>{{ $mealAllocation->user->name }}</td>
                    <td>{{ $mealAllocation->meal->meal_type }}</td>
                    <td>{{ $mealAllocation->assign_date }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No meal allocations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('meal.create') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>
@endsection
