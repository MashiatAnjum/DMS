@extends('app')

@section('content')

<div class="container mt-4">
<h2 class="mb-4 text-bold text-primary">
        <i class="fas fa-user-graduate"></i> Personal Information
    </h2>
    {{-- Add New Button --}}
    <!-- <div class="mb-3">
        <a href="{{ route('user_informations.create') }}" class="btn btn-outline-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div> -->

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($userInformation as $userInformation)
            <div class="col-md-4 mb-4">
                <div class="card bg-light">
                    <div class="card-header">
                        <h5 class="card-title">{{ $userInformation->user->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <strong>Batch:</strong> {{ $userInformation->batch->batch_name }}<br>
                            <strong>Department:</strong> {{ $userInformation->department->department_name }}<br>
                            <strong>Mobile:</strong> {{ $userInformation->mobile }}<br>
                            <strong>Date of Birth:</strong> {{ $userInformation->dob }}<br>
                            <strong>Gender:</strong> {{ $userInformation->gender }}<br>
                            <strong>Unique ID:</strong> {{ $userInformation->unique_id }}<br>
                            <strong>Religion:</strong> {{ $userInformation->religion }}<br>
                            <strong>Blood Group:</strong> {{ $userInformation->blood_group }}<br>
                            @if($userInformation->photo)
                                <img src="{{ asset('storage/' . $userInformation->photo) }}" alt="User Photo" class="img-fluid mt-2">
                            @else
                                No Photo
                            @endif
                        </p>
                    </div>
                    <div class="card-footer">
                        <div class="">
                            <a href="{{ route('user_informations.edit', $userInformation->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('user_informations.destroy', $userInformation->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="fas fa-trash"></i> 
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
