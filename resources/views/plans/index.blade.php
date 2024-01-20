@extends('app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h2 class="text-primary">Plans <i class="fas fa-tasks"></i></h2>
            <a href="{{ route('plans.create') }}" class="btn btn-outline-primary">
                <i class="fas fa-plus"></i> Add new
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-hover table-bordered text-center text-primary"  style="background-color: #f2f2f2;">
            <thead>
                <tr>
                    <th>Plan Name <i class="fas fa-check-square"></i></th>
                    <th>Price <i class="fas fa-dollar-sign"></i></th>
                    <th>Description <i class="fas fa-info-circle"></i></th>
                    <th>Number of Days <i class="fas fa-sort"></i></th>
                    <th>Actions <i class="fas fa-cogs"></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                    <tr>
                        <td>{{ $plan->plan_name }}</td>
                        <td>{{ $plan->price }}</td>
                        <td>{{ $plan->description }}</td>
                        <td>{{ $plan->days }}</td>
                        <td>
                            <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
