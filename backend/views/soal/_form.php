<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Bab;

/* @var $this yii\web\View */
/* @var $model backend\models\Soal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_bab_soal')->dropDownList(
		ArrayHelper::map(bab::find()->all(), 'id_bab','deskripsi'),['prompt'=>'-Pilih Bab-']
	)
	?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'judul_soal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
