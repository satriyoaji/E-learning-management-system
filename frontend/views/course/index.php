<?php 
//tanpa use yii session
$session = Yii::$app->session;
$session->open();

  if (isset($session['murid'])) {
    include 'indexMurid.php';
  }elseif (isset($session['dosen'])) {
    include 'indexDosen.php';
  }
?>