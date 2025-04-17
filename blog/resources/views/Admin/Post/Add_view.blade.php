@extends('layouts.Admin_app')
@section('title')
Add post
@endsection
@section('contect')
<form method="post">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow-sm mb-4 h-100 border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h4 class="mb-0 fw-bold">Post Info</h4>
                </div>
                <div class="card-body p-4">
                    <div class="form-group mb-3">
                        <label for="title" class="form-label fw-semibold">Title:</label>
                        <input type="text" name="title" id="title" class="form-control form-control-lg rounded-pill" placeholder="Enter title" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="content" class="form-label fw-semibold">Content:</label>
                        <textarea name="content" id="content" placeholder="Write your content here..." class="form-control form-control-lg rounded-3" rows="5"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="section" class="form-label fw-semibold">Section:</label>
                        <select name="section_id" id="section" class="js-example-basic-single form-select form-select-lg rounded-pill">

                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 text-center py-3">
                    <input type="submit" class="btn btn-primary btn-lg rounded-pill px-5" value="Save">
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm mb-4 h-100 border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3 rounded-top">
                    <h4 class="mb-0 fw-bold">Uploaded Photos</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        @foreach($photos as $photo)
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="{{url('/images/'.$photo->path)}}" alt="Photo" class="img-fluid rounded-3 shadow-sm" style="width:  100% ">
                                <input type="checkbox" name="photo[]" value="{{$photo->id}}">
                            </div>
                        </div>
                        @endforeach
                    </div>
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
