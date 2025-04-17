@extends('layouts.Web_app')
@section('title')
Profile Page
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
                <h4>update Account</h4>
            </div>

            <!-- Card body containing the form -->
            <div class="card-body">
                <!-- Registration form starts here -->
                <form action="" method="POST">
                    @csrf <!-- CSRF protection -->

                    <!-- Full Name field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" value="{{$user->name}}" id="name" name="name" required>
                    </div>



                    <!-- Phone number field -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" value="{{$user->phone}}" id="phone" name="phone" required>
                    </div>

                    <!-- Password field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">C-Password</label>
                        <input type="password" class="form-control" id="password" name="c_password" required>
                    </div>
                    <!-- Password field -->
                    <div class="mb-3">
                        <label for="password" class="form-label"> new Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <!-- Confirm password field -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="confirm_password" required>
                    </div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
