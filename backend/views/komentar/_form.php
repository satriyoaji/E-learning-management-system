<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Komentar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="komentar-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_artikel_komentar')->textInput() ?>

    <?= $form->field($model, 'id_user_komentar')->textInput() ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
