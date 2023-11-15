<?php

use app\libs\grid\AppSerialColumn;
use app\libs\grid\AppGridView;
use yii\helpers\Html;

$this->title = 'ASD - Laporan Furniture';
?>
<div class="card border-0 shadow-custom rounded-3 px-3 mt-3">

    <div class="card-header border-0 bg-white py-3">
        <div class="d-md-flex d-grid gap-2 align-items-center">
            <div class="mb-0 flex-grow-1 fw-bold fs-5">Laporan Furniture</div>
        </div>
    </div>

    <div class="card-body border border-1 border-end-0 border-start-0">
        <div>
            <?= $this->render('searchFurniture', ['model' => $searchModel]); ?>
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
                    'attribute' => 'created_at',
                    'label' => 'Tanggal Input',
                    'value' => function ($model) {
                        if ($model->created_at) {
                            $formattedDate = date('d-m-Y H:i', strtotime($model->created_at));
                            return $formattedDate . ' WITA';
                        } else {
                            return '-';
                        }
                    },
                ],
                [
                    'attribute' => 'nama_furniture',
                    'label' => 'Nama Furniture',
                ],

                [
                    'attribute' => 'deskripsi',
                    'format' => 'raw',
                    'label' => 'Deskripsi',
                ],

                [
                    'attribute' => 'harga',
                    'label' => 'Harga',
                    'value' => function ($model) {
                        return 'Rp.' . number_format($model->harga, 0, ',', '.');
                    },
                ],
            ],
        ]); ?>
    </div>
</div>