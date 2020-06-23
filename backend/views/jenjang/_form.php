<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Jenjang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jenjang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_jenjang')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
