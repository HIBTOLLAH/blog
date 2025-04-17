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
            <a href="{{route('Section.Add')}}" class="btn btn-primary" style="margin-bottom: 10px" > Add Section</a>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Admin</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($sections as $section)
                    <tr class="odd gradeX">
                        <td>{{$section->name}}</td>
                        <td>{{Empty($section->Admin->name)?'':$section->Admin->name}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{route('Section.Delete' , ['id'=>$section->id])}}"> Delete</a>
                            <a class="btn btn-warning" href="{{route('Section.Update' , ['id'=>$section->id])}}"> Update</a>
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
