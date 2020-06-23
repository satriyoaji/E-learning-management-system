<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DosenBaru */

$this->title = 'Update Dosen Baru: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Dosen Barus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dosen-baru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
