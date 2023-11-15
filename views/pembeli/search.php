<?php

use app\assets\FlatPickrAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

FlatPickrAsset::register($this);
?>

<?php $form = ActiveForm::begin([
    'action' => ['pembeli'],
    'method' => 'get',
]); ?>

<div class="row gap-2 gap-lg-0">
    <div class="col-md-12 col-lg-10">
        <div class="d-flex align-items-center gap-2">
            <div class="flex-grow-1 flex-lg-grow-0">
                <?= $form->field($model, 'display', ['inputOptions' => [
                    'class' => 'form-control',
                ], 'options' => [
                    'class' => 'form-group',
                ]])->dropDownList([
                    10 => 10,
                    20 => 20,
                    50 => 50,
                    100 => 100,
                ])->label(false) ?>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-2">
        <div class="d-flex align-items-center gap-2 justify-content-md-end">
            <div class="search-box flex-grow-1">
                <?= Html::activeTextInput($model, 'searchQuery', [
                    'class' => 'form-control',
                    'placeholder' => 'Search ...',
                ]) ?>
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
        <div class="d-grid d-block d-lg-none mt-2">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php
$displayId = Html::getInputId($model, 'display');

// on submit display change
$this->registerJs("

    $('#$displayId').on('change', function() {
        $(this).closest('form').submit();
    });
    
");
