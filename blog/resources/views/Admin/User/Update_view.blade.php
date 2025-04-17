@extends('layouts.Admin_app')
@section('title')
update user

@endsection
@section('contect')
<form method="post">
    @csrf
    <div class="col-lg-6 mx-auto">
        <div class="panel panel-primary shadow-sm">
            <div class="panel-heading bg-primary text-white">
                <h5 class="mb-0">user Info</h5>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">E-mail:</label>
                    <input type="email" name="email" id="name" class="form-control" placeholder="email" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Phone:</label>
                    <input type="text" name="phone" id="name" class="form-control" placeholder="phone" value="{{$user->phone}}">
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Password:</label>
                    <input type="text" name="Password" id="name" class="form-control" placeholder="Password">
                </div>

            <div class="panel-footer text-center">
                <input type="submit" class="btn btn-primary" value="Add">
            </div>
        </div>
    </div>
</form>
@endsection
