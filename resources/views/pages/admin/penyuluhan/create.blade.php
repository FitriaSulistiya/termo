@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Penyuluhan</h1>
        <div class="btn-kembali">
            <a href="{{ route('penyuluhan.index') }}" class="btn btn-dark btn-sm">
                <i class="fas fa-arrow-left"> Kembali</i>
            </a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('penyuluhan.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ old('judul') }}">
                </div>
                <div class="form-group">
                    <label for="isi_penyuluhan">Isi Penyuluhan</label>
                    <textarea class="form-control" name="isi_penyuluhan" id="isi_penyuluhan" cols="30" rows="5" placeholder="Isi Penyuluhan">{{ old('isi_penyuluhan') }}</textarea>
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