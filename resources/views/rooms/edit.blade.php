@extends('app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Room</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rooms.update', ['id' => $room->id]) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="building_id">Building:</label>
                                <select class="form-control" id="building_id" name="building_id" required>
                                    @foreach($buildings as $building)
                                        <option value="{{ $building->id }}"
                                            @if($room->building_id == $building->id) selected @endif
                                        >{{ $building->building_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="floor_id">Floor:</label>
                                <select class="form-control" id="floor_id" name="floor_id" required>
                                    @foreach($floors as $floor)
                                        <option value="{{ $floor->id }}"
                                            @if($room->floor_id == $floor->id) selected @endif
                                        >{{ $floor->floor_number }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="room_number">Room Number:</label>
                                <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $room->room_number }}" required>
                            </div>

                            <div class="form-group">
                                <label for="room_type">Room Type:</label>
                                <input type="text" class="form-control" id="room_type" name="room_type" value="{{ $room->room_type }}" required>
                            </div>

                            <div class="form-group">
                                <label for="room_capacity">Room Capacity:</label>
                                <input type="number" class="form-control" id="room_capacity" name="room_capacity" value="{{ $room->room_capacity }}" required>
                            </div>

                            <!-- Add more form fields as needed -->

                            <button type="submit" class="btn btn-primary">Update Room</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection