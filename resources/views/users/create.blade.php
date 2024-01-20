@extends('app')
@section('content')
<div class="container mt-5">
    <h2>Create User</h2>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
       
        <!-- User Details -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <!-- Role Selection -->
        <div class="mb-3">
            <label for="role" class="form-label">Select Role</label>
            <select class="form-select form-control" id="role" name="role" required>
                <option value="" selected disabled>Select a role</option>
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="manager">Manager</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
@endsection