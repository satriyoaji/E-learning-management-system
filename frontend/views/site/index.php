<?php
use yii\helpers\Html;
use yii\web\Session;
use yii\helpers\Url;
$session = Yii::$app->session;
$session->open();
$this->title = 'Home'; 

// Yii::$app->user->logout();

// if (isset($session['username'])):
  // $this->goBack();
?>
<style type="text/css">
  .img-benefit{
    text-align: center;
  }

  .img-about{
    text-align: center;
  }

  .img-about img{
    width: 20%;
  }

  .video-block{
    padding-top: 70px;
  }

  .main-slider__subtitle{
    color: black;
  }
</style>   
    <div class="main-content">
      <div id="sliderpro1" class="slider-pro main-slider">
        <div class="sp-slides">
          <div class="sp-slide"> <?= Html::img('@web/assets/media/main-slider/124.jpg', ['class' => 'sp-img', 'alt'=>'Slide1']) ?>

            <div class="item-wrap sp-layer  sp-padding" data-horizontal="700" data-vertical="1"
          data-show-transition="left" data-hide-transition="up" data-show-delay="400" data-hide-delay="200">
              <div class="main-slider__inner text-center">
                <?php
                  date_default_timezone_set("Asia/Bangkok");
                  $batas_pagi = strtotime('00:00:00');
                  $batas_pagi = date('H:i:s', $batas_pagi);

                  $batas_siang = strtotime('12:00:00');
                  $batas_siang = date('H:i:s', $batas_siang);

                  $batas_sore = strtotime('15:00:00');
                  $batas_sore = date('H:i:s', $batas_sore);

                  $batas_malam = strtotime('18:00:00');
                  $batas_malam = date('H:i:s', $batas_malam);

                  if (isset($session['dosen'])) {
                    $user = $session['dosen'];
                  } elseif (isset($session['murid'])) {
                    $user = $session['murid'];
                  }

                  if (isset($user)) {
                    if((date('H:i:s') >= $batas_pagi) && (date('H:i:s') <= $batas_siang))
                        echo "<div class='main-slider__title' >Good Morning, " . $user . "</div>";
                    elseif((date('H:i:s') >= $batas_siang) && (date('H:i:s') <= $batas_sore))
                        echo "<div class='main-slider__title' >Good Afternoon, " . $user . "</div>";
                    elseif((date('H:i:s') >= $batas_sore) && (date('H:i:s') <= $batas_malam))
                        echo "<div class='main-slider__title' >Good evening, " . $user . "</div>";
                    else
                        echo "<div class='main-slider__title' >Good Night, " . $user . "</div>";
                  }
                  else{
                    if((date('H:i:s') >= $batas_pagi) && (date('H:i:s') <= $batas_siang))
                        echo "<div class='main-slider__title' >Good Morning!</div>";
                    elseif((date('H:i:s') >= $batas_siang) && (date('H:i:s') <= $batas_sore))
                        echo "<div class='main-slider__title' >Good Afternoon!</div>";
                    elseif((date('H:i:s') >= $batas_sore) && (date('H:i:s') <= $batas_malam))
                        echo "<div class='main-slider__title' >Good evening!</div>";
                    else
                        echo "<div class='main-slider__title' >Good Night!</div>";
                  }
                  
              ?>
                
                <div class="main-slider__subtitle ">Welcome to Best E-Learning Platform </div>

                <?php if (isset($session['murid'])):?>
                  <a class="main-slider__btn btn btn-warning btn-effect" href="<?= Url::to(['/course/semester',  'username' => $session['murid']]) ?>">Having Course</a> 
                <?php elseif (isset($session['dosen'])): ?>
                  <a class="main-slider__btn btn btn-warning btn-effect" href="<?= Url::to(['/course/semester',  'username' => $session['dosen']]) ?>">Having Course</a> 
              <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="sp-slide"> <?= Html::img('@web/assets/media/main-slider/213.jpg', ['class' => 'sp-img', 'alt'=>'Slide2']) ?>

            <div class="item-wrap sp-layer  sp-padding" data-horizontal="200" data-vertical="30"
          data-show-transition="left" data-hide-transition="up" data-show-delay="400" data-hide-delay="200">
              <div class="main-slider__inner">
                <div class="main-slider__title" style="color: black;">BEST ONLINE LEARNING</div>
                <div class="main-slider__subtitle ">THE EASIER WAY</div>
                <?php if(isset($session['murid'])): ?>
                  <a class="main-slider__btn btn btn-warning btn-effect" href="<?= Url::to(['/course/semester',  'username' => $session['murid']]) ?>">Having Course</a> 
                <?php elseif (isset($session['dosen'])): ?>
                  <a class="main-slider__btn btn btn-warning btn-effect" href="<?= Url::to(['/course/semester',  'username' => $session['dosen']]) ?>">Having Course</a> 
                <?php endif; ?>
                </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- end main-slider -->
      
      
      
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="border-decor_top">
              <section class="section-default">
                <div class="wrap-title wow zoomIn" data-wow-duration="2s">
                  <h2 class="ui-title-block ui-title-block_mod-d">We Bring You World’s Best Courses From All Top Publishers, <strong>FREE!</strong></h2>
                  <div class="ui-subtitle-block ui-subtitle-block_mod-c">Having over 9 million students worldwide and more than 50,000 online courses available.</div>
                </div>
                <!-- end wrap-title -->
                <ul class="advantages advantages_mod-b list-unstyled">
                  <li class="advantages__item wow zoomIn" data-wow-duration="2s">
                    <div class="advantages__inner">
                      <div  class="img-benefit">
                      <img src="http://localhost/elearning/frontend/web/assets/img/icon-fitur.png">
                      </div>
                      <div class="advantages__info"> <span class="advantages__icon"><i class="icon stroke icon-Cup"></i></span>
                        <h3 class="ui-title-inner decor decor_mod-a">HIGH QUALITY</h3>
                      </div>
                    </div>
                    <p>Fusce eleifend donec sapien phase dcua sed sa pellentesque lacus vamus lorem treb lum arcu semper duiac.</p>
                  </li>
                  <li class="advantages__item wow zoomIn" data-wow-duration="2s" data-wow-delay=".5s"> <span class="advantages__icon"><i class="icon stroke icon-Users"></i></span>
                    <div class="advantages__inner">
                      <div  class="img-benefit">
                      <img src="http://localhost/elearning/frontend/web/assets/img/icon-easy.png">
                      </div>
                      <h3 class="ui-title-inner decor decor_mod-a">EASY TO USE</h3>
                      <div class="advantages__info">
                        <p>Fusce eleifend donec sapien phase dcua sed sa pellentesque lacus vamus lorem treb lum arcu semper duiac.</p>
                      </div>
                    </div>
                  </li>
                  <li class="advantages__item wow zoomIn" data-wow-duration="2s" data-wow-delay="1s"> <span class="advantages__icon"><i class="icon stroke icon-WorldGlobe"></i></span>
                    <div class="advantages__inner">
                      <div  class="img-benefit">
                      <img src="http://localhost/elearning/frontend/web/assets/img/icon-flexible.png">
                      </div>
                      <h3 class="ui-title-inner decor decor_mod-a">we are GLOBAL</h3>
                      <div class="advantages__info">
                        <p>Fusce eleifend donec sapien phase dcua sed sa pellentesque lacus vamus lorem treb lum arcu semper duiac.</p>
                      </div>
                    </div>
                  </li>
                  <li class="advantages__item wow zoomIn" data-wow-duration="2s" data-wow-delay="1.5s"> <span class="advantages__icon"><i class="icon stroke icon-DesktopMonitor"></i></span>
                    <div class="advantages__inner">
                      <div  class="img-benefit">
                      <img src="http://localhost/elearning/frontend/web/assets/img/icon-online.png" style="padding-top: 14px;">
                      </div>
                      <h3 class="ui-title-inner decor decor_mod-a">ONLINE TRAINING</h3>
                      <div class="advantages__info">
                        <p>Fusce eleifend donec sapien phase dcua sed sa pellentesque lacus vamus lorem treb lum arcu semper duiac.</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </section>
              <!-- end section-advantages --> 
            </div>
            <!-- end border-decor_top --> 
          </div>
          <!-- end col --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- end container -->

        <div class="container">
        
      </div>
      <!-- end container --> 
      
      <section class="section-video wow fadeInUp" data-wow-duration="2s">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="video-block">
                <div  class="img-about">
                <img src="http://localhost/elearning/frontend/web/assets/img/logo-pens.png">
                </div>
                <h2 class="video-block__title">ABOUT PENSinau</h2>
                <div class="video-block__subtitle">Visi PENSinau adalah untuk menjadi pusat unggulan (center of excellent) pembelajaran secara online. Dimana semua siswa dapat mengakses modul sekolahnya hanya dalam satu website kami.</div>
              </div>
            </div>
            <!-- end col --> 
          </div>
          <!-- end row --> 
        </div>
        <!-- end container --> 
      </section>
      <!-- end section-video -->
    
      
      <div class="container">
        <div class="row">
          <div class="border-decor_top">
            <div class="col-md-6">
              <section class="section-default wow bounceInLeft" data-wow-duration="2s">
                <h2 class="ui-title-block">Testi<strong>moni</strong></h2>
                <div class="slider-reviews owl-carousel owl-theme owl-theme_mod-c enable-owl-carousel"
                        data-single-item="true"
                        data-auto-play="7000"
                        data-navigation="true"
                        data-pagination="false"
                        data-transition-style="fade"
                        data-main-text-animation="true"
                        data-after-init-delay="4000"
                        data-after-move-delay="2000"
                        data-stop-on-hover="true">
                  <div class="reviews">
                    <div class="reviews__text">Saya sangat suka dengan website ini. Ada banyak sekali modul yang disediakan, jadi saya dapat leluasa belajar materi yang saya inginkan, utamanya matematika.</div>
                    <div class="reviews__img">
                    <?= Html::img('@web/assets/media/avatar_review/1.jpg', ['class' => 'img-responsive', 'alt' => 'Foto']) ?></div>
                    <span class="reviews__autor">-- JOHN SMITH</span> <span class="reviews__categories">(Maths Student)</span> </div>
                  <!-- end reviews -->
                  
                  <div class="reviews">
                    <div class="reviews__text">Nulla feugiat nibh placerat fermentum rutrum ante risus euismod eros  pharetra felis justo ac tortor. Maecenas odio aco sit amet odio euismo ac donec tellus. Nullam risus turpis rhoncus vel varius consequat laort  neque. Sed ipseget lectus vitae augue zitae ipsumd do eiusmod tempor incididunt ut labore et dolore magaliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris aliqup.</div>
                    <div class="reviews__img">
                    <?= Html::img('@web/assets/media/avatar_review/2.jpg', ['class' => 'img-responsive', 'alt' => 'Foto']) ?></div>
                    <span class="reviews__autor">-- JOHN SMITH</span> <span class="reviews__categories">(Maths Student)</span> </div>
                  <!-- end reviews -->
                  
                  <div class="reviews">
                    <div class="reviews__text">Nulla feugiat nibh placerat fermentum rutrum ante risus euismod eros  pharetra felis justo ac tortor. Maecenas odio aco sit amet odio euismo ac donec tellus. Nullam risus turpis rhoncus vel varius consequat laort  neque. Sed ipseget lectus vitae augue zitae ipsumd do eiusmod tempor incididunt ut labore et dolore magaliqua. Ut enim ad minim veniam quis nostrud exercitation ullamco laboris aliqup.</div>
                    <div class="reviews__img">
                    <?= Html::img('@web/assets/media/avatar_review/3.jpg', ['class' => 'img-responsive', 'alt' => 'Foto']) ?></div>
                    <span class="reviews__autor">-- JOHN SMITH</span> <span class="reviews__categories">(Maths Student)</span> </div>
                  <!-- end reviews --> 
                </div>
                <!-- end slider-reviews --> 
              </section>
              <!-- end section-default --> 
            </div>
            <!-- end col -->
            
            <div class="col-md-6">
              <section class="section-default wow bounceInRight" data-wow-duration="2s">
                  <h2 class="ui-title-block">Why <strong>PENSinau ?</strong></h2>
                  <div class="panel-group accordion accordion" id="accordion-1">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <a class="btn-collapse" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-1"><i class="icon"></i></a>
                        <h3 class="panel-title">Learn And Get Training From Experts</h3>
                      </div>
                      <div id="collapse-1" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <p class="ui-text">Karena kami ingin para pelajar di Indonesia mendapatkan pengalaman belajar yang hebat, seru dan menyenangkan sehingga mereka memiliki motivasi belajar mandiri yang didasari oleh rasa penasaran terhadap ilmu pengetahuan.</p>
                        </div>
                      </div>
                    </div><!-- end panel -->

                    <div class="panel">
                      <div class="panel-heading">
                        <a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-2"><i class="icon"></i></a>
                        <h3 class="panel-title">Enjoy Our Free Online Courses</h3>
                      </div>
                      <div id="collapse-2" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p class="ui-text">Disini kami menyediakan semua layanan secara free, agar lebih memudahkan semua kalangan agar bisa mengakses.</p>
                        </div>
                      </div>
                    </div><!-- end panel -->

                    <div class="panel">
                      <div class="panel-heading">
                        <a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-3"><i class="icon"></i></a>
                        <h3 class="panel-title">Learn Anytime & Anywhere</h3>
                      </div>
                      <div id="collapse-3" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p class="ui-text">Mengapa Learn Anytime & Anywhere? disini dapat membantu siswa, guru, dan orang tua untuk menjalankan aktivitasnya menjadi lebih efektif dan efisien, karena ini adalah teknologi pembelajaran berbasis online sehingga bisa diakses dimanapun dan kapanpun.</p>
                        </div>
                      </div>
                    </div><!-- end panel -->

                    <div class="panel">
                      <div class="panel-heading">
                        <a class="btn-collapse collapsed" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-4"><i class="icon"></i></a>
                        <h3 class="panel-title">Basic to Advance: We Teach Everything</h3>
                      </div>
                      <div id="collapse-4" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p class="ui-text">Disini kami memberikan layanan untuk jenjang SD,SMP, dan SMA.</p>
                        </div>
                      </div>
                    </div><!-- end panel -->
                  </div><!-- end accordion -->
                </section>
              </div><!-- end col -->
          </div>
          <!-- end section-default --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- end container -->
      
    </div>
    <!-- end main-content -->
 