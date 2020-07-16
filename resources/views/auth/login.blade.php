@extends('layout.authentication')
@section('title', 'Login')
@section('content')
<div class="row">
    <div class="col-lg-4 col-sm-12">
        <form class="card auth_form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="header">
                <a href="{{route('dashboard')}}">
                    <img class="logo" src="{{ config('app.logo', '../assets/images/osmly_mail_logo.png') }}" alt="">
                </a>
                <h5>Log in</h5>
            </div>
            <div class="body">
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-mail Address">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Sign In</button>
                <a class="btn btn-primary btn-block waves-effect waves-light" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
                <!-- <div class="signin_with mt-3">
                    <p class="mb-0">or Sign Up using</p>
                    <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                    <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                    <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button>
                </div> -->
            </div>
        </form>

    </div>
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <img src="{{asset('assets/images/signin.svg')}}" alt="Sign In" />
        </div>
    </div>
</div>
@stop