<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Soal */

$this->title = 'Create Soal';
$this->params['breadcrumbs'][] = ['label' => 'Soals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
