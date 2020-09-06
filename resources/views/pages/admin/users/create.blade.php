@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
        <div class="btn-kembali">
            <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm">
                <i class="fas fa-arrow-left"> Kembali</i>
            </a>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select name="roles" required class="form-control">
                        <option value="Roles">Roles</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="USER">USER</option>
                    </select>
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