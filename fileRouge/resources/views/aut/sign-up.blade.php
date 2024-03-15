@extends('aut.layout')
@section('content')
    <form role="form text-left" action="{{ route('auth_Rogister') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Name" name="name" aria-label="Name"
                aria-describedby="email-addon" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Email"
                aria-describedby="email-addon" value="{{ old('email') }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Password"
                aria-describedby="password-addon" required>
            @if ($errors->has('password'))
                {{ $errors->first('password') }}
                <span class="alert alert-danger"></span>
        </div>
        @endif
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
@endsection
