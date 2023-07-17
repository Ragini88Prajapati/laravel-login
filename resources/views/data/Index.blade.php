@extends('data.layout')

@section('content')

    <div class="container shadow bg-light mt-3 p-3 " >
        <div class="row">
            <div class="row margin-tb">
                <div class="col-sm-9">
                    <h3> Crud Operations</h3>
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ route('data.create') }}"> Add Details</a>
                </div>
            </div>
        </div>
        </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-primary card shadow">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <tr>
            <th>#</th>
            <th>User Id</th>
            <th>Project Id</th>
            <th>TIme</th>
            <th width="230px">Actions</th>
        </tr>
        @foreach ($data as $empdata => $value)
        <tr>
            <td>{{ ++$num1 }}</td>
            <td>{{ $value->user_id }}</td>
            <td>{{ $value->project_id }}</td>
            <td>{{ $value->time }}</td>
            <td class="shadow">
                <form action="{{ route('data.destroy',$value->id) }}" method="POST">

                    <a class="btn btn-success btn-sm" href="{{ route('data.show',$value->id) }}"><i class="fa-solid fa-eye"></i>View</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('data.edit',$value->id) }}"><i class="fa-solid fa-pen-to-square"></i>Edit</a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i>Delete</button>

                </form>
            </td>
        </tr>
        @endforeach
    </table>


    {!! $data->links() !!}
@endsection