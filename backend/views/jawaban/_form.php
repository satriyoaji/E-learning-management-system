<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Soal;

/* @var $this yii\web\View */
/* @var $model backend\models\Jawaban */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jawaban-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_soal_jawaban')->dropDownList(
		ArrayHelper::map(soal::find()->all(), 'id_soal','judul_soal'),['prompt'=>'-Pilih Soal-']
	)
	?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'judul_jawaban')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
