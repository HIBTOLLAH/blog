@extends('layouts.Admin_app')
@section('title')
Delete image

@endsection
@section('contect')
<form method="post">
    @csrf
    <div class="col-lg-6 mx-auto">
        <div class="panel panel-red shadow-sm">
            <div class="panel-heading bg-primary text-white">
                <h5 class="mb-0">Delete</h5>
            </div>

                <div class="form-group">
                <label> are you sure </label><br/>
                <img src="{{url('/images/'.$photo->path)}}" style="width: 100px ; height:100px" >

            </div>
            <div class="panel-footer text-center">
                <input type="submit" class="btn btn-danger" value="Delete">
            </div>
        </div>
    </div>
</form>
@endsection
