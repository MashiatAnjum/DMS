@extends('app')

@section('content')

<div class="container">
    <h2>Student list with allocated rooms and seats</h2>
    <p>Room & Seat capacity 0 means capacity full</p>

    <div class="col-md-6 text-left pb-2">
        <a href="{{ route('allocations.create') }}" class="btn btn-outline-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
</div>

<div class="container">
    <table class="table table-hover table-striped text-center text-primary ">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Room Number</th>
                <th>Room Capacity</th>
                <th>Seat Number</th>
                <th>Seat Capacity</th>
                <th>Allocation Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allocations as $allocation)
            <tr>
                <td>{{ $allocation->user->name }}</td>
                <td>{{ $allocation->room->room_number }}</td>
                <td>{{ $allocation->room->room_capacity }}</td>
                <td>{{ $allocation->seat->seat_number }}</td>
                <td>{{ $allocation->seat->seat_capacity }}</td>
                <td>{{ $allocation->allocation_date }}</td>
                <td>
                    <a href="{{ route('allocations.edit', $allocation->id) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('allocations.destroy', $allocation->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
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
