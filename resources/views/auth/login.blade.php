@extends('layouts.app')

@section('content')
<section class="login_content">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Login Form</h1>
        <div>
            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus />
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn"  >
            <span style="font-weight: normal; font-size:12px;">{{ __('Log in') }}</span>                 
            </button>
            <!-- <a class="btn btn-default submit" >Log in</a> -->
            @if (Route::has('password.request'))
                <a class="reset_pass" href="{{ route('password.request') }}">
                    {{ __('Lost your password?') }}
                </a>
            @endif
            <!-- <a class="reset_pass">Lost your password?</a> -->
        </div>

        <div class="clearfix"></div>

        <div class="separator">
            <p class="change_link">New to site?
                <a href="{{ route('register') }}" class="to_register"> Create Account </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
                <h1><i class="fa fa-graduation-cap"></i></i> Beverages Admin</h1>
                <p>©2016 All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms</p>
            </div>
        </div>
    </form>
</section>
<!-- <div class="container">  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('username') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
