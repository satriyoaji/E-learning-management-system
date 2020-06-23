<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Jenjang;

/* @var $this yii\web\View */
/* @var $model backend\models\DosenBaru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dosen-baru-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'id_dosen_jenjang')->textInput() ?>

    <?= $form->field($model, 'id_dosen_jenjang')->dropDownList(
        ArrayHelper::map(jenjang::find()->all(), 'id_jenjang','nama_jenjang'),['prompt'=>'-Pilih Jenjang-']
    )
    ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
