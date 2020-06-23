<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Session;
use yii\db\Query;
// use yii\web\Session;
$session = Yii::$app->session;
$session->open();
?>
<style type="text/css">
  .header-logo__img{
    width: 200px;
  }
</style>
<header class="header">
      <div class="top-header">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="top-header__contacts"><i class="icon stroke icon-Phone2"></i>(+62) 813 1334 5357</div>
              <div class="top-header__contacts"><i class="icon stroke icon-Mail"></i><a href="mailto:pens@eis.com">PENSinau@gmail.com</a></div>
              <div class="top-header__link">
                <button class="btn-header btn-effect">LATEST</button>
                <span>We have added new courses today ...</span>
              </div>
              <div class="header-login collapse navbar-collapse" id="navbarSupportedContent"> 
                <?php if (Yii::$app->user->isGuest): ?>
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign In</a>
                      <div class="dropdown-menu" style="padding: 10px; padding-right: -5px;" aria-labelledby="navbarDropdown">
                        <a class="dropdown item" style="color: black;" href="<?php echo Url::to(['site/login',  'user' => 'dosen', ['data' => ['method' => 'post']] ]); ?>">Sign In Dosen</a>
                        <br>
                        <a class="dropdown item" style="color: black;" href="<?php echo Url::to(['site/login',  'user' => 'murid', ['data' => ['method' => 'post']]]); ?>">Sign In Student</a> 
                      </div>
                    </li>
                  </ul>
                  
                <a class="header-login__item" href="<?php echo Url::to(['site/signup']); ?>">Register</a> 
                <?php else: ?>
                  <?php if(isset($session['user'])): ?>
                    <?php if (isset($session['murid'])): ?>
                      <a class="header-login__item" href="">
                        <?= Html::a(' LOGOUT (' . $session['murid'] . ')', ['site/logout'], ['data' => ['method' => 'post']]); ?>
                      </a>
                    <?php elseif (isset($session['dosen'])): ?>
                      <a class="header-login__item" href="">
                        <?= Html::a(' LOGOUT (' . $session['dosen'] . ')', ['site/logout'], ['data' => ['method' => 'post']]); ?>
                      </a>
                    <?php endif; ?>
                  <?php endif; ?>
              <?php endif; ?>

              </div>

            </div>
            <!-- end col  --> 
          </div>
          <!-- end row  --> 
        </div>
        <!-- end container  --> 
      </div>
      <!-- end top-header  -->
      
      <div class="container">
        <div class="row">
          <div class="col-xs-12"> <a class="header-logo" href="javascript:void(0);">
          <?= Html::img('@web/img/logofix.png', ['class' => 'header-logo__img', 'alt'=>'User Image']) ?>
          </a>
            <div class="header-inner">
              <div class="header-search">
                <div class="navbar-search">
                  <form id="search-global-form">
                    <div class="input-group">
                      <input type="text" placeholder="Type your search..." class="form-control" autocomplete="off" name="s" id="search" value="">
                      <span class="input-group-btn">
                      <button type="reset" class="btn search-close" id="search-close"><i class="fa fa-times"></i></button>
                      </span> </div>
                  </form>
                </div>
              </div>
              
              <nav class="navbar yamm">
                <div class="navbar-header hidden-md  hidden-lg  hidden-sm ">
                  <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div id="navbar-collapse-1" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li class="dropdown"><a href='<?= Url::toRoute('/site/index',true)?>'>Home<span class="nav-subtitle">OUR World</span></a>
                    </li>
                    <!-- <?php if (isset($session['murid'])): ?>
                    <li class="dropdown"> <a href="#">JENJANG<span class="nav-subtitle">What We Offers</span></a>
                      <ul role="menu" class="dropdown-menu">
                      <?php 
                        $data = \backend\models\Jenjang::find()->all();
                        foreach($data as $item){
                          echo '<li><a href="">'.$item->nama_jenjang.'</a>';
                            echo '<ul role="menu" class="dropdown-menu">';
                              foreach($item->semesters as $value){
                                echo '<li><a href="'.Url::toRoute('course/index?id=' . $value->id_semester ,true).'">' . 'semester '.$value->semester.'</a>';
                                echo '</li>';
                              }
                            echo'</ul>';
                          echo '</li>';
                        }
                      ?>
                      </ul>
                    </li>
                    <?php endif; ?> -->
                    <li class="dropdown"> <a href="javascript:void(0);">PAGES<span class="nav-subtitle">Information</span></a>
                      <ul role="menu" class="dropdown-menu">
                        <li><a href="<?= Url::to('site/about/')?>">about</a> </li>
                        <li><a href="<?= Url::toRoute('instructor/',true)?>">instructors</a> </li>
                      </ul>
                    </li>
                    <li class="dropdown"> <a href="<?= Url::toRoute('artikel/',true)?>">ARTIKEL<span class="nav-subtitle">Latest News</span></a>
                    </li>
                    <li><a href="<?= Url::toRoute('contact/',true)?>">CONTACT<span class="nav-subtitle">say us hi</span></a></li>
                  </ul>
                  
                </div>
              </nav>
              <!--end navbar --> 
              
            </div>
            <!-- end header-inner --> 
          </div>
          <!-- end col  --> 
        </div>
        <!-- end row  --> 
      </div>
      <!-- end container--> 
    </header>
    <!-- end header -->
    