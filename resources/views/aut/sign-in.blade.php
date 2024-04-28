@extends('aut.layout')
@section('content')
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient"> Login</h3>
                                <p class="mb-0">Enter your email and password</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('auth_Login') }}" method="POST" id="loginForm" role="form">
                                    @csrf
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Email" name="email"
                                            id="email" aria-label="Email" aria-describedby="email-addon">
                                        <div id="emailError" class="text-danger">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                <!-- Display error message -->
                                            @enderror
                                        </div> <!-- Error message placeholder -->
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Password" name="password"
                                            id="password" aria-label="Password" aria-describedby="password-addon">
                                        <div id="passwordError" class="text-danger"> @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                                <!-- Display error message -->
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
                                        <a href="{{ route('auth_getRogister') }}"
                                            class="text-info text-gradient font-weight-bold">Sign
                                            up</a>
                                    <p class="mb-4 text-sm mx-auto">
                                        Forgot your password?
                                        <a href="{{ route('auth_forgetPassword') }}"
                                            class="text-info text-gradient font-weight-bold">Forgot Password
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('https://th.bing.com/th/id/OIP.DDYGhFqUNR5rc1TtT2Vh-wHaE8?w=281&h=187&c=7&r=0&o=5&dpr=1.5&pid=1.7')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
