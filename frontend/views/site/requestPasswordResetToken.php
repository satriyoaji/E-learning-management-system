<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
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

<div class="site-request-password-reset">
  

    <div class="row">
              <div class="col-md-offset-4 col-md-4 card" align="center">
            <br>
            <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out your email. A link to reset password will be sent there.</p>

            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
