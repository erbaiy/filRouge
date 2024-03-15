@extends('aut.layout')
@section('content')
    <form action="{{ route('auth_Login') }}" method="POST" role="form">
        @csrf
        <label>Email</label>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Email"
                aria-describedby="email-addon">
        </div>
        <label>Password</label>
        <div class="mb-3">
            <input type="Password" class="form-control" placeholder="Password" name="password" aria-label="Password"
                aria-describedby="password-addon">
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
            forget your password?
            <a href="{{ route('auth_forgetPassword') }}" class="text-info text-gradient font-weight-bold">forgetpass-word
            </a>
        </p>
    </div>
@endsection
