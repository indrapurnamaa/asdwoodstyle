<?php

use app\libs\grid\AppSerialColumn;
use app\libs\grid\AppGridView;
use yii\helpers\Html;
use app\libs\widgets\ActionButtons;
use yii\grid\ActionColumn;
use yii\helpers\Url;

$this->title = 'ASD - Furniture';
?>
<div class="card border-0 shadow-custom rounded-3 px-3 mt-3">

    <div class="card-header border-0 bg-white py-3">
        <div class="d-md-flex d-grid gap-2 align-items-center">
            <div class="mb-0 flex-grow-1 fw-bold fs-5">Furniture</div>
            <div class="flex-shrink-0 d-md-flex d-grid gap-2">
                <?= Html::a('<i class="bi bi-plus-lg"></i> Furniture', ['tambah-furniture'], ['class' => 'btn  btn-primary rounded-3 px-4']) ?>
            </div>
        </div>
    </div>


    <div class="card-body border border-1 border-end-0 border-start-0">
        <div>
            <?= $this->render('search', ['model' => $searchModel]); ?>
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
                [
                    'class' => ActionColumn::class,
                    'header' => 'Actions',
                    'headerOptions' => ['class' => 'text-end'],
                    'contentOptions' => ['class' => 'text-end'],
                    'template' => '{button}',
                    'buttons' => [
                        'button' => function ($url, $model, $key) {
                            $links = [
                                [
                                    'text' => "<i class='bi bi-eye-fill me-1'></i> Detail",
                                    'url' => Url::toRoute(['detail-furniture', 'id' => $model->id]),
                                ],
                                [
                                    'text' => "<i class='bi bi-pencil-fill me-1'></i> Ubah",
                                    'url' => Url::toRoute(['ubah-furniture', 'id' => $model->id]),
                                ],
                                [
                                    'text' => "<i class='bi bi-trash me-1'></i> Hapus",
                                    'url' => Url::toRoute(['hapus-furniture', 'id' => $model->id]),
                                    'options' => ['data-method' => 'post', 'data-confirm' => 'Anda yakin ingin menghapus data ini?'],
                                ],
                            ];

                            return ActionButtons::widget([
                                'dropdownItems' => $links
                            ]);
                        }
                    ]
                ],
            ],
        ]); ?>
    </div>
</div>