@extends('layouts.Admin_app')
@section('title')
Update section

@endsection
@section('contect')
<form method="post">
    @csrf
    <div class="col-lg-6 mx-auto">
        <div class="panel panel-primary shadow-sm">
            <div class="panel-heading bg-primary text-white">
                <h5 class="mb-0">Section Info</h5>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="name" class="control-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Section name" value="{{$section->name}}">
                </div>
                <div class="form-group">
                    <label for="admin" class="control-label">Editor for this Section:</label>
                    <select name="admin" id="admin" class="form-control">
                        <option value="">Empty</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                        @if(!Empty($section->Admin))
                        <option  selected='selected'  value="{{$section->Admin->id}}"> {{$section->Admin->name}} </option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="panel-footer text-center">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
</form>
@endsection
