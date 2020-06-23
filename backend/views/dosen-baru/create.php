<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DosenBaru */

$this->title = 'Create Dosen Baru';
$this->params['breadcrumbs'][] = ['label' => 'Dosen Barus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosen-baru-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
