@extends('aut.layout')
@section('content')

    <div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif


    </div>
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Forgot Your Password?</h3>
                                <p class="mb-0">Enter your email to reset your password</p>
                            </div>
                            <div class="card-body">


                                <form id="passwordResetForm" role="form" method="post"
                                    action="{{ route('auth_sendToEmail') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="text" class="form-control" placeholder="Email" id="email"
                                            name="email" aria-label="Email" aria-describedby="email-addon">
                                        <span id="emailError" class="text-danger"></span>
                                    </div>

                                    <div class="text-center">
                                        <button type="button" class="btn bg-gradient-info w-100 mt-4 mb-0"
                                            onclick="validateEmail()">Send Instructions
                                        </button>
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
        function validateEmail() {
            let email = document.getElementById('email').value;
            let emailError = document.getElementById('emailError');
            let errorMsg = '';

            let emailRegEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if (email == '') {
                errorMsg = 'Email is required';
            } else if (!email.match(emailRegEx)) {
                errorMsg = 'Invalid email format';
            }

            emailError.innerHTML = errorMsg;
            document.getElementById('email').classList.toggle('is-invalid', errorMsg !=
                '');

            if (errorMsg === '') {
                document.getElementById('passwordResetForm').submit(); // Submit the form if no error
            }
        }
    </script>

@endsection
