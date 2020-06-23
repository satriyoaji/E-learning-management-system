<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jawaban */

$this->title = 'Update Jawaban: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Jawabans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jawaban, 'url' => ['view', 'id' => $model->id_jawaban]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jawaban-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
