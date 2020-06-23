<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\Session;

$session = Yii::$app->session;
$session->open();

if (isset($_REQUEST)) {
    if ($_REQUEST['user'] == 'dosen') {
        $session['user'] = 'dosen';
    } elseif ($_REQUEST['user'] == 'murid') {
        $session['user'] = 'murid';
    }
}

$this->title = 'Login';
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
<div class="site-login">
    

    <div class="row">
        <div class="col-md-offset-4 col-md-4 card" align="center">
            <br>    
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Please fill out the following fields to login:</p>
            
            <?php $form = ActiveForm::begin([
                'id' => 'active-form',
                'options' => [
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
                ],
            ]); 
            ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
