@extends('layouts.Admin_app')
@section('title')
Uplaod Image

@endsection
@section('contect')
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-6 mx-auto">
        <div class="panel panel-primary shadow-sm">
            <div class="panel-heading bg-primary text-white">
                <h5 class="mb-0">Image Info</h5>
            </div>
            <div class="panel-body">

                <div class="form-group">
                 <input class="btn btn-primary" type="file" value="upload" name="photo">
                </div>
            </div>
            <div class="panel-footer text-center">
                <input type="submit" class="btn btn-primary" value="Save" >
            </div>
        </div>
    </div>
   

</form>
@endsection
