<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Jenjang;

$jenjang=Jenjang::find()->all();
$listData=ArrayHelper::map($jenjang,'id_jenjang','nama_jenjang');

$this->title = 'Signup';
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
<script>
// function tampilkan(){
 
//   var nama_role=document.getElementByClassName("form-signup").select1.value;
//   var selectedVal=document.getElementByClassName("selectedValue");
 
//   if (nama_role=="Student")
//     {
//         selectedVal.innerHTML="as Student";
//     }
//   else if (nama_role=="Lecturer")
//     {
//         selectedVal.innerHTML="as Lecturer";
//     }
// }
</script>
<div class="site-signup">
  

    <div class="row">
      <div class="col-md-offset-4 col-md-4 card" align="center">
            <br>
               <h1><?= Html::encode($this->title) ?></h1>

            <p>Please fill out the following fields to signup:</p>  
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email')->input('email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <!-- <?/*= $form->field($model, 'jenis')->radio(array('murid'=>'Student', 'dosen'=>'Lecturer'));*/?> -->

                <?= $form->field($model, 'jenis')->radioList(array('murid'=>'Student', 'dosen'=>'Lecturer')); ?>

                <!-- <label for="select1">Pilih Kota: </label>
                  <select id="select1" name="jenis">
                    <option value="dosen">Lecturer</option>
                    <option value="murid">Student</option>
                  </select> -->

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
