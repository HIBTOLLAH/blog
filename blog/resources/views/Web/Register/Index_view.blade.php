@extends('layouts.Web_app')
@section('title')
Register Page
@endsection
@section('headerimage')
{{url('/images/home.png')}}
@endsection
@section('head')

@endsection

@section('contect')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <!-- Card container -->
        <div class="card shadow rounded">
            <!-- Card header with title -->
            <div class="card-header bg-primary text-white text-center">
                <h4>Create New Account</h4>
            </div>

            <!-- Card body containing the form -->
            <div class="card-body">
                <!-- Registration form starts here -->
                <form action="{{ route('register') }}" method="POST">
                    @csrf <!-- CSRF protection -->

                    <!-- Full Name field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <!-- Email field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <!-- Phone number field -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <!-- Password field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Confirm password field -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

