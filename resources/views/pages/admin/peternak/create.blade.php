@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Peternak</h1>
        <div class="btn-kembali">
            <a href="{{ route('peternak.index') }}" class="btn btn-dark btn-sm">
                <i class="fas fa-arrow-left"> Kembali</i>
            </a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('peternak.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    name="email" 
                    aria-describedby="emailHelp"
                    placeholder="Email" 
                    required
                    autocomplete="email">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    name="password" 
                    aria-describedby="passwordHelp"
                    placeholder="Default password : rahasia" 
                    required
                    autocomplete="password"
                    disabled>
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                    name="deskripsi" 
                    id="deskripsi" 
                    cols="30" rows="2" 
                    placeholder="Deskripsi" 
                    required></textarea>
                    @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" 
                    class="form-control @error('nama') is-invalid @enderror" 
                    name="nama" 
                    placeholder="Nama Lengkap" 
                    required>
                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                    name="alamat" 
                    id="alamat" 
                    cols="30" rows="5" 
                    placeholder="Alamat" 
                    required></textarea>
                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="tel" 
                    pattern="^\d{12}$"
                    class="form-control @error('no_telp') is-invalid @enderror"
                    name="no_telp" 
                    placeholder="Nomor Telepon" 
                    required>
                    @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                </div>
                <div class="form-group">
                    <label for="jenis_ternak">Jenis Ternak</label>
                    <input type="text" 
                    class="form-control @error('jenis_ternak') is-invalid @enderror" 
                    name="jenis_ternak" 
                    placeholder="Jenis Ternak" 
                    required>
                    @error('jenis_ternak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                </div>
                <div class="form-group">
                    <label for="jumlah_ternak">Jumlah Ternak</label>
                    <input type="number" 
                    class="form-control @error('jenis_ternak') is-invalid @enderror" 
                    name="jumlah_ternak"
                    placeholder="Jumlah Ternak" 
                    required>
                    @error('jumlah_ternak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                </div>
                
                <div class="form-group">
                    <label for="status_verifikasi">Status Verifikasi</label>
                    <select name="status_verifikasi" required class="form-control @error('status_verifikasi') is-invalid @enderror">
                        <option value="status_verifikasi">Status Verifikasi</option>
                        <option value="Terverifikasi">Terverifikasi</option>
                        <option value="Belum Terverifikasi">Belum Terverifikasi</option>
                    </select>
                    @error('status_verifikasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
                </div> 
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan                
                </button>   
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection