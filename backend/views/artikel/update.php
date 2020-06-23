<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Artikel */

$this->title = 'Update Artikel: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_artikel, 'url' => ['view', 'id' => $model->id_artikel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="artikel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
