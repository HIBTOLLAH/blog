@extends('layouts.Admin_app')

@section('title')
    Display Messages
@endsection

@section('contect')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            DataTables Advanced Tables
        </div>
        <div class="panel-body">
            <a href="{{route('Msg.Index' ,['type'=>'All'])}}" class="btn btn-primary" style="margin-bottom: 10px" > All</a>

            <a href="{{route('Msg.Index',['type'=>'Read'])}}" class="btn btn-primary" style="margin-bottom: 10px" >Read</a>

            <a href="{{route('Msg.Index',['type'=>'Unread'])}}" class="btn btn-primary" style="margin-bottom: 10px" >Unread</a>



            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Read At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($msgs as $msg)
                        <tr class="odd gradeX">
                            <td>
                                <i class="fa fa-envelope{{ is_null($msg->read_at) ? '' : '-o' }}"></i>
                            </td>
                            <td>{{ $msg->data['name'] }}</td>
                            <td>{{ $msg->data['email'] }}</td>
                            <td>{{ $msg->data['phone'] }}</td>
                            <td>{{ $msg->read_at }}</td>
                            <td>
                                <form action="{{route('Msg.Delete',['id'=>$msg->id])}}" method="POST" id="deleteform-{{$msg->id}}"  > @csrf</form>
                                <a href="{{ route('Msg.Delete', ['id' => $msg->id]) }}" class="btn btn-danger btn-sm" onclick="deleteNoti('{{$msg->id}}')">Delete</a>
                                <a href="{{ route('Msg.Read', ['id' => $msg->id]) }}" class="btn btn-primary btn-sm">Read</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- DataTables Script -->
            <script>
                function deleteNoti(id) {
                    event.preventDefault(); // يمنع الانتقال الفوري للرابط
                    if (confirm("Are you sure you want to delete this message?")) {
                        document.getElementById('deleteform-' + id).submit();
                    }
                }
            </script>
            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
            </script>
        </div>
    </div>
</div>
@endsection

