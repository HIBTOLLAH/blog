@extends('layouts.Admin_app')
@section('title')
Message
@endsection

@section('contect')
<div class="col-lg-6 mx-auto">
    <div class="panel panel-primary shadow-sm">
        <div class="panel-heading clearfix p-2">
            <div class="pull-left">
                {{ $msg->data['name'] }} | {{ $msg->data['email'] }}
            </div>
            <div class="pull-right">
                {{ $msg->data['phone'] }}
            </div>
        </div>
        <div class="panel-body p-3">
            {!! nl2br(e($msg->data['content'])) !!}
        </div>
        <div class="panel-footer text-center p-2">
            <a class="btn btn-primary" href="{{ route('Msg.Index', ['type' => 'All']) }}">Back</a>
        </div>
    </div>
</div>
@endsection

