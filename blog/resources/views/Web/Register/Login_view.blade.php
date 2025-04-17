@extends('layouts.Web_app')
@section('title')
Login Page
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
                <h4>Account</h4>
            </div>

            <!-- Card body containing the form -->
            <div class="card-body">
                <!-- Registration form starts here -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf <!-- CSRF protection -->

                    <!-- Full Name field -->


                    <!-- Email field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>



                    <!-- Password field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>


                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

