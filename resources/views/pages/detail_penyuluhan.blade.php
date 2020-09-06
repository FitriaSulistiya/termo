@extends('layouts.app')
@section('title', 'Detail Penyuluhan')

@section('content')
<!-- Penyuluhan Detail -->
<main>
    <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}" style="color: #332C2B;">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Detail Penyuluhan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0 mx-auto">
                        <div class="card card-details">
                            <h1>
                                {{ $item->judul }}
                            </h1>
                            <p class="date-created-penyuluhan">
                                {{ date('j-m-y h:i:s', strtotime($item->created_at)) }}
                            </p>

                            <!-- Carousel -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <?php
                                        $i = 0;
                                        foreach ($item->penyuluhan_galleries as $row) {
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
                                    foreach ($item->penyuluhan_galleries as $row) {
                                        $actives = '';
                                        if($i == 0) {
                                            $actives = 'active';
                                        }
                                ?>
                                <div class="carousel-item <?= $actives; ?>">
                                    <img class="d-block my-4" src="{{ Storage::url($row->image) }}" width="100%" height="300">
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

                            <p class="content-penyuluhan">
                                {!! $item->isi_penyuluhan !!}
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
@endsection

<!-- @push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}" />
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 200,
            title: false,
            tint: '#333',
            xoffset: 15
        });
    });
</script>
@endpush -->