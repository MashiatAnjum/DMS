@extends('app')

@section('content')
<div class="container mt-5">
<h2 class="text-primary">Students List <i class="fas fa-user-graduate"></i></h2>
    <table class="table table-hover table-striped table-sm text-center text-primary ">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
