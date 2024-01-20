@extends('app')

@section('content')
<div class="container">
    <h2 class="text-primary">Floor List <i class="fas fa-building"></i></h2>
    <div class="pb-2">
        <a href="{{ route('floors.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add new</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover table-striped table-sm text-center text-primary ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Building</th>
                <th>Floor Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($floors as $floor)
                <tr>
                    <td>{{ $floor->id }}</td>
                    <td>{{ $floor->building->building_name }} </i></td>
                    <td>{{ $floor->floor_number }}</td>
                    <td>
                        <a href="{{ route('floors.edit', ['id' => $floor->id]) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('floors.delete', ['id' => $floor->id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this floor?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
