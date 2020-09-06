@extends('layouts.user')
@section('title', 'Profile')

@section('content')
<main>
    <!-- Link Halaman -->
    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="card card-details-peternak">
                <div class="row">
                <div class="col">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <?php
                                        $i = 0;
                                        foreach (Auth()->user()->peternak->peternak_galleries as $row) {
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
                                    foreach (Auth()->user()->peternak->peternak_galleries as $row) {
                                        $actives = '';
                                        if($i == 0) {
                                            $actives = 'active';
                                        }
                                ?>
                                <div class="carousel-item <?= $actives; ?>">
                                    <img class="mt-5" src="{{ Storage::url($row->image) }}" width="100%" height="350">
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
                <div class="col">
                        <div class="content-kanan-peternak">
                            <div class="detail-peternak mt-3"><h3>{{ Auth()->user()->peternak->deskripsi }}</h3></div>
                            <div class="status my-3">
                                @if (Auth()->user()->peternak->status_verifikasi == 'Terverifikasi')
                                    <span class="badge badge-pill badge-success">{{ Auth()->user()->peternak->status_verifikasi }}</span>
                                @elseif (Auth()->user()->peternak->status_verifikasi == 'Belum Terverifikasi')
                                    <span class="badge badge-pill badge-danger">{{ Auth()->user()->peternak->status_verifikasi }}</span>
                                @endif
                            </div>

                            <div>
                                <p class="judul-tabel" style="font-weight:bold;">Peternak</p>
                            </div>
                            <table class="table unstyled" cellspascing="0">
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ Auth()->user()->peternak->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ Auth()->user()->peternak->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>{{ Auth()->user()->peternak->no_telp }}</td>
                                </tr>
                                <tr>
                                    <td class="judul-tabel" style="font-weight:bold;">Ternak</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Jenis Ternak</td>
                                    <td>{{ Auth()->user()->peternak->jenis_ternak }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Ternak</td>
                                    <td>{{ Auth()->user()->peternak->jumlah_ternak }}</td>
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