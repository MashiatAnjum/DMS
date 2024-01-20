@extends('app')
@section('content')
    <div class="container mt-4">
    <h2 class="text-primary">Seat List <i class="fas fa-building"></i></h2>
        <div class="pb-2">
        <a href="{{ route('seats.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add new</a>
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
                    <th>Room</th>
                    <th>Seat Number</th>
                    <th>Seat Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($seats as $seat)
                    <tr>
                        <td>{{ $seat->id }}</td>
                        <td>{{ $seat->room->room_number }} ({{ $seat->room->building->building_name }}, {{ $seat->room->floor->floor_number }})</td>
                        <td>{{ $seat->seat_number }}</td>
                        <td>{{ $seat->seat_capacity }}</td>
                        <!-- Add more table cells for additional fields -->
                        <td>
                            <a href="{{ route('seats.edit', ['id' => $seat->id]) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('seats.destroy', ['id' => $seat->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this seat?')">
                                <i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection