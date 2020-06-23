<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\helpers\Url;
    use yii\db\Query;
    use backend\models\Pelajaran;
    use backend\models\Semester;
    use backend\models\Jenjang;
    $id_semester = $_GET['id'];

?>
<!--<div class="wrap-title-page">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          
          
        </div>
      </div>
    </div>
    <!-- end container--> 
  <?php 
      $semester = Semester::find()
        ->where('id_semester = :id', [':id' => $id_semester])
        ->one();
      $noSemester = $semester['semester'];
      $idJenjang = $semester['id_jenjang_semester'];

      $jenjang = Jenjang::find()
        ->where('id_jenjang = :id', [':id' => $idJenjang])
        ->one();
  ?>
  </div>

  <div class="wrap-title-page">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="ui-title-page">SEMESTER <?= $noSemester . ' ' . $jenjang['nama_jenjang']; ?></h1>
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
              </ol>
            </div>
          </div>
        </div>
        <!-- end row--> 
      </div>
      <!-- end container--> 
    </div>
    <!-- end section-breadcrumb-->
    
    <main class="main-content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="wrap-title wrap-title_mod-b">
              <?php 
                    $jumlah_pelajaran = Pelajaran::find()
                      ->where('id_semester_pelajaran = :id', [':id' => $id_semester])
                      ->count();
                    $total_pelajaran = Pelajaran::find()
                      ->count();
                ?>
              <div class="title-list">Showing <span class="title-list__number"><?= $jumlah_pelajaran; ?></span> of  total <span class="title-list__number"><?= $total_pelajaran; ?></span> Courses</div>
            </div>
            <!-- end wrap-title -->
            
            <div class="posts-wrap">
            <?php 
                $query = (new Query())
                  ->select('*')
                  ->from('pelajaran')
                  ->where('id_semester_pelajaran = :id_semester_pelajaran', [':id_semester_pelajaran' => $id_semester]);
                  foreach($query->each() as $rows):
            ?>
              <article class="post post_mod-c clearfix">
                <div class="entry-media">
                  <div class="entry-thumbnail"> <a href="javascript:void(0);" ><img class="img-responsive" src="../../web/assets/media/course/<?=$rows['id_pelajaran']; ?>.jpg" width="370" height="250" alt="Foto"/></a> </div>
                  <div class="entry-hover">
                    <a href="<?= Url::to(['/course/detail',  'id' => $rows['id_pelajaran']])?>" class="post-btn btn btn-primary btn-effect">READ MORE</a>
                  </div>
                </div>
                <div class="entry-main entry-main_mod-a">
                  <h3 class="entry-title ui-title-inner"><a href="javascript:void(0);"> </a><?= $rows['nama_pelajaran'] ?></h3>
                  <!-- <div class="entry-meta decor decor_mod-b"> <span class="entry-autor"> <span>By </span> <a class="post-link" href="javascript:void(0);">John Milton</a> </span> <span class="entry-date"><a href="javascript:void(0);">Dec 16, 2015</a></span> </div> -->
                  <div class="entry-content">
                    <!-- <p>Esasellus luctus nibhay pulvinar bibenaum aliqua ligula sapien ipsun diua.</p> -->
                  </div>
                  <div class="entry-footer">
                    <div class="box-comments"> <a href="javascript:void(0);"><i class="icon stroke icon-Message"></i>25</a> <a href="javascript:void(0);"><i class="icon stroke icon-User"></i>65</a> </div>
                    <ul class="rating">
                      <li><i class="icon fa fa-star"></i></li>
                      <li><i class="icon fa fa-star"></i></li>
                      <li><i class="icon fa fa-star"></i></li>
                      <li><i class="icon fa fa-star"></i></li>
                      <li><i class="icon fa fa-star-o"></i></li>
                    </ul>
                  </div>
                </div>
              </article>
              <!-- end post -->
            <?php endforeach; ?> 
            </div>
            <!-- end posts-wrap -->
            

          </div>
          <!-- end col --> 
        </div>
        <!-- end row --> 
      </div>
      <!-- end container --> 
      
    </main>
    <!-- end main-content -->