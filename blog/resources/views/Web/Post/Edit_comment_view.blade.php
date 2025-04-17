@extends('layouts.Web_app')

@section('title')
    {{ $post->title }}
@endsection

@section('subject')
    {{ $post->title }}
@endsection

@section('headerimage')
    {{ url('/images/b.jfif') }}
@endsection

@section('contect')
    {{-- Form لإرسال التعليق --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>Comment</label>
                            <textarea name="content" rows="5" class="form-control" placeholder="Comment" required>{{ $comment->content }}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

