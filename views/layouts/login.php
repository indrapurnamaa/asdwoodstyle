<?php


use app\assets\AppAsset;
use yii\bootstrap5\Html;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= Yii::getAlias('@web/img/logo.png') ?>" type="image/png">
    <?php $this->head() ?>
</head>

<body class="h-100 bg-body">

    <?php $this->beginBody() ?>
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= $content ?>
        </div>
    </main>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>