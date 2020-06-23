<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .card{
        border-top: solid;
        border-bottom: solid;
        border-left-style: ridge;
        border-right-style: ridge; 
        margin-bottom: 2%; 
        margin-top: 2%;    
    }
    
</style>
<div class="site-reset-password">
    
    <div class="row">
        <div class="col-md-offset-4 col-md-4 card" align="center">
        <br>
          <h1><?= Html::encode($this->title) ?></h1>

            <p>Please choose your new password:</p>
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
