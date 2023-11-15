<?php

use yii\helpers\Html;

$this->title = 'Pemesanan - Detail Pesanan';
\yii\web\YiiAsset::register($this);
?>
<div class="row mt-2">
    <div class="col-12 col-lg-6 p-2">
        <div class="card col-lg-12 rounded-4 border-0 shadow-custom p-2 mb-2">
            <div class="card-header bg-white">
                <div class="d-flex align-items-center">
                    <div class="fs-5 mb-0 flex-grow-1 fw-bold">Detail Pesanan</div>
                    <div class="flex-shrink-0">
                        <?= Html::a('', ['pemesanan'], ['class' => 'btn btn-close', 'aria-label' => "Closed"]) ?>
                    </div>
                </div>
            </div>
            <div class="card-body border-end-0 border-start-0">
                <div class="d-flex flex-column gap-3">
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>No. Pemesanan</small></div>
                        <div class="fw-semibold"><?= $model->no_pemesanan ?></div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>No. Invoice</small></div>
                        <div class="fw-semibold"><?= $model->no_invoice ?></div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Tanggal Pemesanan</small></div>
                        <div class="fw-semibold"><?= date('d-m-Y H:i', strtotime($model->tanggal_pemesanan)) ?> WITA</div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Nama Pembeli</small></div>
                        <div class="fw-semibold"><?= $model->pembeli->nama_pembeli ?></div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Qty</small></div>
                        <div class="fw-semibold"><?= $model->qty ?></div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Nama Furniture</small></div>
                        <div class="fw-semibold"><?= $model->furniture->nama_furniture ?></div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Pekerjaan</small></div>
                        <div class="fw-semibold"><?= $model->pekerjaan ?></div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Harga Unit</small></div>
                        <div class="fw-semibold">Rp.<?= number_format($model->harga_unit, 0, ',', '.') ?></div>
                    </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Harga Total</small></div>
                        <div class="fw-semibold">Rp.<?= number_format($model->harga_total, 0, ',', '.') ?></div>
                    </div>
                        <div class="d-grid">
                            <div class="fw-bold text-black"><small>DP</small></div>
                            <div class="fw-semibold">Rp.<?= number_format($model->dp, 0, ',', '.') ?></div>
                        </div>
                    <div class="d-grid">
                        <div class="fw-bold text-black"><small>Sisa</small></div>
                        <div class="fw-semibold">Rp.<?= number_format($model->sisa, 0, ',', '.') ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 p-2">
        <div class="card col-lg-12 rounded-4 border-0 shadow-custom p-2 mb-2">
            <div class="card-header bg-white">
                <div class="d-flex align-items-center">
                    <div class="fs-5 mb-0 flex-grow-1 fw-bold text-center">Status Pesanan</div>
                </div>
            </div>
            <div class="card-body border-end-0 border-start-0">
                <div>
                    <?php if ($model->status === 'Pesanan Ditampung') : ?>
                        <span class="badge-detail badge-secondary"><?= $model->status ?></span>
                        <div class="text-muted mt-2">Pada : <?= date('d-m-Y H:i', strtotime($model->created_at)) ?> WITA</div>
                    <?php elseif ($model->status === 'Pesanan Dibuat') : ?>
                        <span class="badge-detail badge-primary"><?= $model->status ?></span>
                        <div class="text-muted mt-2">Pada : <?= date('d-m-Y H:i', strtotime($model->updated_at)) ?> WITA</div>
                    <?php elseif ($model->status === 'Pesanan Selesai') : ?>
                        <span class="badge-detail badge-success"><?= $model->status ?> & Terkirim</span>
                        <div class="text-muted mt-2">Pada : <?= date('d-m-Y H:i', strtotime($model->updated_at)) ?> WITA</div>
                    <?php endif; ?>
                </div>
                <?php if ($model->status === 'Pesanan Dibuat') : ?>
                    <div class="mt-3 d-grid">
                        <a class="btn btn-outline-primary" href="whatsapp://send?phone=<?= $model->pembeli->no_telp ?>">Konfirmasi Pembeli</a>
                    </div>
                <?php elseif ($model->status === 'Pesanan Selesai') : ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>