@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Peternak</h1>
        <div class="btn-kembali">
            <a href="{{ route('peternak.index') }}" class="btn btn-dark btn-sm">
                <i class="fas fa-arrow-left"> Kembali</i>
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('peternak.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $item->user->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="2" placeholder="Deskripsi">{{ $item->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{ $item->nama }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5" placeholder="Alamat">{{$item->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="tel" class="form-control" pattern="\d\d\d\d\d\d\d\d\d\d\d\d" name="no_telp" placeholder="Nomor Telepon" value="{{ $item->no_telp }}">
                </div>
                <div class="form-group">
                    <label for="jenis_ternak">Jenis Ternak</label>
                    <input type="text" class="form-control" name="jenis_ternak" placeholder="Jenis Ternak" value="{{ $item->jenis_ternak }}">
                </div>
                <div class="form-group">
                    <label for="jumlah_ternak">Jumlah Ternak</label>
                    <input type="number" class="form-control" name="jumlah_ternak" placeholder="Jumlah Ternak" value="{{ $item->jumlah_ternak }}">
                </div>
                <div class="form-group">
                    <label for="status_verifikasi">Status Verifikasi</label>
                    <select name="status_verifikasi" required class="form-control">
                        <option value="{{ $item->status_verifikasi }}">
                            Jangan Ubah ({{ $item->status_verifikasi }})
                        </option>
                        <option value="Terverifikasi">Terverifikasi</option>
                        <option value="Belum Terverifikasi">Belum Terverifikasi</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah                
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection