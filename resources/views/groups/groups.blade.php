@extends('layouts.app')

@section('content')
    <div class="container col-sm-10">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($groups as $group)
                <tr>
                    <th scope="row" >{{$group->id}}</th>
                    <td>{{$group->name}}</td>
                    <td><a href="{{ url('update-group', $group->id) }}"  type="submit" class="btn btn-outline-success btn-sm">edit</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
