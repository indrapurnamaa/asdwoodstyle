<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'ASD - Login';
?>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card border-1 rounded-4 shadow-custom col-12 col-md-6 col-lg-4">
            <div class="card-body">
                <div class="d-grid gap-2 mb-4">
                    <div class="">
                        <?= Html::img('@web/img/logo.png', ['class' => 'brand-logo rounded mx-auto d-block']) ?>
                    </div>
                    <div class="mb-2 mt-2">
                        <div class="fs-5 text-center fw-bold">LOGIN ASD</div>
                    </div>
                    <div class="mt-2 px-2">
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="d-grid gap-1">
                            <?= $form->field($model, 'username', ['inputOptions' => [
                                'class' => 'form-control',
                                'placeholder' => 'Masukan Username',
                            ]])->label('<i class="fas fa-user"></i></i> Username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password', ['inputOptions' => [
                                'class' => 'form-control',
                                'placeholder' => 'Masukan Password',
                            ]])->label('<i class="fas fa-lock"></i> Password')->passwordInput() ?>
                            <div class="form-group mt-2">
                                <div class="d-grid">
                                    <?= Html::submitButton('<i class="bi bi-box-arrow-in-right"></i> Login', ['class' => 'btn btn-primary rounded-3', 'name' => 'login-button']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>