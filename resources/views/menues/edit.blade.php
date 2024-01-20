@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Menu</div>

                    <div class="card-body">
                        <form action="{{ route('menues.update', $menu->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="day">Day</label>
                                <input type="text" class="form-control" id="day" name="day" value="{{ $menu->day }}" required>
                            </div>

                            <div class="form-group">
                                <label for="breakfast">Breakfast</label>
                                <input type="text" class="form-control" id="breakfast" name="breakfast" value="{{ $menu->breakfast }}" required>
                            </div>

                            <div class="form-group">
                                <label for="lunch">Lunch</label>
                                <input type="text" class="form-control" id="lunch" name="lunch" value="{{ $menu->lunch }}" required>
                            </div>

                            <div class="form-group">
                                <label for="snacks">Snacks</label>
                                <input type="text" class="form-control" id="snacks" name="snacks" value="{{ $menu->snacks }}" required>
                            </div>

                            <div class="form-group">
                                <label for="dinner">Dinner</label>
                                <input type="text" class="form-control" id="dinner" name="dinner" value="{{ $menu->dinner }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
