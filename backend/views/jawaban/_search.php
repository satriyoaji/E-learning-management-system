<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JawabanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jawaban-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_jawaban') ?>

    <?= $form->field($model, 'id_soal_jawaban') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'judul_jawaban') ?>

    <?= $form->field($model, 'jawaban') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
