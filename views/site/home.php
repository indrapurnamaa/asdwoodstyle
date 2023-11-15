<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'ASD Woodstyle Custom Furniture';
?>
<!-- Carousel Start -->
<div class="container-fluid px-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/furniture.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7 text-start">
                                <p class="fs-4 text-white animated slideInRight text-tengah">
                                    <strong>ASD Woodstyle Custom Furniture</strong>
                                <h1 class="display-3 text-white mb-4 animated slideInRight text-tengah">Miliki furniture dengan desain yang anda inginkan</h1>
                                <div class="text-tengah">
                                    <a href="https://api.whatsapp.com/send?phone=+6285792776600&text=Hi%20ASD%20Woodstyle%20Custom%20Furniture,%20Saya%20tertarik%20dengan%20produk%20anda." target="_blank" class="btn btn-primary rounded-pill py-3 px-5 animated slideInRight">Pesan
                                        Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Feature Start -->
<div class="container-xxl p-4 mt-2">
    <div class="container">
        <div class="row gap-3 gap-md-0">
            <div class="col-md-12 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="d-flex align-items-center justify-content-start" style="width: 40px; height: 50px;">
                        <i class="fa fa-user-check fa-2x text-primary"></i>
                    </div>
                </div>
                <h5>Desain Sesuai Keinginan</h5>
                <p>Desain sesuai keinginan anda.</p>
            </div>
            <div class="col-md-12 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="d-flex align-items-center justify-content-start" style="width: 40px; height: 50px;">
                        <i class="fa fa-check fa-2x text-primary"></i>
                    </div>
                </div>
                <h5>Produk Berkualitas</h5>
                <p>Produk yang kami hasilkan pastinya berkualitas sesuai dengan keinginan anda.</p>
            </div>
            <div class="col-md-12 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="d-flex align-items-center justify-content-start" style="width: 40px; height: 50px;">
                        <i class="fa fa-drafting-compass fa-2x text-primary"></i>
                    </div>
                </div>
                <h5>Konsultasi Furniture</h5>
                <p>Konsultasi tentang furniture yang anda inginkan.</p>
            </div>
        </div>
    </div>
</div>
<!-- Feature Start -->

<!-- About Start -->
<div class="container-xxl pt-5 mt-3 about" id="tentang">
    <div class="container">
        <div class="row g-0">
            <div class="col-12 col-lg-6 col-md-12 pt-5 pt-md-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white rounded-top p-4 p-md-5">
                    <p class="fs-3 fw-bold text-primary">Tentang Kami</p>
                    <p class="mb-4 text-rata">ASD Woodstyle Custom Furniture merupakan usaha mebel yang bergerak pada bidang custom furniture dan berdiri sejak tahun 2019, saat ini kami telah membuat kurang lebih 200 custom furniture dari berbagai bahan dengan kualitas yang terbaik namun dengan harga yang affordable.</p>
                    <!-- <a class="btn btn-primary rounded-pill py-3 px-5" href="about.html">Lebih Lanjut</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#9c5220" fill-opacity="1" d="M0,64L48,90.7C96,117,192,171,288,170.7C384,171,480,117,576,117.3C672,117,768,171,864,213.3C960,256,1056,288,1152,272C1248,256,1344,192,1392,160L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
</svg>
<!-- Project Start -->
<div class="container-xxl pt-5" id="galeri">
    <div class="container">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-3 fw-bold text-primary">Galeri</p>
            <h1 class="display-5 mb-4">Galeri ASD Woodstyle Custom Furniture</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php foreach ($galeri as $filename) : ?>
                <div class="project-item card-galeri mb-5">
                    <div class="position-relative">
                        <?= Html::img('@web/img/galeri/' . $filename, ['class' => 'img-responsive', 'alt' => $filename]) ?>
                        <div class="project-overlay">
                            <?= Html::a('<i class="fa fa-eye"></i>', ['@web/img/galeri/' . $filename], ['class' => 'btn btn-lg-square btn-light rounded-circle m-1', 'data-lightbox' => 'project']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Project End -->

<!-- Kontak Start -->
<!-- For Desktop screen -->
<div class="d-none d-md-flex">
    <div class="container-xxl" id="kontak">
        <div class="container text-center kontak-margin">
            <div class="card border-0 shadow-custom p-lg-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 mt-5 mt-md-5 mt-lg-3">
                            <h2 class="text-center text-lg-start">Kontak Kami</h2>
                            <p class="mb-5 fw-semibold text-center text-lg-start">Hubungi kami melalui WhatsApp untuk pertanyaan lebih lanjut.</p>
                            <a href="https://wa.me/+6285792776600" target="_blank" class="btn btn-primary rounded-pill py-3 px-4 animated slideInRight d-lg-none d-inline"><i class="bi bi-whatsapp"></i> ASD Woodstyle</a>
                        </div>
                        <div class="col-lg-4 col-md-12 kontak">
                            <a href="https://wa.me/+6285792776600" target="_blank" class="btn btn-primary rounded-pill py-3 px-4 animated slideInRight d-none d-lg-block"><i class="bi bi-whatsapp"></i> ASD Woodstyle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- For Phone screen -->
<div class="d-flex d-md-none">
    <div style="margin-top: 60px;" id="kontak">
        <div class="container text-center kontak-margin">
            <div class="card border border-0 shadow-custom p-lg-4">
                <div class="card-body">
                    <div class="p-2">
                        <h2 class="text-center mb-3">Kontak Kami</h2>
                        <p class="mt-2 fw-semibold text-center">Hubungi kami melalui WhatsApp untuk pertanyaan lebih lanjut.</p>
                        <a href="https://wa.me/+6285792776600" target="_blank" class="mt-2 btn btn-primary rounded-pill py-3 px-4 animated slideInRight"><i class="bi bi-whatsapp"></i> ASD Woodstyle</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kontak End -->