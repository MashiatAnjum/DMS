@extends('app')
@section('content')

<div class="container mt-2">
    
    <h2 class="text-primary">List Of Meals:</h2>
    

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table  class="table table-hover table-striped text-center text-primary">
        <thead>
            <tr>
                <th>Meal Type</th>
                <th>Start Time</th>
                <th>End Time</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($meals as $meal)
                <tr>
                    <td>{{ $meal->meal_type }}</td>
                    <td>{{ $meal->start_time }}</td>
                    <td>{{ $meal->end_time }}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
