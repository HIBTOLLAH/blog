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

@section('head')
<style>
    .comments-container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .comment-card {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-left: 5px solid #007bff;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        transition: transform 0.2s ease;
    }

    .comment-card:hover {
        transform: scale(1.02);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .comment-header {
        font-weight: bold;
        margin-bottom: 10px;
        color: #007bff;
    }

    .comment-body {
        font-size: 16px;
        color: #333;
        line-height: 1.5;
    }
</style>
@endsection

@section('contect')
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {!! $post->content !!}

                <div class="row"> {{-- صف الصور --}}
                    @foreach($post->photo as $photo)
                        <div class="col-md-3 mb-3">
                            <img src="{{ url('/images/' . $photo->path) }}" class="img-fluid" style="height:150px; object-fit: cover;">
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</article>

{{-- Form لإرسال التعليق --}}
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="">
                @csrf
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Comment</label>
                        <textarea name="content" rows="5" class="form-control" placeholder="Comment" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- عرض التعليقات --}}
<div class="comments-container mt-5">
    <h4 class="mb-4">Comments</h4>

    @if($post->Comment)
        @foreach($post->Comment as $comment)
            <div class="comment-card mb-3 p-3 border rounded shadow-sm">
                <div class="comment-header d-flex justify-content-between align-items-center mb-2">
                    <strong>{{ $comment->user->name }}</strong>
                    <small class="text-muted">{{ $comment->created_at->format('Y-m-d H:i') }}</small>
                </div>

                <div class="comment-body mb-2">
                    {{ $comment->content }}
                </div>

                <div class="comment-actions">
                    <a href="{{route('Web.Comment.Edit',['id'=>$comment->id])}}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                    <a href="#" onclick="deletComment('{{route('Web.Comment.Delete',['id'=>$comment->id])}}')"
                    class="btn btn-sm btn-outline-danger">Delete</a>
                </div>
            </div>
           
        @endforeach
    @else
        <p>No comments yet.</p>
    @endif
</div>
<script>
    function deletComment($url){
        var flag=confirm('are you sure');
        if(flag){
            window.location.href = $url;
        }

    }
</script>
@endsection
