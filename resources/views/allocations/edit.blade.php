@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Room and Seat Allocation</div>

                    <div class="card-body">
                    <form method="POST" action="">

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="user_id">Select Student:</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="room_id">Select Room:</label>
                                <select class="form-control" id="room_id" name="room_id" required>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}" {{ $allocation->room_id == $room->id ? 'selected' : '' }}>
                                            {{ $room->room_number }}, ({{ $room->building->building_name }}, {{ $room->floor->floor_number }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="seat_id">Select Seat:</label>
                                <select class="form-control" id="seat_id" name="seat_id" required>
                                    @foreach($seats as $seat)
                                        <option value="{{ $seat->id }}" {{ $allocation->seat_id == $seat->id ? 'selected' : '' }}>
                                            {{ $seat->seat_number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="allocation_date">Allocation Date:</label>
                                <input type="date" class="form-control" id="allocation_date" name="allocation_date" value="{{ $allocation->allocation_date }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Allocation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
