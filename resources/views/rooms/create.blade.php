@extends('app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Room</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rooms.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="building_id">Building:</label>
                                <select class="form-control" id="building_id" name="building_id" required>
                                    <option id="default_select" value="">Select Building</option>
                                    <!-- @foreach($buildings as $building)
                                        <option value="{{ $building->id }}">{{ $building->building_name }}</option>
                                    @endforeach -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="floor_id">Floor:</label>
                                <select class="form-control" id="floor_id" name="floor_id" required>
                                    <!-- @foreach($floors as $floor)
                                        <option value="{{ $floor->id }}">{{ $floor->floor_number }}</option>
                                    @endforeach -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="room_number">Room Number:</label>
                                <input type="text" class="form-control" id="room_number" name="room_number" required>
                            </div>

                            <div class="form-group">
                                <label for="room_type">Room Type:</label>
                                <input type="text" class="form-control" id="room_type" name="room_type" required>
                            </div>

                            <div class="form-group">
                                <label for="room_capacity">Room Capacity:</label>
                                <input type="number" class="form-control" id="room_capacity" name="room_capacity" required>
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