@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="text-primary">
                Weekly Menu<i class="fas fa-utensils"></i>
            </h2>
            <div class="mb-3">
                <a href="{{ route('menues.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Create New Menu</a>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(count($menus) > 0)
            <div class="table-responsive">
                <table class="table table-bordered text-center text-primary">
                    <thead class="thead-dark">
                        <tr>
                            <th>Day</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Snacks</th>
                            <th>Dinner</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->day }}</td>
                            <td>{{ $menu->breakfast }}</td>
                            <td>{{ $menu->lunch }}</td>
                            <td>{{ $menu->snacks }}</td>
                            <td>{{ $menu->dinner }}</td>
                            <td>
                                <div class="btn-group" role="group ">
                                    <a href="{{ route('menues.edit', $menu->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('menues.destroy', $menu->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info">
                No menus available.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection