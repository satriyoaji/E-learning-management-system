<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\helpers\Url;
    use backend\models\Pelajaran;
    use backend\models\Jenjang;
    use backend\models\Semester;
    use backend\models\Bab;
    use backend\models\Soal;
    use frontend\models\Dosen;
    use yii\db\Query;
    use yii\web\Session;

    // var_dump(Yii::$app->user->identity);die;
    $session = Yii::$app->session;
    $session->open();

    if(isset($_GET['id'])){
      $id_pelajaran = $_GET['id'];
      $session['id_pelajaran'] = $id_pelajaran;
    }
    

    // $now_date = date('Y-m-d'); //data waktu sekarang
    // $now_date = strtotime($now_date);

    function tgl_indo($tanggal){ //dipecah ke dalam bentuk 
    $bulan = array (
      1 =>   'Januari', //cukup index pertama saja yang diberi key itu sudah bisa mengartikan key index selanjutnya
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }

?>

  <div class="wrap-title-page">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <?php 
              $pelajaran = Pelajaran::find()
                ->where('id_pelajaran = :id', [':id' => $session['id_pelajaran']])
                ->one();
              // $GLOBALS['nama_pelajaran'] = $pelajaran['nama_pelajaran'];
          ?>
          <h1 class="ui-title-page"><?= $pelajaran['nama_pelajaran'] ?></h1>
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
                <li><a href="javascript:void(0);"><i class="icon stroke icon-House"></i></a></li>
                <li><a href="javascript:void(0);">courses categories</a></li>
                <!-- <li><a href="courses-1.php">Matematika</a></li>
                <li class="active">KELAS 1</li> -->
              </ol>
            </div>
          </div>
        </div>
        <!-- end row --> 
      </div>
      <!-- end container --> 
    </div>
    <!-- end section-breadcrumb -->
    
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <main class="main-content rtd">
            <article class="course-details">
              <?php 
                  $semester = Semester::find()
                    ->where('id_semester = :id', [':id' => $session['id_pelajaran']])
                    ->one();
                  $noSemester = $semester['semester'];
                  $idJenjang = $semester['id_jenjang_semester'];

                  $jenjang = Jenjang::find()
                    ->where('id_jenjang = :id', [':id' => $idJenjang])
                    ->one();
              ?>
<!--               <h2 class="course-details__title">KELAS 1</h2> -->
              <div class="course-details__subtitle">Pelajaran <?= $pelajaran['nama_pelajaran'] ?> untuk mahasiswa PENS semester <?= $noSemester; ?> program studi <?= $jenjang['nama_jenjang'] ?> meliputi pengenalan operasi bilangan dan lainnya.</div>
              <img class="img-responsive" src="../../web/assets/media/course/<?=$session['id_pelajaran']; ?>.jpg" height="480" width="750" alt="foto">
              <!-- <h3 class="course-details__title-inner decor">DESCRIPTION</h3>
              <p>Fusce eleifend donec sapien sed phase lusa. Pellentesque lacus vamus lorem arcu semper duiac. Cras ornare arcu avamus nda leo. Etiam ind arcu morbi justo mauris tempus pharetra interdum at congue semper purus. Lorem ipsum dolor sit amet sed consectetur adipisicing elit sed do eiusmod tempor incididunt.</p> -->
              <h3 class="course-details__title-inner decor">Materi belajar</h3>
              <p>Materi yang dibahas di sini mencakup:
              <ul class="list-mark">
                <?php 
                    $query = (new Query())
                      ->select('*')
                      ->from('bab')
                      ->where('id_pelajaran_bab = :id_pelajaran', [':id_pelajaran' => $pelajaran['id_pelajaran']]);
                      foreach($query->each() as $rows):
                ?>
                  <li><?= $rows['deskripsi'] ?></li>
                <?php endforeach; ?>
              </ul>
              <p>Dengan materi belajar dari PENSinau kamu bisa mendalami pelajaran <?= $pelajaran['nama_pelajaran'] ?> dari kelas tersebut, untuk memperlancar kamu mengerjakan soal-soal, dan membantu kamu untuk menghadapi ujian apapun di kampus.</p>
              <!-- <h3 class="course-details__title-inner decor">Explore the BEST concepts</h3>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occa ecatedcupida tat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis etuquasi architect obeatae vitae dicta sunt explicabo nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia consequun tur magni dolores eos qui ratione voluptatem sequi nesciunt.</p> -->
              <h3 class="course-details__title-inner decor">SOAL - SOAL</h3>

              <?php 
                $queryBab = (new Query())
                  ->select('*')
                  ->from('bab')
                  ->where('id_pelajaran_bab = :id', [':id' => $session['id_pelajaran']]);
                  foreach($queryBab->each() as $results):
              ?>
              <h4 class="course-details__title-accordion">Bab <?= $results['deskripsi'] ?></h4>
              
              <ul class="list-collapse list-unstyled">
                
                <li class="list-collapse__item">
                  <div style="margin: 10px;">
                    <a href="<?= Url::to(['/course/downloadbab',  'id' => $results['id_bab']]) ?>">Materi <?= $results['deskripsi'] ?></a>
                      <?php 
                        $dosen = Dosen::find()
                          ->where('id = :id', [':id' => $results['id_dosen_bab']])
                          ->one();
                      ?>
                      <span style="text-align: right;"> (Created by <?=$dosen['username'] . ' at ' . tgl_indo($results['dates']); ?>)</span>
                  </div>

                  <!-- UPLOAD SOAL FILE LINK -->
                  <div class="col-md-6 mt-4 mb-4">
                      <a href="<?= Url::to(['/course/newsoal', 'id' => $results['id_bab']]) ?>" class="text-info text-bold">Upload new File Soal here</a> 
                  </div>

                  <?php 
                    $querySoal = (new Query())
                      ->select('*')
                      ->from('soal')
                      ->where('id_bab_soal = :id', [':id' => $results['id_bab']]);
                      $i = 0;
                      foreach($querySoal->each() as $rows):
                  ?>

                  <div class="list-collapse__inner mt-4"> <i class="icon stroke icon-Files"></i> 
                    <div class="list-collapse__title">
                      <a href="<?= Url::to(['/course/downloadsoal',  'id' => $rows['id_soal']]) ?>">Soal <?= $rows['judul_soal'] ?>  </a>
                      <?php 
                        $dosen = Dosen::find()
                          ->where('id = :id', [':id' => $rows['id_dosen_soal']])
                          ->one();
                      ?>
                        <span style="float: right;">  (Created by <?=$dosen['username'] . ' at ' . tgl_indo($rows['waktu_upload']) ?>)</span>
                      <!-- AMBIL DATA U/ MHS WAKTU PENGUMPULAN JAWABAN DR SOAL BERSANGKUTAN -->
                      <?php  ?>

                    </div>
                    <button class="list-collapse__btn" data-toggle="collapse" data-target="#content-<?=$i; ?>"><i class="fa fa-angle-down"></i></button>
                      <!-- <span class="list-collapse__info list-collapse__info_mod-a">Created by <?php ?> 30 min ago</span> -->
                  </div>
                  <div class="list-collapse__content collapse" id="content-<?=$i; ?>">
                    <?= $rows['deskripsi']; ?>
                  </div>
                </li>
                <?php 
                    $i++;
                    endforeach; 
                ?>
              </ul>

              <?php endforeach; ?>
              <!-- end list-collapse -->
              
              <?php if(isset($session['dosen'])): ?>

              <!-- BUTTON upload soal dan bab -->
                <div class="row">
                  <span>
                    <div class="col-md-6">
                      <a href="<?= Url::to(['/course/newbab', 'id' => $session['id_pelajaran']]) ?>" class="btn btn-info btn-effect btn-block">Upload Materi Bab</a>    
                    </div>
                  </span>
                </div>

              <?php //elseif(): ?>

              <?php endif; ?>
              
            </article>
            <!-- end course-details --> 
          </main>
          <!-- end main-content --> 
        </div>
        <!-- end col -->
        
        <div class="col-md-4">
          <aside class="sidebar">
            <div class="widget widget_course-description">
              <div class="block_content"> 
                <!-- <a href="javascript:void(0);" class="btn btn-primary btn-effect">IKUTI COURSE</a> -->
                <ul class="list-information list-unstyled" style="border-top: ridge;">
                  <li class="list-information__item"> <span class="list-information__title"><i class="icon stroke icon-Agenda"></i>Starts</span> <span class="list-information__description">25 Agustus 2019</span> </li>
                  <li class="list-information__item"> <span class="list-information__title"><i class="icon stroke icon-Glasses"></i>Duration</span> <span class="list-information__description">2 bulan , 5 jam / minggu</span> </li>
                  <li class="list-information__item"> <span class="list-information__title"><i class="icon stroke icon-Edit"></i>Institution </span> <span class="list-information__description">Politeknik Elektronika Negeri Surabaya</span> </li>
                  <li class="list-information__item"> <span class="list-information__title"><i class="icon stroke icon-Book"></i>Level</span> <span class="list-information__description">Intermediate</span> </li>
                  <li class="list-information__item"> <span class="list-information__title"><i class="icon stroke icon-Users"></i>Seats Available</span> <span class="list-information__description">62</span> </li>
                  <li class="list-information__item"> <span class="list-information__title"><i class="icon stroke icon-Bag"></i>Kelas <?= $jenjang['nama_jenjang'] ?> Semester <?= $noSemester; ?></span> <span class="list-information__description"><span class="list-information__number"></span></span> </li>
                </ul>
              </div>
              <!-- end block_content --> 
            </div>
            <!-- end widget_course-description -->
            
            <div class="widget widget_video">
              <div class="block_content"> <a class="video-link" href="https://www.youtube.com/watch?v=DIGfO2Dgc9Y&amp;rel=0" rel="prettyPhoto" title="YouTube"> <img class="img-responsive" src="../../web/assets/media/video-bg/1.jpg" height="250" width="350" alt="video">
                <div class="video-link__inner"> <i class="icon stroke icon-Next"></i> <span class="video-link__title">course INTRO</span> </div>
                </a> </div>
              <!-- end block_content --> 
            </div>
            <!-- end widget_video -->
            
            <section class="widget widget-default widget_instructor">
              <h3 class="widget-title ui-title-inner decor decor_mod-a">DOSEN PENGAJAR</h3>
              <div class="block_content">
                <div class="instructor__img"><img src="../../web/assets/media/avatar_instructor/1.jpg" height="60" width="60" alt=""></div>
                <div class="instructor__inner">
                  <?php 
                    $queryDosen = (new Query())
                      ->select('*')
                      ->from('dosen')
                      ->where('id_dosen_jenjang = :id', [':id' => $jenjang['id_jenjang']]);
                      $i = 0;
                      foreach($queryDosen->each() as $rows):
                  ?>
                  <div class="instructor__name"><?= $rows['username'] ?></div>
                  <div class="instructor__categories">Dosen terbaik Kalkulus lulusan Cambridge University</div>
                  <?php endforeach; ?>
                </div>
              </div>
              <!-- end block_content --> 
            </section>
            <!-- end widget_instructor -->
            
            <section class="widget widget-default widget_social">
              <h3 class="widget-title ui-title-inner decor decor_mod-a">SHARE THIS COURSE</h3>
              <div class="block_content">
                <div class="widget_social__wrap"><img class="img-responsive" src="../../web/assets/img/social.png" height="32" width="261" alt="Social"></div>
              </div>
              <!-- end block_content --> 
            </section>
            <!-- end widget_social -->
          </aside>
          <!-- end sidebar --> 
        </div>
        <!-- end col --> 
      </div>
      <!-- end row --> 
    </div>
    <!-- end container -->


