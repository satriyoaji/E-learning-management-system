<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Jenjang;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelajaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelajaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jenjang_pelajaran')->dropDownList(
		ArrayHelper::map(jenjang::find()->all(), 'id_jenjang','nama_jenjang'),['prompt'=>'-Pilih Jenjang-']
	)
	?>

    <?= $form->field($model, 'nama_pelajaran')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
