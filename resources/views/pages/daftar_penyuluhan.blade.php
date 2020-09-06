@extends('layouts.app')
@section('title', 'Daftar Penyuluhan')

@section('content')
<main>
<!-- Link Halaman -->
    <section class="section-details-header"></section>
        <section class="section-details-content-list-peternak">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}"style="color: #332C2B;">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Daftar Penyuluhan
                                </li>
                            </ol>
                            <!-- Cari Peternak   -->
                            <form class="form-inline form-search ml-auto" method="get" action="{{ route('daftar_penyuluhan') }}">
                                <input class="form-control ml-auto mr-2" name="cari" type="search" placeholder="Cari Penyuluhan" aria-label="Cari Penyuluhan">
                                <button class="btn btn-search my-2 my-sm-0" type="submit">Cari</button>
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- Daftar Peternak -->
    <div class="container container-card">
        <div class="row">
            @foreach ($items as $item)
            <div class="col-sm-4 col-md-4 col-lg-3 mt-auto">
                <div class="card-peternak">
                    <img class="card-img-top" src="{{ $item->penyuluhan_galleries->count() ? Storage::url($item->penyuluhan_galleries->first()->image) : url('frontend/images/not-found.png') }}" alt="Gambar">
                    <div class="card-body">
                        <a href="{{ route('detail_penyuluhan', $item->slug) }}" class="card-text">{{ substr($item->judul, 0, 25) }}{{ strlen($item->judul) > 25 ? "..." : "" }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection