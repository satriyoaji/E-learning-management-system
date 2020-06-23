<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jenjang */

$this->title = 'Update Jenjang: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Jenjangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenjang, 'url' => ['view', 'id' => $model->id_jenjang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenjang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
