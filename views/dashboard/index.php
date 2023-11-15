<?php

use yii\helpers\Html;

$this->title = 'ASD - Dashboard';
?>

<div class="d-grid mt-3">
    <div class="fw-bold fs-4">Dashboard</div>
</div>
<div class="d-grid mt-3">
    <div class="row gap-3 gap-xl-0">
        <div class="col-xl-4 col-md-12">
            <div class="card border-0 shadow-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 card-icon"><i class="bi bi-collection-fill"></i></div>
                        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">
                                Total Furniture
                            </div>
                            <div class="card-count">
                                <?= $totalFurniture ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card border-0 shadow-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 card-icon"><i class="fas fa-clipboard-list"></i></div>
                        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">
                                Total Pesanan
                            </div>
                            <div class="card-count">
                                <?= $totalPemesanan ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card border-0 shadow-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 card-icon"><i class="bi bi-people-fill"></i></div>
                        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">
                                Total Pembeli
                            </div>
                            <div class="card-count">
                                <?= $totalPembeli ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-grid mt-4">
    <div class="row gap-3 gap-xl-0">
        <div class="col-xl-4 col-md-12">
            <div class="card border-0 shadow-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 card-icon"><i class="fas fa-bookmark"></i></div>
                        <div class="col-9 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">
                                Total Pesanan Ditampung
                            </div>
                            <div class="card-count">
                                <?= $totalPesananDitampung ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card border-0 shadow-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 card-icon"><?= Html::img('@web/img/process.png', ['height' => '65px']); ?></div>
                        <div class="col-9 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">
                                Total Pesanan Dibuat
                            </div>
                            <div class="card-count">
                                <?= $totalPesananDibuat ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card border-0 shadow-custom">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 card-icon"><i class="bi bi-check-circle-fill"></i></div>
                        <div class="col-9 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">
                                Total Pesanan Selesai
                            </div>
                            <div class="card-count">
                                <?= $totalPesananSelesai ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>