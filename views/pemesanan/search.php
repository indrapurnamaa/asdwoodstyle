<?php

use app\assets\FlatPickrAsset;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

FlatPickrAsset::register($this);
?>

<?php $form = ActiveForm::begin([
    'action' => ['pemesanan'],
    'method' => 'get',
]); ?>

<div class="row gap-2 gap-lg-0">
    <div class="col-md-12 col-lg-2">
        <div class="d-flex align-items-center gap-2">
            <div class="flex-grow-1">
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
    <div class="col-md-12 col-lg-6">
        <div class="d-flex align-items-center gap-2 justify-content-md-end">
            <div class="search-box flex-grow-1 ">
                <?= Html::activeTextInput($model, 'searchQuery', [
                    'class' => 'form-control',
                    'placeholder' => 'Search ...',
                ]) ?>
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="d-flex align-items-center gap-2 justify-content-md-end">
            <?= Html::activeTextInput($model, 'dateRange', [
                'class' => 'form-control',
                'type' => 'date',
            ]) ?>
        </div>
        <div class="d-grid d-md-grid d-md-block d-lg-none col-12 mt-2">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


<?php
$displayId = Html::getInputId($model, 'display');
$dateRangeId = Html::getInputId($model, 'dateRange');


// on submit display change
$this->registerJs("

    $('#$displayId').on('change', function() {
        $(this).closest('form').submit();
    });

    $('#" . $dateRangeId . "').flatpickr({
        dateFormat: \"Y-m-d\",
        mode: \"range\",
        altInput: true,
        altFormat: \"d-m-Y\",
        defaultDate: '" . date('Y-m-d') . "',
    });

");

?>