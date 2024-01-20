@extends('app')
@section('content')
    <div class="container mt-4">
    <h2 class="text-primary">Room List <i class="fas fa-building"></i></h2>
        <div class="pb-2">
            <a href="{{ route('rooms.create') }}" class="btn btn-outline-primary">
                <i class="fas fa-plus"> Add new</i>
            </a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-hover table-striped  text-center text-primary ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Building Name</th>
                    <th>Floor Number</th>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Room Capacity</th>
                    <!-- Add more table headers for additional fields -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->building->building_name }}</td>
                        <td>{{ $room->floor->floor_number }}</td>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->room_type }}</td>
                        <td>{{ $room->room_capacity }}</td>
                        <!-- Add more table cells for additional fields -->
                        <td>
                            <a href="{{ route('rooms.edit', ['id' => $room->id]) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('rooms.delete', ['id' => $room->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this room?')">
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
