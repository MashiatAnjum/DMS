@extends('app')

@section('content')
<div class="container mt-5">
    <h2>Update</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- User Details -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">New Password (Optional)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- Role Selection -->
        <div class="mb-3">
            <label for="role" class="form-label">Select Role</label>
            <select class="form-select form-control" id="role" name="role" required>
                <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                <option value="student" {{ $user->hasRole('student') ? 'selected' : '' }}>Student</option>
                <option value="manager" {{ $user->hasRole('manager') ? 'selected' : '' }}>Manager</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
@endsection
