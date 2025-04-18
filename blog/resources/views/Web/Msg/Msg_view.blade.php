@extends('layouts.Web_app')

@section('title')
Contact Us
@endsection

@section('headerimage')
{{ url('/images/home.png') }}
@endsection

@section('head')
<!-- You can add custom head content here -->
@endsection

@section('contect')
<div class="row justify-content-center mt-5">
    <div class="col-md-8 col-lg-6">
        <!-- Card container -->
        <div class="card shadow rounded">
            <!-- Card header with title -->
            <div class="card-header bg-primary text-white text-center">
                <h4>Contact Us</h4>
            </div>

            <!-- Card body containing the form -->
            <div class="card-body">
                <!-- Contact form starts here -->
                <form action="" method="POST">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label for="content" class="form-label">Message</label>
                        <textarea name="content" id="content" rows="5" class="form-control" placeholder="Enter your message" required>{{ old('content') }}</textarea>
                    </div>

                    <!-- Admin/Editor Selection -->
                    <div class="mb-4">
                        <label for="admin" class="form-label">Send To</label>
                        <select name="to" id="admin" class="form-control">
                            <option value="admin">Admin group</option>
                            <option value="editor">Editor group</option>
                            <option value="all">Admin & Editor group</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

