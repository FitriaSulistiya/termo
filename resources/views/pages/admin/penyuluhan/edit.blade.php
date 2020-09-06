@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Penyuluhan</h1>
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
            <form action="{{ route('penyuluhan.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{ $item->judul }}">
                </div>
                <div class="form-group">
                    <label for="isi_penyuluhan">Isi Penyuluhan</label>
                    <textarea class="form-control" name="isi_penyuluhan" id="isi_penyuluhan" cols="30" rows="5" placeholder="Isi Penyuluhan">{{ $item->isi_penyuluhan }}</textarea>
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