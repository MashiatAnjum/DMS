@extends('app')  

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Allocate Room and Seat To the students</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('allocations.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">Select Student:</label>

                                <select class="form-control" id="user_id" name="user_id" required>
                                <option value=""> Select a students name</option>
                                @foreach($students as $student)
                                <option value="{{$student->id }}">{{$student->name}}</option>
                                @endforeach
                                </select>
                       </div>
                       <div class="form-group">
                            <label for="user_id">Select room number:</label>

                                <select class="form-control" id="room_id" name="room_id" required>
                                <option value=""> Select room number</option>
                                @foreach($rooms as $room)
                                <option value="{{$room->id }}">{{$room->room_number}},({{ $room->building->building_name }}, {{ $room->floor->floor_number }})</option>
                                @endforeach
                                </select>
                      </div>

                      <div class="form-group">
                            <label for="user_id">Select seat number:</label>

                                <select class="form-control" id="user_id" name="seat_id" required>
                                <option value=""> Select seat number</option>
                                @foreach($seats as $seat)
                                <option value="{{$seat->id }}">{{$seat->seat_number}} </option>
                                @endforeach
                                </select>
                         </div>


                         <div class="form-group">
                            <label for="allocation_date">Allocation Date:</label>
                            <input type="date" class="form-control" id="allocation_date" name="allocation_date" required>
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Allocate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
