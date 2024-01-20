@extends('app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-users text-primary"></i> {{ __('User Guardian Information') }}
                </div>

                <div class="card-body">
                    <!-- <a href="{{ route('user_guardian_informations.create') }}" class="btn btn-success mb-3">
                        <i class="fas fa-plus"></i> Create User Guardian Information
                    </a> -->

                    <table class="table table-hover table-striped text-center text-primary">
                        <thead>
                            <tr>
                                <th>Father's Name</th>
                                <th>Mother's Name</th>
                                <th>Father's Phone Number</th>
                                <th>Mother's Phone Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userGuardianInformations as $userGuardianInformation)
                            <tr>
                                <td>{{ $userGuardianInformation->fathers_name }}</td>
                                <td>{{ $userGuardianInformation->mothers_name }}</td>
                                <td>{{ $userGuardianInformation->fathers_mobile }}</td>
                                <td>{{ $userGuardianInformation->mothers_mobile }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('user_guardian_informations.edit', $userGuardianInformation->id) }}" class="btn btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('user_guardian_informations.destroy', $userGuardianInformation->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this entry?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection