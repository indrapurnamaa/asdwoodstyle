<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\HomeAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;

HomeAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= Yii::getAlias('@web/img/logo.png') ?>" type="image/png">
    <?php $this->head() ?>
</head>

<body id="home">
    <?php $this->beginBody() ?>
    <header id="header">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <div class="container-fluid bg-white">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
                    <a href="#home" class="navbar-brand d-lg-none text-primary fw-bold">
                        ASD Woodstyle
                    </a>
                    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand text-primary fw-bold d-none d-lg-block" href="#home">ASD Woodstyle Custom Furniture</a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto mb-1 mb-lg-0">
                            <a href="#home" class="nav-item nav-link active">Home</a>
                            <a href="#tentang" class="nav-item nav-link">Tentang</a>
                            <a href="#galeri" class="nav-item nav-link">Galeri</a>
                            <a href="#kontak" class="nav-item nav-link">Kontak</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
    </header>

    <main>
        <div>
            <?= $content ?>
        </div>
    </main>

    <footer>
        <!-- Footer Start -->
        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#9c5220" fill-opacity="1" d="M0,192L48,181.3C96,171,192,149,288,144C384,139,480,149,576,176C672,203,768,245,864,256C960,267,1056,245,1152,224C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg> -->
        <div class="container-fluid bg-primary custom-margin-top">
            <div class="container py-5">
                <div class="row" style="margin-top: 150px;"> 
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white">Alamat</h5>
                        <div class="text-white">
                            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl Widuri Basangtamiang, Kapal, Kec. Mengwi</p>
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>0857 9277 6600</p>
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i>asdwoodstyle@gmail.com</p>
                        </div>
                        <div class="d-flex pt-3">
                            <a class="btn btn-square btn-light rounded-circle me-2" href="https://www.instagram.com/asdwoodstyle/"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-light rounded-circle me-2" href="https://www.facebook.com/pages/ASD%20Woodstyle%20Custom%20Furniture/104836797925136/"><i class="fab fa-facebook-f"></i></a>
                        </div>
                        <div class="col-lg-12 col-md-6 mt-4">
                            <h4 class="text-white">Jam Kerja</h4>
                            <div class="text-white">
                                <p class="mb-1">Senin - Sabtu</p>
                                <h6 class="text-light">08:00 - 17:00 WITA</h6>
                                <p class="mb-1">Minggu</p>
                                <h6 class="text-light">Tutup</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-md-12 mt-4">
                        <div class="mapouter ">
                            <div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=asd woodstyle custom furniture&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://connectionsgame.org/">Connections NYT</a></div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    width: 100%;
                                    height: 400px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    width: 100%;
                                    height: 400px;
                                    border-radius: 10px;
                                }

                                .gmap_iframe {
                                    height: 400px !important;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="text-center mb-3 mb-md-0">
                    &copy; <a class="fw-medium text-light" href="#">ASD Woodstyle Custom Furniture <?= date('Y') ?></a>, All Right Reserved.
                </div>
            </div>
        </div>
        <!-- Copyright End -->
    </footer>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>