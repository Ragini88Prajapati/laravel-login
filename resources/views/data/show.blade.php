@extends('data.layout')
 
@section('content')
 
    <div class="container shadow-none bg-light mt-5  " style="width: 50rem;">
        <div class="row card p-5 text-center">
            <div class="row margin-tb">
                <div class="col-sm-11">
                    <h2>Displaying  Details</h2>
                </div>
                <div class="col-sm-1">
                    <a class="btn btn-primary" href="{{ route('data.index') }}"> <i class="fa-solid fa-backward"></i></a>
                </div>
            </div>
        </div>
        </div>
 
    <div class="container card shadow-lg p-3 mb-5" style="width: 50rem;">
    <div class="row mb-12 p-3">
      <label for="time" class="col-sm-3 col-form-label"> Name</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ $data->time }}"  name="time" id="time" placeholder="Enter Employee Name" disabled readonly>
      </div>
    </div>

 
</div>
 
@endsection