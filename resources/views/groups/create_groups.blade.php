@extends('layouts.app')

@section('content')

    <div class="container" >

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


        <form action="{{ route('create-group') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input name="name" type="text" class="form-control"  id="inputName3" >
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
