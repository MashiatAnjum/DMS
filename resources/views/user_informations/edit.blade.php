
@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User Information</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user_informations.update', $userInformation->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                
                            <option value="{{ $users->id }}">{{ $users->name }}</option>
                               
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="batch_id">Batch</label>
                            <select class="form-control" id="batch_id" name="batch_id">
                                @foreach($batches as $batch)
                                    <option value="{{ $batch->id }}" {{ $batch->id == $userInformation->batch_id ? 'selected' : '' }}>{{ $batch->batch_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="department_id">Department</label>
                            <select class="form-control" id="department_id" name="department_id">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ $department->id == $userInformation->department_id ? 'selected' : '' }}>{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $userInformation->mobile }}" required>
                        </div>

                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="{{ $userInformation->dob }}" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male" {{ $userInformation->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $userInformation->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <!-- Add other gender options as needed -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="unique_id">Unique ID</label>
                            <input type="text" class="form-control" id="unique_id" name="unique_id" value="{{ $userInformation->unique_id }}" required>
                        </div>

                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <input type="text" class="form-control" id="religion" name="religion" value="{{ $userInformation->religion }}">
                        </div>

                        <div class="form-group">
                            <label for="blood_group">Blood Group</label>
                            <input type="text" class="form-control" id="blood_group" name="blood_group" value="{{ $userInformation->blood_group }}">
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
