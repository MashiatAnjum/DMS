
@extends('app')

@section('content')
<div class="container mt-2">
<h2 class="text-primary">User List <i class="fas fa-user"></i></h2>
    <a href="{{ route('users.create') }}" class="btn btn-outline-primary mb-3"><i class="fas fa-plus"></i> Create New User</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover table-striped table-sm text-center text-primary ">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->implode('name', ', ') }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

