@extends('app')

@section('content')

<div class="container mt-5">
    <h1 class="text-primary">Available Rooms<i class="fas fa-home"></i></h1>
    
    <table class="table table-bordered text-primary text-center table-hover table-striped">
        <thead>
            <tr>
                <th>Building Name</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Room Capacity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->building->building_name }}</td>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->room_capacity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection