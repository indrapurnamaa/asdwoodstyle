<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use dosamigos\ckeditor\CKEditor;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="d-flex justify-content-start mt-3">
    <div class="card border-0 col-12 col-lg-6 rounded-3 shadow-custom p-2 mb-2">
        <div class="card-header bg-white">
            <div class="d-flex align-items-center">
                <div class="mb-0 flex-grow-1 fw-bold fs-5">Tambah Furniture</div>
                <div class="flex-shrink-0">
                    <?= Html::a('', ['furniture'], ['class' => 'btn btn-close', 'aria-label' => "Closed"]) ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form">
                <div class="mb-3">
                    <?= $form->field($model, 'nama_furniture')->textInput() ?>
                </div>

                <?= $form->field($model, 'deskripsi')->widget(CKEditor::class, [
                    'options' => ['rows' => 6],
                    'preset' => 'full', // Anda dapat mengatur opsi preset sesuai kebutuhan Anda.
                ]) ?>

                <div class="mb-3">
                    <?= $form->field($model, 'harga')->textInput() ?>
                </div>

                <div class="mb-3">
                    <?= $form->field($model, 'fileGambar')->fileInput() ?>
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