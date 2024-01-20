@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Address</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user_addresses.store') }}">
                        @csrf

                        <!-- User ID -->
                        <div class="form-group">
                            <label for="user_id">User:</label>
                            <select name="user_id" id="user_id" class="form-control">
                                <!-- Populate this dropdown with user options if needed -->
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Present Address -->
                        <div class="form-group">
                            <label for="present_address">Present Address:</label>
                            <input type="text" name="present_address" id="present_address" class="form-control" required>
                        </div>

                        
                        <div class="form-group">
                            <label for="permanent_address">Permanent Address:</label>
                            <input type="text" name="permanent_address" id="permanent_address" class="form-control" required>
                        </div>

                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
