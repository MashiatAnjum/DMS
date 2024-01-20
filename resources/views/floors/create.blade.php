@extends('app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Floor</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('floors.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="building_id">Building:</label>
                                <select class="form-control" id="building_id" name="building_id" required>
                                <option value="0"> Select Building Name</option>
                                <!-- @foreach($buildings as $buildingItem)
                                <option value="{{$buildingItem->id}}">{{$buildingItem ->building_name}}</option>
                                @endforeach -->
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="floor_number">Floor Number:</label>
                                <input type="text" class="form-control" id="floor_number" name="floor_number" required>
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