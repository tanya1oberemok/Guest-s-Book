@extends('layouts.app')

@section('content')

    <div class="container col-sm-8">

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
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Group</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th scope="row" >{{$user->id}}</th>
                        <td >
                            <img height="80px" src=" {{asset('/images/' . $user->avatar)}} ">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->groups->name}}</td>
                        <td><a href="{{ url('update-user', $user->id) }}"  type="submit" class="btn btn-outline-success btn-sm">edit</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
