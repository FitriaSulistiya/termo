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
        <h1 class="h3 mb-0 text-gray-800 mb-1">Peternak</h1>
        <a href="{{ route('peternak.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Peternak
        </a>
    </div>

    <!-- Cari Peternak   -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <form class="form-inline form-search mr-auto mb-4" method="get" action="{{ route('peternak.index') }}">
        @csrf
            <input class="form-control mr-auto" name="cari" type="search" placeholder="Cari Peternak" aria-label="Cari Peternak">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-sm table-hover table-bordered" cellspascing="0">
            <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Nomor Telepon</th>
                        <th class="text-center">Jumlah Ternak</th>
                        <th class="text-center">Jenis Ternak</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
            </thead>
                <tbody>
                    @forelse ($items as $item => $hasil)
                        <tr>
                            <td class="text-center">{{ $item + $items->firstitem() }}</td>
                            <td>{{ $hasil->user->email }}</td>
                            <td>{{ substr($hasil->deskripsi, 0, 20) }}{{ strlen($hasil->deskripsi) > 20 ? "..." : "" }}</td>
                            <td>{{ substr($hasil->nama, 0, 20) }}{{ strlen($hasil->nama) > 20 ? "..." : "" }}</td>
                            <td>{{ substr($hasil->alamat, 0, 20) }}{{ strlen($hasil->alamat) > 20 ? "..." : "" }}</td>
                            <td class="text-center">{{ $hasil->no_telp }}</td>
                            <td class="text-center">{{ $hasil->jumlah_ternak }}</td>
                            <td class="text-center">{{ $hasil->jenis_ternak }}</td>
                            <td class="text-center">{{ $hasil->status_verifikasi }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('peternak.edit', $hasil->id) }}" class="btn btn-info py-0">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('peternak.destroy', $hasil->id) }}" method="post" class="d-inline">
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
                            <td colspan="9" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                    @endforelse
                </tbody>
        </table>
    </div>
    <div class="d-block col-12 mt-2">
        {{ $items->links() }}
    </div>
</div>
<!-- /.container-fluid -->
@endsection