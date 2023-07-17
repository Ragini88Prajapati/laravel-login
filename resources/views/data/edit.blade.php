@extends('data.layout')
 
@section('content')
 
    <div class="container shadow-none bg-light mt-5  " style="width: 50rem;">
        <div class="row card p-5 text-center">
            <div class="row margin-tb">
                <div class="col-sm-11">
                    <h2>Edit Details</h2>
                </div>
                <div class="col-sm-1">
                    <a class="btn btn-primary" href="{{ route('data.index') }}"> <i class="fa-solid fa-backward"></i></a>
                </div>
            </div>
        </div>
        </div>
 
    @if ($errors->any())
    <div class="alert alert-warning">
        <strong>Errors!</strong>Please chek carefully....<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
 <form action="{{ route('data.update',$data->id) }}" method="POST">
        @csrf
        @method('PUT')
 
   <div class="container card shadow-lg p-3 mb-5" style="width: 50rem;">
    <div class="row mb-12 p-3">
      <label for="time" class="col-sm-3 col-form-label">Time</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" value="{{ $data->time }}" name="time" id="time" placeholder="Enter Time">
      </div>
    </div>

    <div class="row mb-12 p-3">
        <label for="time" class="col-sm-3 col-form-label">Time</label>
        <div class="col-sm-9">
            <select name="project_id"style="max-width:60%;" id="project_id" class="form-control" required="">
                <option value="">Select an option</option>

                @foreach($projects as $value)
                    <option value="{{ $value->id }}" {{ old('project_id', $data->project_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                @endforeach
                
            </select>
        </div>
    </div>

      <div class="row card text-center">
 
      <div class="col-sm-12 p-3">
        <button type="submit" class="btn btn-primary btn-lg shadow-lg">Update</button>
        <a class="btn btn-danger btn-lg shadow-lg" href="{{ route('data.index') }}"> Cancel</a>
      </div>
 
    </div>
 
</div>
</form>
 
@endsection
