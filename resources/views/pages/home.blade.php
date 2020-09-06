@extends('layouts.home')
@section('title', 'TERMO')

@section('content')
<!-- Header -->
<header class="text-center">
    <div class="container container-header">
        <div class="row justify-content-center">  
                <div class="">
                    <p class="text title-first">Mulailah Tanam Modal</p>
                    <p class="text body-top mx-4">Investasi bersama peternak lokal dan Anda dapat memilih peternak untuk bekerjasama sesuai dengan pilihan Anda</p>
                    <a href="{{ route('daftar_peternak') }}" class="btn btn-lihat-peternak px-3">
                        Lihat Peternak
                    </a>
                    <p class="text title-second">Daftarkan Diri Sebagai Peternak</p>
                    <p class="text body-bottom mx-4">Untuk mendapatkan modal usaha dengan registrasi terlebih dahulu</p>
                    <a href="{{ route('register') }}" class="btn btn-registrasi-peternak px-3">
                        Registrasi Peternak
                    </a>
                </div>
                <img src="{{ url('frontend/images/ilustermo.png') }}" alt="gambar" class="header-gambar-detail">
        </div>
    </div>
    
</header>
<div class="header-gambar text-center">

</div>


<!-- Penyuluhan -->
<div class="section section-content-penyuluhan">
    <div class="container container-penyuluhan text-center">
        <div class="row">
            <div class="col penyuluhan-heading">
                <p>Penyuluhan</p>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($items as $item)
            <div class="col-xs-5 col-sm-5 col-md-4 col-lg-2">
                <div class="card-penyuluhan text-center shadow">
                    <img class="card-img-top" src="{{ $item->penyuluhan_galleries->count() ? Storage::url($item->penyuluhan_galleries->first()->image) : url('frontend/images/not-found.png') }}" alt="Gambar">
                    <div class="card-body">
                        <a href="{{ route('detail_penyuluhan', $item->slug) }}" class="card-title">{{ substr($item->judul, 0, 30) }}{{ strlen($item->judul) > 30 ? "..." : "" }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="btn btn-sm btn-daftar-penyuluhan my-5" href="{{ route('daftar_penyuluhan') }}" role="button" style="background-color: #071C4D; color: #fff;">Lihat Semua</a>
    </div>
    
</div>


@endsection