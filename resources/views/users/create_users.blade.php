@extends('layouts.app')

@section('content')

    <div class="container">

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

        <form action="{{ route('create-user') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control"  id="inputName3" >
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input name="email" type="email" class="form-control" id="inputEmail3" >
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassl3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input name="password" type="text" class="form-control" id="inputPassl3" >
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Group</label>
                <div class="col-sm-10 offset-sm-2">
                    <select name="group_id" class="form-select" aria-label="Default select example" >

                        @foreach( $groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputAvatar3" class="col-sm-2 col-form-label">Add photo</label>
                <div class="col-sm-10 offset-sm-2">
                    <input type="file" name="avatar" class="form-control" id="inputAvatar3" >
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
