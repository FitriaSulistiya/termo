@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Foto</h1>
        <div class="btn-kembali">
            <a href="{{ route('penyuluhan_gallery.index') }}" class="btn btn-dark btn-sm">
                <i class="fas fa-arrow-left"> Kembali</i>
            </a>
        </div>
    </div>

    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('penyuluhan_gallery.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="penyuluhan_id">Penyuluhan</label>
                    <select name="penyuluhan_id" required class="form-control @error('penyuluhan_id') is-invalid @enderror" autofocus>
                        <option value="">Pilih Penyuluhan</option>
                        @foreach ($penyuluhan as $p)
                            <option value="{{ $p->id }}">
                                {{ $p->judul }}
                            </option>
                        @endforeach
                    </select>
                    @error('penyuluhan_id')
                    <div class="invalid-feedback">The penyuluhan field is required</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Foto</label>
                    <input type="file"  name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback">The image field is required</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3 btn-block">
                    Simpan                
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection