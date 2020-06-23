<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Jenjang */

$this->title = 'Create Jenjang';
$this->params['breadcrumbs'][] = ['label' => 'Jenjangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenjang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
