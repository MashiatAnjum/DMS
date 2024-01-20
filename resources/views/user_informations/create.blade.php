<!-- resources/views/create.blade.php -->

@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add User Information</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user_informations.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control" id="user_id" name="user_id">
                             
                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="batch_id">Batch</label>
                            <select class="form-control" id="batch_id" name="batch_id">
                            <option value="0">Batch</option> 
                            @foreach($batches as $batch)
                            <option value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="department_id">Department</label> 
                            <select class="form-control" id="department_id" name="department_id">
                            <option value="0">Select a Depertment</option>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <!-- Add other gender options as needed -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="unique_id">Unique ID</label>
                            <input type="text" class="form-control" id="unique_id" name="unique_id" required>
                        </div>

                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" id="religion" name="religion">
                        </div>

                        <div class="form-group">
                            <label for="blood_group">Blood Group</label>
                            <input type="text" class="form-control" id="blood_group" name="blood_group">
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
