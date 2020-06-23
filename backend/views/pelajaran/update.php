<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelajaran */

$this->title = 'Update Pelajaran: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Pelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelajaran, 'url' => ['view', 'id' => $model->id_pelajaran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelajaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
