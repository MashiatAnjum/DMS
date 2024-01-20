@extends('app')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h2 class="text-primary">Plans <i class="fas fa-tasks"></i></h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Download Report Button -->
        <div class="mb-3">
            <a href="{{ route('report.index', ['id' => $user->id]) }}" class="btn btn-primary">
                Download Report <i class="fas fa-download"></i>
            </a>
        </div>

        <table class="table table-hover table-bordered text-center text-primary"  style="background-color: #f2f2f2;">
            <thead>
                <tr>
                   <th>User Name </th>
                    <th>Plan Name </th>
                    <th>Price </th>
                    <th>Description </th>
                    <th>Number of Days </th>
                    <th>Cancell Plan </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $plan->plan_name }}</td>
                    <td>{{ $plan->price }}</td>
                    <td>{{ $plan->description }}</td>
                    <td>{{ $plan->days }}</td>
                    <td>
                        <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
