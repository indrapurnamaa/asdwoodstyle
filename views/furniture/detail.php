<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Furniture - Detail Furniture';
\yii\web\YiiAsset::register($this);
?>
<div class="row mt-2">
    <div class="col-12 col-lg-5 p-2">
        <div class="card col-lg-12 rounded-4 border-0 shadow-custom p-2 mb-2">
            <div class="card-header bg-white">
                <div class="d-flex align-items-center">
                    <div class="fs-5 mb-0 flex-grow-1 fw-bold">Detail Furniture</div>
                    <div class="flex-shrink-0">
                        <?= Html::a('', ['furniture'], ['class' => 'btn btn-close', 'aria-label' => "Closed"]) ?>
                    </div>
                </div>
            </div>
            <div class="card-body border-end-0 border-start-0">
                <div class="d-flex flex-column gap-3">
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Nama Furniture</small></div>
                        <div class="fw-semibold"><?= $model->nama_furniture ?></div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Deskripsi</small></div>
                        <div class="fw-semibold"><?= $model->deskripsi ?></div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Harga</small></div>
                        <div class="fw-semibold">Rp.<?= number_format($model->harga, 0, ',', '.') ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-7 p-2">
        <div class="card col-lg-12 rounded-4 border-0 shadow-custom p-2 mb-2">
            <div class="card-header bg-white">
                <div class="d-flex align-items-center">
                    <div class="fs-5 mb-0 flex-grow-1 fw-bold text-center">Foto Furniture</div>
                </div>
            </div>
            <div class="card-body border-end-0 border-start-0">
                <div class="d-flex flex-column gap-3">
                    <div class="d-grid">
                        <?php
                        if (!empty($model->gambar)) {
                        ?>
                            <img src="<?= Yii::$app->request->baseUrl; ?>/img/furniture/<?= $model->gambar; ?>" width="100%" class="rounded-4" />
                        <?php
                        } else {
                        ?>
                            <h4 class="text-center">Tidak ada foto.</h4>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>