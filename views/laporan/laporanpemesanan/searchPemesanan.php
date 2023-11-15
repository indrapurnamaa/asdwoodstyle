<?php

use app\assets\FlatPickrAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

FlatPickrAsset::register($this);
?>

<?php
$form = ActiveForm::begin([
    'action' => ['cetak-pemesanan'],
    'method' => 'get',
]);

$pilihanStatus = [
    '' => 'Semua Pesanan',
    'Pesanan Ditampung' => 'Pesanan Ditampung',
    'Pesanan Dibuat' => 'Pesanan Dibuat',
    'Pesanan Selesai' => 'Pesanan Selesai',
];
?>

<div class="d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <div class="row gap-2 gap-lg-0">
            <div class="col-md-12 col-lg-3">
                <?= Html::activeTextInput($model, 'start_date', [
                    'class' => 'form-control',
                    'type' => 'date',
                ]) ?>
            </div>
            <div class="col-md-12 col-lg-3">
                <?= Html::activeTextInput($model, 'end_date', [
                    'class' => 'form-control',
                    'type' => 'date',
                ]) ?>
            </div>
            <div class="col-md-12 col-lg-3">
                <?= Html::dropDownList('PemesananSearch[status]', $model->status, $pilihanStatus, ['prompt' => 'Pilih Status Pesanan', 'class' => 'form-control']); ?>
            </div>
            <div class="d-grid col-md-12 col-lg-3">
                <?= Html::submitButton('<i class="bi bi-printer-fill"></i> Laporan', ['class' => 'btn btn-outline-primary rounded-3 px-4']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php
$start_dateID = Html::getInputId($model, 'start_date');
$end_dateID = Html::getInputId($model, 'end_date');

$this->registerJs("

$('#" . $start_dateID . "').flatpickr({
    dateFormat: \"Y-m-d\",
    altInput: true,
    altFormat: \"d-m-Y\",
    defaultDate: '" . date('Y-m-d') . "',
});

$('#" . $end_dateID . "').flatpickr({
    dateFormat: \"Y-m-d\",
    altInput: true,
    altFormat: \"d-m-Y\",
    defaultDate: '" . date('Y-m-d') . "',
});
");
?>