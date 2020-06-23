<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\web\Session;
use backend\models\Pelajaran;
use backend\models\Jenjang;
use backend\models\Semester;
use backend\models\Bab;

$now_date = date('Y-m-d'); //untuk bisa digunakan selanjutnya 
$id_pelajaran = $_GET['id'];

$session = Yii::$app->session;
$session->open();

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type=”text/javascript” src="../../web/assets/js/bootstrap-filestyle.min.js"> </script>

<style type="text/css">
    /*.file-field.medium .file-path-wrapper {
    height: 3rem; }
    .file-field.medium .file-path-wrapper .file-path {
    height: 2.8rem; }

    .file-field.big-2 .file-path-wrapper {
    height: 3.7rem; }
    .file-field.big-2 .file-path-wrapper .file-path {
    height: 3.5rem; }*/
</style>

<div class="wrap-title-page">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1 class="ui-title-page">Form Add New Bab</h1>
      </div>
    </div>
  </div>
<!-- end container--> 
</div>
<!-- end wrap-title-page -->
<section class="section_contacts-form">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <!-- <h2 class="ui-title-block">Send <strong>Us Message</strong></h2> -->
                <div class="wrap-subtitle">
                    <div class="ui-subtitle-block ui-subtitle-block_w-line">You can create a new good  to challenge your student in this course</div>
                </div><!-- end wrap-title -->
                <form class="form-contact ui-form" action="<?= Url::to(['/course/uploadbab']) ?>" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <input type="hidden" class="form-control" name="id_pelajaran" value="<?= $id_pelajaran ?>"></input>

                        <div class="col-xs-8">
                            <textarea class="form-control" name="deskripsi" required placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="col-xs-4"></div>


                          <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">Upload file here</label>
                            <input type="file" name="filename" class="filestyle" data-icon="false">
                        </div>

                        <div class="col-md-6 col-md-offset-6 box">
                            <button type="submit" class="btn btn-sm btn-primary btn-block" name="save">UPLOAD</button>
                        </div>
                    </div>
                </form>
            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section_contacts-form -->