@extends('layouts.Admin_app')
@section('title')
Display post
@endsection
@section('contect')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            All post
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <a href="{{route('Post.Add')}}" class="btn btn-primary" style="margin-bottom: 10px" > Add post</a>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Section</th>
                        <th>posted by</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr class="odd gradeX">
                        <td>{{$post->title}}</td>
                        <td>{{$post->Section->name}}</td>
                        <td>{{$post->User->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{route('Post.Delete' , ['id'=>$post->id])}}"> Delete</a>
                            <a class="btn btn-warning" href="{{route('Post.Update' , ['id'=>$post->id])}}"> Update</a>
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
