@extends('app')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary">Building List <i class="fas fa-building"></i></h2>
    <div class="pb-2">
        <a href="{{ route('building.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"> Add new</i></a>
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
                <th>Building Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buildings as $building)
                <tr>
                    <td>{{ $building->id }}</td>
                    <td>{{ $building->building_name }}</td>
                    <td>
                        <a href="{{ route('building.edit', ['id' => $building->id]) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                        
                        <form method="POST" action="{{ route('building.delete', ['id' => $building->id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this building?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
