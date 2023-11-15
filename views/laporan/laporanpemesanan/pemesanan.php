<?php

use app\libs\grid\AppSerialColumn;
use app\libs\grid\AppGridView;
use yii\helpers\Html;

$this->title = 'ASD - Laporan Pemesanan';
?>
<div class="card border-0 shadow-custom rounded-3 px-3 mt-3">

    <div class="card-header border-0 bg-white py-3">
        <div class="d-md-flex d-grid gap-2 align-items-center">
            <div class="mb-0 flex-grow-1 fw-bold fs-5">Laporan Pemesanan</div>
        </div>
    </div>

    <div class="card-body border border-1 border-end-0 border-start-0">
        <div>
            <?= $this->render('searchPemesanan', ['model' => $searchModel]); ?>
        </div>
    </div>

    <div class="card-body">
        <?= AppGridView::widget([
            'layout' => '<div class="table-responsive table-card">{items}</div>
       <div class="d-grid d-md-flex align-items-center justify-content-between gap-2 mt-3 pt-3">{summary}{pager}</div>',
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => AppSerialColumn::class],
                [
                    'attribute' => 'no_pemesanan',
                    'label' => 'No. Pemesanan',
                ],
                [
                    'attribute' => 'no_invoice',
                    'label' => 'No. Invoice',
                ],
                [
                    'attribute' => 'tanggal_pemesanan',
                    'label' => 'Tanggal Pemesanan',
                    'value' => function ($model) {
                        if ($model->tanggal_pemesanan) {
                            $formattedDate = date('d-m-Y H:i', strtotime($model->tanggal_pemesanan));
                            return $formattedDate . ' WITA';
                        } else {
                            return '-';
                        }
                    },
                ],
                [
                    'attribute' => 'pembeli.nama_pembeli',
                    'label' => 'Nama Pembeli',
                ],
                [
                    'attribute' => 'qty',
                    'label' => 'Qty',
                ],
                [
                    'attribute' => 'furniture.nama_furniture',
                    'label' => 'Nama Furniture',
                ],
                [
                    'attribute' => 'pekerjaan',
                    'label' => 'Pekerjaan',
                ],
                [
                    'attribute' => 'harga_unit',
                    'label' => 'Harga Unit',
                    'value' => function ($model) {
                        return 'Rp.' . number_format($model->harga_unit, 0, ',', '.');
                    },
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return $model->getStatusLabel();
                    },
                ],
                [
                    'attribute' => 'harga_total',
                    'label' => 'Harga Total',
                    'value' => function ($model) {
                        return 'Rp.' . number_format($model->sisa, 0, ',', '.');
                    },
                ],
                [
                    'attribute' => 'dp',
                    'label' => 'DP',
                    'value' => function ($model) {
                        return 'Rp.' . number_format($model->dp, 0, ',', '.');
                    },
                ],
                [
                    'attribute' => 'sisa',
                    'label' => 'Sisa',
                    'value' => function ($model) {
                        return 'Rp.' . number_format($model->sisa, 0, ',', '.');
                    },
                ],
            ],
        ]); ?>
    </div>
</div>