<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Jenjang;
use backend\models\Pelajaran;

/* @var $this yii\web\View */
/* @var $model backend\models\Bab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bab-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id_jenjang_bab')->dropDownList(
		ArrayHelper::map(jenjang::find()->all(), 'id_jenjang','nama_jenjang'),
		[
			'prompt'=>'-Pilih Jenjang-',
			'onchange'=>'
				$.post( "index.php?r=pelajaran/lists&id='.'"+$(this).val(), function( data ){
					$( "select#models-jenjang" ).html( data );
				});'	
		]
	)
	?>

    <?= $form->field($model, 'id_pelajaran_bab')->dropDownList(
		ArrayHelper::map(pelajaran::find()->all(), 'id_pelajaran','nama_pelajaran'),
		[
			'prompt'=>'-Pilih Pelajaran-',
		]
	)
	?>

    <?= $form->field($model, 'deskripsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
