@extends('layouts.app')
@section('title', 'Detail Peternak')

@section('content')
<main>
    <!-- Link Halaman -->
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}"style="color: #332C2B;">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('daftar_peternak') }}"style="color: #332C2B;">Daftar Peternak</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Detail Peternak
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card card-details-peternak">
                <div class="row">
                    <div class="section-left col-md-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <?php
                                        $i = 0;
                                        foreach ($item->peternak_galleries as $row) {
                                            $actives = '';
                                            if($i == 0) {
                                                $actives = 'active';
                                            }
                                    ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>

                                    <?php $i++; } ?>
                                </ul>
                            
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <?php
                                    $i = 0;
                                    foreach ($item->peternak_galleries as $row) {
                                        $actives = '';
                                        if($i == 0) {
                                            $actives = 'active';
                                        }
                                ?>
                                <div class="carousel-item <?= $actives; ?>">
                                    <img class="my-4" src="{{ Storage::url($row->image) }}" width="100%" height="350">
                                </div>
                                
                                <?php $i++; } ?>
                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                    </div>     
                    <div class="section-right col-md-6 my-5">
                        <div class="content-kanan-peternak">
                            <div class="detail-peternak"><h3>{{ $item->deskripsi }}</h3></div>
                            <div class="status">
                                @if ($item->status_verifikasi == 'Terverifikasi')
                                    <span class="label label-success">{{ $item->status_verifikasi }}</span>
                                @elseif ($item->status_verifikasi == 'Belum Terverifikasi')
                                    <span class="label label-danger">{{ $item->status_verifikasi }}</span>
                                @endif
                            </div>
                            <div>
                                <p class="judul-tabel">Peternak</p>
                            </div>
                            <table class="table unstyled" cellspascing="0">
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $item->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>{{ $item->no_telp }}</td>
                                </tr>
                                <tr>
                                    <td class="judul-tabel">Ternak</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Jenis Ternak</td>
                                    <td>{{ $item->jenis_ternak }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Ternak</td>
                                    <td>{{ $item->jumlah_ternak }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection