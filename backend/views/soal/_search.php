<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SoalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_soal') ?>

    <?= $form->field($model, 'id_bab_soal') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'judul_soal') ?>

    <?= $form->field($model, 'soal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
