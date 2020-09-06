@extends('layouts.login')

@section('title', 'Register')

@section('content')
<main class="login-container">
    <div class="container">
        <div class="row page-login d-flex align-items-center">
            <div class="section-left col-md-6">
                <h1 class="mb-4">Get the venture<br /> capital</h1>
                <img src="{{ url('/frontend/images/login-image.png') }}" height="400" class="w-75 d-none d-sm-flex"/>
            </div>
            <div class="section-right col-md-6 my-5">
                <div class="card">
                    <div class="card-body">
                            <div class="text-center">
                                <img src="{{ url('/frontend/images/Tulisan Termo.png') }}"/>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="email">{{ __('Email') }}</label>
                                    <input 
                                        type="email" 
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        aria-describedby="emailHelp"
                                        required autocomplete="email"
                                    >
					                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password">{{ __('Password') }}</label>
                                    <input 
                                        type="password" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        id="password"
                                        name="password"
                                        required autocomplete="new-password"
                                    >
					                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password-confirm">{{ __(' Konfirmasi Password') }}</label>
                                    <input 
                                        type="password" 
                                        class="form-control" 
                                        id="password-confirm"
                                        name="password_confirmation"
                                        required autocomplete="new-password"
                                    >
                            </div>
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="name">{{ __('Nama Lengkap') }}</label>
                                    <input 
                                        type="name" 
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        name="name"
                                        aria-describedby="nameHelp"
                                        required autocomplete="name"
                                    >
					                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="no_telp">{{ __('Nomor Telp') }}</label>
                                    <input 
                                        type="no_telp" 
                                        class="form-control @error('no_telp') is-invalid @enderror"
                                        id="no_telp"
                                        name="no_telp"
                                        aria-describedby="no_telpHelp"
                                        required autocomplete="no_telp"
                                    >
					                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">{{ __('Deskripsi') }}</label>
                                    <input 
                                        type="deskripsi" 
                                        class="form-control @error('deskripsi') is-invalid @enderror"
                                        id="deskripsi"
                                        name="deskripsi"
                                        aria-describedby="deskripsiHelp"
                                        required autocomplete="deskripsi"
                                        Placeholder="Contoh: Sapi Perah Pak Suwardi Batu"
                                    >
					                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">{{ __('Alamat') }}</label>
                                    <input 
                                        type="alamat" 
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat"
                                        name="alamat"
                                        aria-describedby="alamatHelp"
                                        required autocomplete="alamat"
                                    >
					                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                            </div>

                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jenis_ternak">{{ __('Jenis Ternak') }}</label>
                                    <input 
                                        type="jenis_ternak" 
                                        class="form-control @error('jenis_ternak') is-invalid @enderror"
                                        id="jenis_ternak"
                                        name="jenis_ternak"
                                        aria-describedby="jenis_ternakHelp"
                                        required autocomplete="jenis_ternak"
                                    >
					                @error('jenis_ternak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jumlah_ternak">{{ __('Jumlah Ternak') }}</label>
                                    <input 
                                        type="jumlah_ternak" 
                                        class="form-control @error('jumlah_ternak') is-invalid @enderror"
                                        id="jumlah_ternak"
                                        name="jumlah_ternak"
                                        aria-describedby="jumlah_ternakHelp"
                                        required autocomplete="jumlah_ternak"
                                    >
					                @error('jumlah_ternak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                            </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Register') }}
                                </button>
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
