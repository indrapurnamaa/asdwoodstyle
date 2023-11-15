<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
// use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

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
    <link rel="shortcut icon" href="<?= Yii::getAlias('@web/img/logo.png') ?>" type="image/png">
    <?php $this->head() ?>
</head>


<body class="d-flex flex-column h-100 bg-body">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => Html::img('@web/img/logo.png', ['alt' => Yii::$app->name, 'class' => 'brand-image-navbar']),
            'brandUrl' => null,
            'options' => ['class' => 'navbar navbar-expand-lg shadow-custom bg-white fixed-top navbar-logo']
        ]);
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
                ['label' => Html::tag('span', '<i class="bi bi-bar-chart-fill"></i> Dashboard'), 'url' => ['/dashboard/dashboard']],
                ['label' => Html::tag('span', '<i class="bi bi-collection-fill"></i> Furniture'), 'url' => ['/furniture/furniture'], 'active' => in_array($this->context->route, ['furniture/furniture', 'furniture/tambah-furniture', 'furniture/update', 'furniture/view'])],
                ['label' => Html::tag('span', '<i class="fas fa-clipboard-list"></i> Pemesanan'), 'url' => ['/pemesanan/pemesanan'], 'active' => in_array($this->context->route, ['pemesanan/pemesanan', 'pemesanan/tambah-pesanan', 'pemesanan/ubah-pesanan', 'pemesanan/detail-pesanan'])],
                ['label' => Html::tag('span', '<i class="bi bi-people-fill"></i> Pembeli'), 'url' => ['/pembeli/pembeli'], 'active' => in_array($this->context->route, ['pembeli/pembeli', 'pembeli/tambah-pembeli', 'pembeli/ubah-pembeli'])],
                ['label' => Html::tag('span', '<i class="bi bi-card-image"></i> Galeri'), 'url' => ['/galeri/galeri'], 'active' => in_array($this->context->route,['galeri/galeri','galeri/tambah-galeri'])],
                // Laporan Menu
                // [
                //     'label' => Html::tag('span', '<i class="fas fa-book"></i> Laporan'),
                //     'items' => [
                //         ['label' => Html::tag('span', 'Laporan Furniture'), 'url' => ['/laporan/laporan-furniture']],
                //         ['label' => Html::tag('span', 'Laporan Pemesanan'), 'url' => ['/laporan/laporan-pemesanan']],
                //         ['label' => Html::tag('span', 'Laporan Pembeli'), 'url' => ['/laporan/laporan-pembeli']],
                //     ]
                // ],
            ]
        ]);
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav ms-auto mb-1 mb-lg-0'],
            'items' => [
                [
                    'label' => Html::tag('span', '<i class="bi bi-gear-fill"></i>'),
                    'dropdownOptions' => ['class' => 'dropdown-menu-end'],
                    'items' => [
                        ['label' => Html::tag('span', '<i class="bi bi-box-arrow-right"></i> Logout'), 'url' => ['/site/logout']],
                    ]
                ],
            ],
        ]);
        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light shadow-custom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">&copy; ASD Woodstyle Custom Furniture <?= date('Y') ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>