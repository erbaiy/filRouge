@extends('aut.layout')
@section('content')
    <form role="form" method="post" action="{{ route('new_password', ['token' => $token]) }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                aria-label="Password" aria-describedby="password-addon">
        </div>
        <div class="mb-3">
            <label for="password-confirmation">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation"
                id="password-confirmation" aria-label="Confirm Password" aria-describedby="password-addon">
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Submit</button>
        </div>
    </form>
@endsection
