@extends('layouts.auth', (['title' => 'Login']))

@section('content')
<div class="login-box card">
    <div class="card-body">
        <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
            @csrf
            <a href="javascript:void(0)" class="text-center db">
                <img src="{{ asset('images/logo-icon.png') }}" alt="Home" /><br />
                <img src="{{ asset('images/logo-text.png') }}" alt="Home" />
            </a>

            <div class="form-group m-t-40">
                <div class="col-xs-12">
                    <input id="login" type="text"
                        class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                        name="login" value="{{ old('username') ?: old('email') }}" required autocomplete="login"
                        placeholder="E-Mail or Username">

                    @if ($errors->has('username') || $errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-primary pull-left p-t-0">
                        <input class="form-check-input" id="remember" type="checkbox" name="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">{{ __('Remember Me') }}</label>
                    </div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right">
                        <i class="fa fa-lock m-r-5"></i> Forgot pwd?
                    </a>
                    @endif
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">
                        {{ __('Log In')}}
                    </button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>Don't have an account?
                        <a href="{{ route('register') }}" class="text-primary m-l-5">
                            <b>{{__('Sign Up')}}</b>
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
