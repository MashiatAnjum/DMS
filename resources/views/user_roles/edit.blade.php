@extends('app')
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit User Role</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user_roles.update', ['id' => $userRole->id]) }}">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="role_name">Role Name:</label>
                                <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $userRole->role_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ $userRole->status }}" required>
                            </div>
                           <button type="submit" class="btn btn-primary">Update User Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
