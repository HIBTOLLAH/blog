@extends('layouts.Admin_app')
@section('title')
Update post
@endsection
@section('contect')
<form method="post">
    @csrf
    <div class="col-lg-6 mx-auto">
        <div class="panel panel-primary shadow-sm">
            <div class="panel-heading bg-primary text-white">
                <h5 class="mb-0">post Info</h5>
            </div>
            <div class="card-body p-4">
                <div class="form-group mb-3">
                    <label for="title" class="form-label fw-semibold">Title:</label>
                    <input type="text" name="title" id="title" class="form-control form-control-lg rounded-pill" placeholder="Enter title" value="{{$post->title}}">
                </div>
                <div class="form-group mb-3">
                    <label for="content" class="form-label fw-semibold">Content:</label>
                    <textarea name="content" id="content" placeholder="Write your content here..." class="form-control form-control-lg rounded-3" rows="5">{{$post->content}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="section" class="form-label fw-semibold">Section:</label>
                    <select name="section_id" id="section" class="js-example-basic-single form-select form-select-lg rounded-pill">
                        @foreach ($sections as $section)
                            <option {{$section->id == $post->Section->id ? 'selected="selected"' : ''}} value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-center py-3">
                <input type="submit" class="btn btn-primary btn-lg rounded-pill px-5" value="Save">
            </div>
        </div>
    </div>
    <div class="card-body p-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach($photos as $photo)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ url('/images/'.$photo->path) }}"
                         class="card-img-top"
                         alt="Photo"
                         style="height: 200px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <div class="card-body text-center">
                        <input type="checkbox"
                               name="photos[]"
                               value="{{ $photo->id }}"
                               {{ $post->photo->contains('id', $photo->id) ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "Select a section",
                allowClear: true
            });
        });
    </script>
</form>
@endsection
