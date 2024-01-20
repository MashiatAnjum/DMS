@extends('app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create User Role</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user_roles.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="role_name">Role Name:</label>
                                <input type="text" class="form-control" id="role_name" name="role_name" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Create User Role</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
