@extends('app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ isset($floor) ? 'Edit Floor' : 'Create Floor' }}</div>

                    <div class="card-body">
                        @if(isset($floor))
                            <form method="POST" action="{{ route('floors.update', ['id' => $floor->id]) }}">
                                @method('PUT')
                        @else
                            <form method="POST" action="{{ route('floors.store') }}">
                        @endif
                            @csrf

                            <div class="form-group">
                                <label for="building_id">Building:</label>
                                <select class="form-control" id="building_id" name="building_id" required>
                                    <!-- Add options dynamically based on your building data -->
                                    @foreach($buildings as $building)
                                        <option value="{{ $building->id }}"
                                            @if(isset($floor) && $floor->building_id == $building->id)
                                                selected
                                            @endif
                                        >{{ $building->building_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="floor_number">Floor Number:</label>
                                <input type="text" class="form-control" id="floor_number" name="floor_number" value="{{ isset($floor) ? $floor->floor_number : '' }}" required>
                            </div>

                            <!-- Add more form fields as needed -->

                            <button type="submit" class="btn btn-primary">{{ isset($floor) ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection