{{-- @extends('layouts.app')
@section('title', 'Retention through stickiness')
@section('styles')
@endsection
@section('content')
<div class="min-h-screen bg-[#e6f3f7] flex justify-center items-center p-4">
    <div class="login-container">
        <img src="{{ asset('images/logo.png') }}" alt="DHL Logo" class="dhl-logo">
        <h1 class="page-title">Retention through stickiness</h1>
        <p class="subtitle">Connect to your account to manage your delivery preferences and tracking</p>

        <img src="{{ asset('images/hero-image.png') }}" alt="Shipping Illustration" class="hero-image">

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <div class="input-group">
                <input
                    type="email"
                    name="email"
                    class="input-field @error('email') border-red-500 @enderror"
                    placeholder="Email Address"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    autofocus
                >
                @error('email')
                    <span class="error-message" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="input-group">
                <input
                    type="password"
                    name="password"
                    class="input-field @error('password') border-red-500 @enderror"
                    placeholder="Password"
                    required
                    autocomplete="current-password"
                >
                @error('password')
                    <span class="error-message" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="flex items-center mb-4">
                <input
                    type="checkbox"
                    name="remember"
                    id="remember"
                    class="mr-2"
                    {{ old('remember') ? 'checked' : '' }}
                >
                <label for="remember" class="text-sm text-gray-600">
                    Remember Me
                </label>
            </div>

            <button type="submit" class="login-btn">
                {{ __('Sign In') }}
            </button>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>

        @if (session('status'))
            <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('status') }}
            </div>
        @endif
    </div>
</div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5 pt-5">
                        <img src="{{ asset('images/login.jpg') }}" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf
                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start pt-4 pb-2">
                                <p class="lead fw-normal mb-0 me-3">Log in</p>
                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" name="email"  id="form3Example3" class="form-control form-control-lg @error('email') border-red-500 @enderror" placeholder="Enter a valid email address" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                <label class="form-label" for="form3Example3">Email address</label>
                                @error('email')
                                <span class="error-message" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-3">
                                <input type="password" name="password" id="form3Example4" class="form-control form-control-lg @error('password') border-red-500 @enderror" placeholder="Enter password" required autocomplete="current-password" />
                                <label class="form-label" for="form3Example4">Password</label>
                                @error('password')
                                <span class="error-message" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="form2Example3">
                                        Remember me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <a href="#" class="forgot-password">Forgot password?</a>
                                @endif
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                                        class="link-danger">Register</a></p>

                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
