@extends('app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Seat</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('seats.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="room_id">Room:</label>
                                <select class="form-control" id="room_id" name="room_id" required>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_number }} ({{ $room->building->building_name }}, {{ $room->floor->floor_number }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="seat_number">Seat Number:</label>
                                <input type="text" class="form-control" id="seat_number" name="seat_number" required>
                            </div>
                            <div class="form-group">
                                <label for="Seat_capacity">Seat Capacity:</label>
                                <input type="number" class="form-control" id="room_capacity" name="seat_capacity" required>
                            </div>

                            <!-- Add more form fields as needed -->

                            <div class="container">
                         <div class="row">
                             <div class="col-md-6">
                               <button type="submit" class="btn btn-outline-primary">Create</button>
                             </div>
                               <div class="col-md-6 text-right">
                                <a href="/admin" class="btn btn-outline-primary">Back</a>
                               </div>
                            </div>
                       </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection