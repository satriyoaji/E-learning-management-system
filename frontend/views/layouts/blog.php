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

<!-- Loader -->
<div id="page-preloader"><span class="spinner"></span></div>
<!-- Loader end -->
<div class="layout-theme animated-css"  data-header="sticky" data-header-top="200">

<div class="wrapper">
	<?php 
		$session = Yii::$app->session;
    	$session->open();	
	?>
    <?= $this->render('header.php', ['baserUrl' => $baseUrl, 'title'=>Yii::$app->name]) ?>
    <?= $this->render('content_blog.php', ['content' => $content]) ?>
    <?= $this->render('footer.php', ['baserUrl' => $baseUrl]) ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
