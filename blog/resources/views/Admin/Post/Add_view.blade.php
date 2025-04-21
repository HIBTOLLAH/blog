@extends('layouts.Admin_app')
@section('title')
Add post
@endsection

@section('contect')
<form method="post">
    @csrf
    <div class="row justify-content-center g-4">
        <!-- Post Info Card -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 bg-light">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3 d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 fw-bold text-dark"> Add New Post</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold text-secondary">Title</label>
                        <input type="text" name="title" id="title" class="form-control form-control-lg rounded-4 shadow-sm border-light" placeholder="Enter post title">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold text-secondary">Content</label>
                        <textarea name="content" id="content" rows="5" class="form-control form-control-lg rounded-4 shadow-sm border-light" placeholder="Write something..."></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="section" class="form-label fw-semibold text-secondary">Section</label>
                        <select name="section_id" id="section" class="js-example-basic-single form-select form-select-lg rounded-4 shadow-sm border-light">
                            <option value="" disabled selected>Select a section</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 text-center py-3">
                    <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm fw-bold">
                        Save Post
                    </button>
                </div>
            </div>
        </div>

        <!-- Uploaded Photos -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 bg-light">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <h4 class="mb-0 fw-bold text-dark text-center"> Select Photos</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <div class="row g-3">
                        @foreach($photos as $photo)
                        <div class="col-md-4">
                            <div class="text-center">
                                <img src="{{ url('/images/'.$photo->path) }}" class="img-fluid rounded-3 shadow-sm mb-2" style="height: 130px; object-fit: cover; width: 100%;">
                                <div class="form-check d-flex justify-content-center">
                                    <input class="form-check-input" type="checkbox" name="photo[]" value="{{ $photo->id }}" id="photo{{ $photo->id }}">
                                    <label class="form-check-label ms-2" for="photo{{ $photo->id }}">
                                        Use this
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Select2 Init -->
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "Select a section",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</form>
@endsection

