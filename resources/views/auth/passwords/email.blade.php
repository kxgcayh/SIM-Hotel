@extends('layouts.login', (['title' => 'Password Reset']))

@section('content')
<div class="login-box card">
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token ?? '' }}">
            <div class="form-group ">
                <div class="col-xs-12">
                    <h3>Recover Password</h3>
                    <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light"
                        type="submit">{{ __('Send Password Reset Link') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
