@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    
    @endif
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Galeri Peternak</h1>
        <a href="{{ route('peternak_gallery.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Foto
        </a>
    </div>

    <!-- Cari Foto Peternak   -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <form class="form-inline form-search mr-auto mb-4" method="get" action="{{ route('peternak_gallery.index') }}">
        @csrf
            <input class="form-control mr-auto" name="cari" type="search" placeholder="Cari Foto" aria-label="Cari Foto">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </div>

    <div class="row">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" cellspascing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th> 
                        <th class="text-center">Peternak</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($items as $item => $hasil)
                        <tr>
                            <td class="text-center">{{ $item + $items->firstitem() }}</td>
                            <td>{{ $hasil->nama}}</td>
                            <td class="text-center">
                                <img src="{{ Storage::url($hasil->image) }}" alt="" style="width: 80px; height: 50px" class="img-tumbnail" />
                            </td>
                            <td class="text-center">
                                <a href="{{ route('peternak_gallery.edit', $hasil->id) }}" class="btn btn-info py-0">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('peternak_gallery.destroy', $hasil->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger py-0">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Data Kosong
                    </td>
                </tr>                 
                @endforelse
                </tbody>
            </table>
            <div class="d-block col-12 mt-4">
                {{ $items->links() }}
            </div>
        </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection