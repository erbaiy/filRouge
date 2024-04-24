@extends('aut.layout')
@section('content')
    <form id="registerForm" role="form text-left" action="{{ route('auth_Rogister') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Name" name="name" aria-label="Name"
                aria-describedby="email-addon" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Email"
                aria-describedby="email-addon" value="{{ old('email') }}" required>
            <span id="emailError" class="text-danger"></span>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password"
                aria-describedby="password-addon" required>
            <span id="passwordError" class="text-danger"></span>
        </div>
        <div class="form-check form-check-info text-left">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
            <label class="form-check-label" for="flexCheckDefault">
                I agree to the <a href="javascript:;" class="text-dark font-weight-bolder">Terms
                    and Conditions</a>
            </label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                up</button>
        </div>

    </form>
    <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-4 text-sm mx-auto">
            Don't have an account?
            <a href="{{ route('auth_getRogister') }}" class="text-info text-gradient font-weight-bold">Sign
                up</a>
        <p class="mb-4 text-sm mx-auto">
            forget your password?
            <a href="{{ route('auth_forgetPassword') }}" class="text-info text-gradient font-weight-bold">forgetpass-word
            </a>
        </p>
    </div>
    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Perform validation
            var name = document.getElementsByName('name')[0].value;
            var email = document.getElementsByName('email')[0].value;
            var password = document.getElementsByName('password')[0].value;
            var emailError = document.getElementById('emailError');
            var passwordError = document.getElementById('passwordError');
            var valid = true;

            // Clear previous error messages
            emailError.textContent = '';
            passwordError.textContent = '';

            // Validate email
            if (!email) {
                emailError.textContent = 'Email is required';
                valid = false;
            } else if (!isValidEmail(email)) {
                emailError.textContent = 'Invalid email format';
                valid = false;
            }
            // Validate password
            if (!password) {
                passwordError.textContent = 'Password is required';
                valid = false;
            }
            if (!name) {
                name.textContent = 'name is required';
                valid = false;
            }

            // If all fields are valid, submit the form
            if (valid) {
                this.submit();
            }
        });
        // Function to validate email format
        function isValidEmail(email) {
            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }
    </script>
@endsection
