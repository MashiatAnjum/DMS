@extends('app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Building</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/building') }}">
                            @csrf

                            <div class="form-group">
                                <label for="inputName">Building Name:</label>
                                <input type="text" class="form-control" id="inputName" name="building_name" required>
                            </div>

                            <!-- Add more form fields as needed -->
 
                       <div class="container">
                         <div class="row">
                             <div class="col-md-6">
                               <button type="submit" class="btn btn-outline-primary">Create</button>
                             </div>
                               <div class="col-md-6 text-right">
                                <a href="/admin" class="btn btn-outline-primary">Back</a>
                               </div>
                            </div>
                       </div>
                            
  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection