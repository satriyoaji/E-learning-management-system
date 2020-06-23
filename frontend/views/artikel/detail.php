<?
use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Query;
use backend\models\Jenjang;
use backend\models\Semester;
use frontend\models\Murid;

$murid = Murid::find()
->where('username = :user', [':user' => $session['murid']])
->one();
$id_jenjang = $murid['id_murid_jenjang'];

?>
				<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page">news in detail</h1></div>
						</div>
					</div><!-- end container-->
				</div><!-- end wrap-title-page -->


				<div class="section-breadcrumb">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="wrap-breadcrumb clearfix">
									<ol class="breadcrumb">
										<li><a href="javascript:void(0);"><i class="icon stroke icon-House"></i></a></li>
										<li><a href="javascript:void(0);">our blog</a></li>
										<li class="active">blog  post details</li>
									</ol>
								</div>
							</div>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section-breadcrumb -->


				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<main class="main-content">

								<article class="post post_mod-j clearfix">
									<div class="entry-media">
										<div class="entry-thumbnail">
											<img class="img-responsive" src="<?= Yii::getAlias('@imageUrl').'/'.$data->gambar; ?>" width="760" height="320" alt="Foto">
										</div>
									</div>
									<div class="post-inner decor decor_mod-a clearfix">
										<div class="box-date"><span class="number"><?php echo date('d',strtotime($data->date)); ?></span><?php echo date('F',strtotime($data->date)); ?></div>
										<div class="entry-main">
											<h3 class="entry-title ui-title-inner"><?php echo $data->judul_artikel; ?></h3>
											<div class="entry-content">
												<p><?php echo $data->deskripsi; ?></p>
											</div>
										</div>
										<div class="footer-panel">
											<i class="icon stroke icon-Tag"></i>
											<ul class="tags-group list-unstyled">
												<li><a href="javascript:void(0);">Study, </a>
												</li>
												<li><a href="javascript:void(0);">Education, </a>
												</li>
												<li><a href="javascript:void(0);">Online Classes</a>
												</li>
											</ul>
											
										</div>
									</div>
								</article><!-- end post -->

								

								

								

							</main><!-- end main-content -->

						</div><!-- end col -->


						<div class="col-md-4">
							<aside class="sidebar sidebar_mod-a">

								<section class="widget widget-default widget_search">
									<h3 class="widget-title ui-title-inner decor decor_mod-a">search blog</h3>
									<form method="get" class="form-search clearfix" >
										<input class="form-search__input" type="text" placeholder="keyword ...">
										<button class="form-search__submit" type="submit"><i class="icon stroke icon-Search"></i></button>
									</form>
								</section>


								


								<div class="widget widget_video">
									<div class="block_content">
										<a class="video-link" href="https://www.youtube.com/watch?v=DIGfO2Dgc9Y&amp;rel=0" rel="prettyPhoto" title="YouTube">
											<img class="img-responsive" src="assets/media/video-bg/1.jpg" height="250" width="350" alt="video">
											<div class="video-link__inner">
												<i class="icon stroke icon-Next"></i>
												<span class="video-link__title">course INTRO</span>
											</div>
										</a>
									</div><!-- end block_content -->
								</div><!-- end widget_video -->

								
								<section class="widget widget-default widget_categories">
									<h3 class="widget-title ui-title-inner decor decor_mod-a">JENJANG - PELAJARAN</h3>
									<div class="block_content">
										<?php 
												$queryJenjang = (new Query())
								                  ->select('*')
								                  ->from('jenjang')
								                  ->where('id_jenjang = :id', [':id' => $id_jenjang]);
								                  foreach($queryJenjang->each() as $results):

								                $queryBab = (new Query())
								                  ->select('*')
								                  ->from('bab')
								                  ->where('id_jenjang_bab = :id', [':id' => $results['id_jenjang']]);
								                  foreach($queryBab->each() as $hasil):
											?>
										<ul class="list-categories list-unstyled">
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name"><?= $results['nama_jenjang'] . ' ' . $hasil['deskripsi']; ?></span>
													<span class="list-categories__number">6</span>
												</a>
											</li>
										</ul>
										<?php endforeach; ?>
									<?php endforeach; ?>
										
									</div><!-- end block_content -->
								</section><!-- end widget -->



								<section class="widget widget-default widget_text">
									<h3 class="widget-title ui-title-inner decor decor_mod-a">PENSinau</h3>
									<div class="block_content">
										<p>Karena kami ingin para pelajar di Indonesia mendapatkan pengalaman belajar yang hebat, seru dan menyenangkan sehingga mereka memiliki motivasi belajar mandiri yang didasari oleh rasa penasaran terhadap ilmu pengetahuan.</p>
									</div><!-- end block_content -->
								</section><!-- end widget_text -->

							</aside><!-- end sidebar -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->


