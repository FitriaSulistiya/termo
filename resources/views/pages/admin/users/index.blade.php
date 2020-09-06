@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mb-1">User</h1>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah User
        </a>
    </div>

    <!-- Cari User   -->
    <div class="d-sm-flex align-items-center justify-content-between">
        <form class="form-inline form-search mr-auto mb-4" method="get" action="{{ route('users.index') }}">
        @csrf
            <input class="form-control mr-auto" name="cari" type="search" placeholder="Cari User" aria-label="Cari User">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-sm table-hover table-bordered" cellspascing="0">
            <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Roles</th>
                        <th class="text-center">Aksi</th>
                    </tr>
            </thead>
                <tbody>
                    @forelse ($items as $item => $hasil)
                        <tr>
                            <td class="text-center">{{ $item + $items->firstitem() }}</td>
                            <td>{{ $hasil->name }}</td>
                            <td>{{ $hasil->email }}</td>
                            <td>{{ $hasil->roles }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $hasil->id) }}" class="btn btn-info py-0">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('users.destroy', $hasil->id) }}" method="post" class="d-inline">
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