@extends('aut.layout')
@section('content')
    <form action="{{ route('auth_Login') }}" method="POST" id="loginForm" role="form">
        @csrf
        <label>Email</label>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email"
                aria-describedby="email-addon">
            <div id="emailError" class="text-danger">
                @error('email')
                    <div class="text-danger">{{ $message }}</div> <!-- Display error message -->
                @enderror
            </div> <!-- Error message placeholder -->
        </div>
        <label>Password</label>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                aria-label="Password" aria-describedby="password-addon">
            <div id="passwordError" class="text-danger"> @error('password')
                    <div class="text-danger">{{ $message }}</div> <!-- Display error message -->
                @enderror
            </div> <!-- Error message placeholder -->
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
        </div>
    </form>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-4 text-sm mx-auto">
            Don't have an account?
            <a href="{{ route('auth_getRogister') }}" class="text-info text-gradient font-weight-bold">Sign
                up</a>
        <p class="mb-4 text-sm mx-auto">
            Forgot your password?
            <a href="{{ route('auth_forgetPassword') }}" class="text-info text-gradient font-weight-bold">Forgot Password
            </a>
        </p>
    </div>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });

        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var emailError = document.getElementById('emailError');
            var passwordError = document.getElementById('passwordError');
            var isValid = true;

            // Reset error messages
            emailError.innerHTML = '';
            passwordError.innerHTML = '';

            // Email validation with regex
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email) {
                emailError.innerHTML = 'Email is required';
                isValid = false;
            } else if (!emailPattern.test(email)) {
                emailError.innerHTML = 'Invalid email format';
                isValid = false;
            }

            // Password validation with regex
            // var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            if (!password) {
                passwordError.innerHTML = 'Password is required';
                isValid = false;
            } else if (!password) {
                passwordError.innerHTML =
                    'Password must contain at least one digit, one lowercase letter, one uppercase letter, and be at least 8 characters long';
                isValid = false;
            }

            return isValid;
        }
    </script>
@endsection
