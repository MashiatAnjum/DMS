@extends('app')

@section('content')
    <div class="container">
    <h2 class="text-primary">
         Weekly Menue <i class="fas fa-utensils"></i>
    </h2>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mb-3">
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(count($menus) > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Day</th>
                                    <th>Breakfast</th>
                                    <th>Lunch</th>
                                    <th>Snacks</th>
                                    <th>Dinner</th>
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
