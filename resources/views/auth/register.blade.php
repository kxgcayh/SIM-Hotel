@extends('layouts.auth', (['title' => 'Register']))

@section('content')
<div class="login-box card">
    <div class="card-body">
        <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}">
            @csrf
            <a href="javascript:void(0)" class="text-center db">
                <img src="{{ asset('images/logo-icon.png') }}" alt="Home" /><br />
            </a>
            <h3 class="box-title m-t-40 m-b-0">Register Now</h3><small>Create your account and enjoy</small>
            <div class="form-group m-t-20">
                <div class="col-xs-12">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}" required autocomplete="username" placeholder="Username">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp"
                        value="{{ old('telp') }}" required autocomplete="telp" placeholder="Phone Number">
                    @error('telp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirm Password">
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                        type="submit">Sign Up</button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>Already have an account?
                        <a href="{{route('login')}}" class="text-info m-l-5">
                            <b>Sign In</b>
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
