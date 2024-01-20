@extends('app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user_guardian_informations.update', $userGuardianInformation->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="user_id">User ID:</label>
                            <select name="user_id" class="form-control" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $userGuardianInformation->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }} (ID: {{ $user->id }})</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="fathers_name">Father's Name:</label>
                            <input type="text" class="form-control" name="fathers_name" value="{{ $userGuardianInformation->fathers_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="fathers_mobile">Father's Mobile:</label>
                            <input type="text" class="form-control" name="fathers_mobile" value="{{ $userGuardianInformation->fathers_mobile }}" required>
                        </div>

                        <div class="form-group">
                            <label for="mothers_name">Mother's Name:</label>
                            <input type="text" class="form-control" name="mothers_name" value="{{ $userGuardianInformation->mothers_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="mothers_mobile">Mother's Mobile:</label>
                            <input type="text" class="form-control" name="mothers_mobile" value="{{ $userGuardianInformation->mothers_mobile }}" required>
                        </div>

                        <div class="form-group">
                            <label for="local_gurdian_name">Local Guardian Name:</label>
                            <input type="text" class="form-control" name="local_gurdian_name" value="{{ $userGuardianInformation->local_gurdian_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="local_gurdian_mobile">Local Guardian Mobile:</label>
                            <input type="text" class="form-control" name="local_gurdian_mobile" value="{{ $userGuardianInformation->local_gurdian_mobile }}" required>
                        </div>

                        <div class="form-group">
                            <label for="local_gurdian_address">Local Guardian Address:</label>
                            <textarea class="form-control" name="local_gurdian_address" rows="3" required>{{ $userGuardianInformation->local_gurdian_address }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
