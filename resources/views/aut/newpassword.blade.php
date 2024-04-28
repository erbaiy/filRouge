@extends('aut.layout')
@section('content')
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient"> New Password?</h3>
                                <p class="mb-0">Enter new password</p>
                            </div>
                            <div class="card-body">
                                <form id='form' role="form" method="post"
                                    action="{{ route('new_password', ['token' => $token]) }}"
                                    onsubmit="return validatePassword()">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password"
                                            id="password" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password-confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password"
                                            name="password_confirmation" id="password-confirmation"
                                            aria-label="Confirm Password" aria-describedby="password-addon">
                                    </div>
                                    <span id="errorMsg"></span>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Submit</button>
                                    </div>
                                </form>
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
        function validatePassword() {
            let password = document.getElementById('password').value;
            let passwordConfirmation = document.getElementById('password-confirmation').value;
            let errorMsg = document.getElementById('errorMsg');

            if (password !== passwordConfirmation) {
                errorMsg.innerHTML = 'Passwords do not match';
                return false; // Prevent form submission if passwords don't match
            }

            return true; // Allow form submission if all checks pass
        }
    </script>
@endsection
