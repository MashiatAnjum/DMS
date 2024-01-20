<!-- resources/views/edit-building.blade.php -->

@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Building</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('building.update', ['id' => $building->id]) }}">
                            @csrf
                            <input type="hidden" value="{{ $building->id }}">

                            <div class="form-group">
                                <label for="inputName">Building Name:</label>
                                <input type="text" class="form-control" id="inputName" name="building_name" value="{{ $building->building_name }}" required>
                            </div>

                            <!-- Add more form fields as needed -->

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
