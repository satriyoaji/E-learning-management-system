<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AcademicaAsset;


//AppAsset::register($this);
$asset      = AcademicaAsset::register($this);
$baseUrl    = $asset->baseUrl;


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div id="page-preloader"><span class="spinner"></span></div>

<div class="layout-theme animated-css"  data-header="sticky" data-header-top="200"> 
  
  
  
<div class="wrapper">
    <?= $this->render('header.php', ['baserUrl' => $baseUrl, 'title'=>Yii::$app->name]) ?>
    <?= $content ?>
    <?= $this->render('footer.php', ['baserUrl' => $baseUrl]) ?>
</div>

<!--footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?//= date('Y') ?></p>

        <p class="pull-right"><?//= Yii::powered() ?></p>
    </div>
</footer-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
