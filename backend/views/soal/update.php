<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Soal */

$this->title = 'Update Soal: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Soals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_soal, 'url' => ['view', 'id' => $model->id_soal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="soal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
