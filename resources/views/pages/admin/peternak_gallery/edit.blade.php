@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Foto</h1>
        <div class="btn-kembali">
            <a href="{{ route('peternak_gallery.index') }}" class="btn btn-dark btn-sm">
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
            <form action="{{ route('peternak_gallery.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="peternak_id">Peternak</label>
                    <!-- <input type="text"  name="peternak_id" class="form-control @error('peternak_id') is-invalid @enderror"value="{{ $item->peternak_id }}"> -->
                    <select name="peternak_id" required class="form-control">
                        <option value="{{ $item->peternak_id }}">Jangan Diubah</option>
                        @foreach ($peternak as $p)
                            <option value="{{ $p->id }}">
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Foto</label>
                    <input type="file"  name="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback">The image field is required</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3 btn-block">
                    Ubah                
                </button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection