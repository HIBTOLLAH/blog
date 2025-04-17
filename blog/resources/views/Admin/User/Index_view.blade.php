@extends('layouts.Admin_app')
@section('title')
Display Section
@endsection
@section('contect')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            DataTables Advanced Tables
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <a href="{{route('User.Add')}}" class="btn btn-primary" style="margin-bottom: 10px" > Add User</a>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="odd gradeX">
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>

                        <td>
                            <a class="btn btn-danger" href="{{route('User.Delete' , ['id'=>$user->id])}}"> Delete</a>
                            <a class="btn btn-warning" href="{{route('User.Update' , ['id'=>$user->id])}}"> Update</a>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- /.table-responsive -->
            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
                </script>

        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
@endsection
