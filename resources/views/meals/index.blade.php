@extends('app')
@section('content')

<div class="container mt-2">
    
    <h2 class="text-primary">List Of Meals:</h2>
    <div class="pb-2">
        <a href="{{ route('meals.create') }}" class="btn btn-outline-primary">
            <i class="fas fa-plus"></i> Create
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table  class="table table-hover table-striped text-center text-primary">
        <thead>
            <tr>
                <th>Meal Type</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($meals as $meal)
                <tr>
                    <td>{{ $meal->meal_type }}</td>
                    <td>{{ $meal->start_time }}</td>
                    <td>{{ $meal->end_time }}</td>
                    <td>
                        <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('meals.destroy', $meal->id) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
