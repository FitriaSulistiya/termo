@extends('layouts.login')

@section('title', 'Login')

@section('content')
<main class="login-container">
    <div class="container">
        <div class="row page-login d-flex align-items-center">
            <div class="section-left col-md-5">
                <h1 class="mb-4">Get the venture<br /> capital</h1>
                <img src="{{ url('/frontend/images/login-image.png') }}" height="400" class="w-75 d-none d-sm-flex"/>
            </div>
                <div class="section-right col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url('/frontend/images/Tulisan Termo.png') }}"/>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
				            @csrf
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input 
                                        type="email" 
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        aria-describedby="emailHelp"
                                        required autocomplete="email" autofocus
                                    >
					                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input 
                                        type="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        id="password"
                                        name="password"
                                        required autocomplete="current-password"
                                    >
					                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
				                    @if (Route::has('password.request'))
                                    <a class="btn btn-link text-center mt-4" href="{{ route('password.request') }}">
                                        {{ __('Saya lupa password') }}
                                    </a>
                                @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
