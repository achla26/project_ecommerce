@extends('frontend.layout')

@section('content')
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">{{ __('Login') }}</h2>
                    <h2 class="ec-title">{{ __('Login') }}</h2>
                    <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                </div>
            </div>
            <div class="ec-login-wrapper">
                <div class="ec-login-container">
                    <div class="ec-login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <span class="ec-login-wrap">
                                <label>{{ __('Email Address') }}*</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email add..." >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>
                            <span class="ec-login-wrap">
                                <label>Password*</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>
                            <span class="ec-login-wrap">
                                <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label   for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </span>

                            <span class="ec-login-wrap ec-login-fp">
                                <label><a href="href="{{ route('password.request') }}"">Forgot Password?</a></label>
                            </span>
                            <span class="ec-login-wrap ec-login-btn">
                                <button class="btn btn-primary" type="submit">Login</button>
                                <a href="register.html" class="btn btn-secondary">Register</a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
