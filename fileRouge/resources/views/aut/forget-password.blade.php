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

    <form role="form" method="post" action="{{ route('auth_sendToEmail') }}">
        @csrf
        <label>Email</label>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" aria-label="Email"
                aria-describedby="email-addon">
        </div>
        @if ($errors->has('email'))
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>
        @endif

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign
                in</button>
        </div>
    </form>
@endsection
