@extends('layouts.Web_app')
@section('title')
Register Page
@endsection
@section('headerimage')
{{url('/images/home.png')}}
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
                <form action="{{ route('register') }}" method="POST" id="registerForm">
                    @csrf <!-- CSRF protection -->

                    <!-- Full Name field -->
                   <!-- Full Name field -->
<!-- Full Name field -->
<div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
    <span class="text-danger" id="name-error"></span>
</div>

<!-- Email field -->
<div class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" required>
    <span class="text-danger" id="email-error"></span>
</div>

<!-- Phone number field -->
<div class="mb-3">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone" required>
    <span class="text-danger" id="phone-error"></span>
</div>

<!-- Password field -->
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
    <span class="text-danger" id="password-error"></span>
</div>

<!-- Confirm password field -->
<div class="mb-3">
    <label for="password_confirmation" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    <span class="text-danger" id="confirm-password-error"></span>
</div>

                    <!-- Submit button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>
                <script>
                    document.getElementById("registerForm").addEventListener("submit", function (e) {
                        let isValid = true;

                        // Clear all previous error messages
                        document.querySelectorAll("span.text-danger").forEach(el => el.innerText = '');

                        const name = document.getElementById("name").value.trim();
                        const email = document.getElementById("email").value.trim();
                        const phone = document.getElementById("phone").value.trim();
                        const password = document.getElementById("password").value;
                        const confirmPassword = document.getElementById("password_confirmation").value;

                        // Name validation
                        if (name.length < 3) {
                            document.getElementById("name-error").innerText = "Name must be at least 3 characters.";
                            isValid = false;
                        }

                        // Email validation
                        if (!email.match(/^\S+@\S+\.\S+$/)) {
                            document.getElementById("email-error").innerText = "Please enter a valid email address.";
                            isValid = false;
                        }

                        // Phone validation (11-15 digits)
                        if (!phone.match(/^[0-9]{11,15}$/)) {
                            document.getElementById("phone-error").innerText = "Phone must be between 11 and 15 digits.";
                            isValid = false;
                        }

                        // Password validation
                        if (password.length < 8) {
                            document.getElementById("password-error").innerText = "Password must be at least 8 characters.";
                            isValid = false;
                        }

                        // Confirm password validation
                        if (password !== confirmPassword) {
                            document.getElementById("confirm-password-error").innerText = "Passwords do not match.";
                            isValid = false;
                        }

                        // Prevent form submission if invalid
                        if (!isValid) {
                            e.preventDefault();
                        }
                    });
                    </script>
            </div>
        </div>
    </div>
</div>
@endsection

