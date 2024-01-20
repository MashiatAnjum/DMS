@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create User Guardian Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user_guardian_informations.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="user_id">User ID:</label>
                            <select name="user_id" class="form-control" required>
                            
                                
                                    <option value="{{ $users->id }}">{{ $users->name }}</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fathers_name">Father's Name:</label>
                            <input type="text" class="form-control" name="fathers_name" required>
                        </div>

                        <div class="form-group">
                            <label for="fathers_mobile">Father's Mobile:</label>
                            <input type="text" class="form-control" name="fathers_mobile" required>
                        </div>

                        <div class="form-group">
                            <label for="mothers_name">Mother's Name:</label>
                            <input type="text" class="form-control" name="mothers_name" required>
                        </div>

                        <div class="form-group">
                            <label for="mothers_mobile">Mother's Mobile:</label>
                            <input type="text" class="form-control" name="mothers_mobile" required>
                        </div>

                        <div class="form-group">
                            <label for="local_gurdian_name">Local Guardian Name:</label>
                            <input type="text" class="form-control" name="local_gurdian_name" required>
                        </div>

                        <div class="form-group">
                            <label for="local_gurdian_mobile">Local Guardian Mobile:</label>
                            <input type="text" class="form-control" name="local_gurdian_mobile" required>
                        </div>

                        <div class="form-group">
                            <label for="local_gurdian_address">Local Guardian Address:</label>
                            <textarea class="form-control" name="local_gurdian_address" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
