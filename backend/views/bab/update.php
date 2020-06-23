<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bab */

$this->title = 'Update Bab: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Babs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bab, 'url' => ['view', 'id' => $model->id_bab]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
