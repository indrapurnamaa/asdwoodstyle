<?php

use app\assets\FlatPickrAsset;
use app\assets\Select2Asset;
use app\models\table\FurnitureTable;
use app\models\table\PembeliTable;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
//Handle Asset
Select2Asset::register($this);
FlatPickrAsset::register($this);


//Handle Dropdown Pembeli
$modelPembeli = PembeliTable::find()->all();
$listPembeli = ArrayHelper::map($modelPembeli, 'id', 'nama_pembeli');
$defaultOptionPembeli = ['' => 'Pilih Nama Pembeli'];
$listPembeli = $defaultOptionPembeli + $listPembeli;

//Handle Dropdown Furniture
$modelFurniture = FurnitureTable::find()->all();
$listFurniture = ArrayHelper::map($modelFurniture, 'id', 'nama_furniture');
$defaultOptionFurniture = ['' => 'Pilih Nama Furniture'];
$listFurniture = $defaultOptionFurniture + $listFurniture;


?>
<?php $form = ActiveForm::begin(); ?>
<div class="d-flex justify-content-start mt-3">
    <div class="card border-0 col-12 col-lg-6 rounded-3 shadow-custom p-2 mb-2">
        <div class="card-header bg-white">
            <div class="d-flex align-items-center">
                <div class="mb-0 flex-grow-1 fw-bold fs-5">Tambah Pesanan</div>
                <div class="flex-shrink-0">
                    <?= Html::a('', ['pemesanan'], ['class' => 'btn btn-close', 'aria-label' => "Closed"]) ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form">
                <div class="mb-3">
                    <?= $form->field($model, 'id_pembeli')->dropDownList($listPembeli) ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'tanggal_pemesanan')->textInput() ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'id_furniture')->dropDownList($listFurniture, ['id' => 'dropdown-furniture']) ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'qty')->textInput([
                        'maxlength' => true,
                        'type' => 'number'
                    ]); ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'pekerjaan')->textarea(['rows' => '3']) ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'harga_unit')->textInput(['id' => 'harga-furniture', 'readonly' => 'true']) ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'dp')->textInput() ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'status')->dropDownList(
                        [
                            'Pesanan Dibuat' => 'Pesanan Dibuat',
                            'Pesanan Ditampung' => 'Pesanan Ditampung',
                        ],
                        ['prompt' => 'Pilih Status Pesanan']
                    ) ?>
                </div>
                <hr>
                <div class="d-grid mt-3">
                    <?= Html::submitButton('<i class="bi bi-save-fill"></i> Simpan', ['class' => 'btn btn-primary rounded-3 px-4']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php
$tanggalpemesananID = Html::getInputId($model, 'tanggal_pemesanan');
$namapembeliID = Html::getInputId($model, 'id_pembeli');
$ambilHargaFurniture = <<< JS
var dropdownFurniture = document.getElementById('dropdown-furniture');
var hargaFurniture = document.getElementById('harga-furniture');

$(document).ready(function() {
    // Inisialisasi Select2 pada dropdown
    $('#dropdown-furniture').select2({
        theme: 'bootstrap-5',
    });

    $('#dropdown-furniture').on('change', function() {
        var selectedFurnitureId = $(this).val();

        $.ajax({
            url: 'ambil-harga-furniture',
            type: 'GET',
            dataType: 'json',
            data: {
                id: selectedFurnitureId
            },
            success: function(response) {
                hargaFurniture.value = response.harga;
            }
        });
    });
});
JS;

$this->registerJs("

$('#" . $namapembeliID . "').select2({
    theme: 'bootstrap-5',
    
});

$('#" . $tanggalpemesananID . "').flatpickr({
    enableTime: true,
    dateFormat: \"Y-m-d H:i\",
    // minDate: \"today\",
    altInput: true,
    altFormat: \"d-m-Y H:i\",
    time_24hr: true,
    defaultDate: '" . date('Y-m-d H:i') . "',
});
");
$this->registerJs($ambilHargaFurniture);
?>