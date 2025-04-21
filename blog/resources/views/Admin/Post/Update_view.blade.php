@extends('layouts.Admin_app')
@section('title')
Update Post
@endsection

@section('contect')
<form method="post">
    @csrf
    <div class="row justify-content-center g-4">
        <!-- Post Info Card -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 bg-light">
                <div class="card-header bg-primary text-white rounded-top-4 px-4 py-3">
                    <h4 class="mb-0 fw-bold"> Update Post Info</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold text-dark">Title</label>
                        <input type="text" name="title" id="title" class="form-control form-control-lg rounded-pill shadow-sm border-light" value="{{ $post->title }}" placeholder="Enter post title">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold text-dark">Content</label>
                        <textarea name="content" id="content" rows="5" class="form-control form-control-lg rounded-4 shadow-sm border-light" placeholder="Write your content...">{{ $post->content }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="section" class="form-label fw-semibold text-dark">Section</label>
                        <select name="section_id" id="section" class="js-example-basic-single form-select form-select-lg rounded-pill shadow-sm border-light">
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}" {{ $section->id == $post->Section->id ? 'selected' : '' }}>
                                    {{ $section->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 text-center py-3">
                    <input type="submit" value=" Save Changes" class="btn btn-success btn-lg px-5 rounded-pill shadow-sm fw-bold">
                </div>
            </div>
        </div>

        <!-- Photo Gallery -->
        <div class="col-lg-10">
            <div class="card border-0 shadow-lg rounded-4 bg-light">
                <div class="card-header bg-white rounded-top-4 px-4 py-3">
                    <h4 class="mb-0 fw-bold text-center text-dark"> Choose Photos</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                        @foreach($photos as $photo)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 rounded-4">
                                <img src="{{ url('/images/'.$photo->path) }}" class="card-img-top rounded-top-4" style="height: 200px; object-fit: cover;" alt="Photo">
                                <div class="card-body text-center">
                                    <div class="form-check d-flex justify-content-center align-items-center">
                                        <input type="checkbox"
                                               name="photos[]"
                                               value="{{ $photo->id }}"
                                               {{ $post->photo->contains('id', $photo->id) ? 'checked' : '' }}
                                               class="form-check-input me-2">
                                        <label class="form-check-label text-secondary">Use this</label>
                                    </div>
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
