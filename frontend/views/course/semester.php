<?php
  use yii\helpers\Html;
  use yii\helpers\Url;
  use frontend\models\Murid;
  use frontend\models\Dosen;
  use backend\models\Jenjang;
  use backend\models\Semester;
  use yii\db\Query;
  use yii\web\Session;

  $session = Yii::$app->session;
  $session->open();

  $username = $_GET['username'];

  if (isset($session['murid'])) {
    $id_jenjang_all = Murid::find()
      ->where('username = :username', [':username' =>$username])
      ->one();
    $id_jenjang = $id_jenjang_all['id_murid_jenjang'];
  } elseif (isset($session['dosen'])) {
    $id_jenjang_all = Dosen::find()
      ->where('username = :username', [':username' =>$username])
      ->one();
    $id_jenjang = $id_jenjang_all['id_dosen_jenjang'];
  }
  
?>

<div class="wrap-title-page">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <?php 
                $kelas = Jenjang::find()
                  ->where('id_jenjang = :id', [':id' => $id_jenjang])
                  ->one();
            ?>
            <?php if (isset($kelas['nama_jenjang'])):?>
              <h1 class="ui-title-page">Selamat datang <?= $session['user']; ?> PENS jenjang <?= $kelas['nama_jenjang'] ?></h1>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!-- end container--> 
    </div>
    <!-- end wrap-title-page -->
    
    <div class="section-breadcrumb">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="wrap-breadcrumb clearfix">
              <ol class="breadcrumb">
                <?php 
                    $query = (new Query())
                      ->select('*')
                      ->from('semester')
                      ->where('id_jenjang_semester = :id', [':id' => $id_jenjang]);
                      foreach($query->each() as $rows):
                        if(isset($kelas['nama_jenjang'])):
                ?>
                        <a href="<?= Url::to(['/course/index',  'id' => $rows['id_semester']]) ?>" style="margin-right: 40px;" class="btn btn-primary btn-effect">Semester <?= $rows['semester'] ?></a> 
                      <?php endif;?>

                <?php endforeach; ?>

                <!-- <li><a href="courses-1.php">Matematika</a></li>
                <li class="active">KELAS 1</li> -->
              </ol>
            </div>
            <?php if (!$kelas['nama_jenjang']): ?>
              <script type="text/javascript">
                alert("Anda harus terdaftar dalam kelas terlebih dahulu!");
              </script>
            <?php endif; ?>
          </div>
        </div>
        <!-- end row --> 
      </div>
      <!-- end container --> 
    </div>
    <!-- end section-breadcrumb -->