@extends('app')

@section('content')
    <div class="container mt-4">
        <h2>User Role Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userRoles as $userRole)
                    <tr>
                        <td>{{ $userRole->id }}</td>
                        <td>{{ $userRole->role_name }}</td>
                        <td>{{ $userRole->status }}</td>
                        <td>
                            <a href="{{ route('user_roles.edit', ['id' => $userRole->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('user_roles.destroy', ['id' => $userRole->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user role?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
