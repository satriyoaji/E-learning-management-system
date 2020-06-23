<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArtikelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artikel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_artikel') ?>

    <?= $form->field($model, 'id_user_artikel') ?>

    <?= $form->field($model, 'judul_artikel') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
