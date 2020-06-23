<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
?>
				<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page">latest news</h1></div>
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
										<li class="active">our blog</li>
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
								<?php 
									$formatter = \Yii::$app->formatter;
                                    foreach($data as $item){
                                        echo '<article class="post post_mod-j clearfix">';
                                            echo '<div class="entry-media">';
                                                echo '<div class="entry-thumbnail">';
                                                    echo '<a href="javascript:void(0);" ><img class="img-responsive" src="'.Yii::getAlias('@imageUrl').'/'.$item->gambar.'" width="760" height="320" alt="Foto"/></a>';
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<div class="post-inner decor decor_mod-a clearfix">';
                                                echo '<div class="box-date"><span class="number">'.date('d',strtotime($item->date)).'</span>'.date('F',strtotime($item->date)).'</div>';
                                                echo '<div class="entry-main">';
                                                    echo '<h3 class="entry-title ui-title-inner"><a href="javascript:void(0);">'.$item->judul_artikel.'</a></h3>';
                                                    echo '<div class="entry-content">';
                                                        echo '<p>'.substr($item->deskripsi, 0, 200).'</p>';
                                                    echo '</div>';
                                                echo '</div>';
                                                echo '<div class="entry-meta">';
                                                    echo '<span class="entry-autor">';
                                                        echo '<span>By </span>';
                                                        echo '<a class="post-link" href="javascript:void(0);">Academica</a>';
                                                    echo '</span>';
                                                    echo '<span class="entry-date"><a class="post-link" href="javascript:void(0);"><i class="icon stroke icon-Agenda"></i>'.date('F d, Y',strtotime($item->date)).'</a></span>';
                                                    echo '<span class="entry-links">';
                                                        echo '<i class="icon stroke icon-Tag"></i><a class="post-link" href="javascript:void(0);">IPS</a>';
                                                        echo '</span>';
                                                echo '</div>';
                                                    echo '<a href="" class="post-btn btn btn-primary btn-effect">READ MORE</a>';
                                            echo '</div>';
                                        echo '</article>';
                                        }
                                ?>
							</main><!-- end main-content -->


							<ul class="pagination">
								<li><a href="javascript:void(0);"><i class="icon fa fa-angle-left"></i></a></li>
								<li><a href="javascript:void(0);">1</a></li>
								<li><a href="javascript:void(0);">2</a></li>
								<li><a href="javascript:void(0);">3</a></li>
								<li><a href="javascript:void(0);"><i class="icon fa fa-angle-right"></i></a></li>
							</ul>
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
										<ul class="list-categories list-unstyled">
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D3 Teknik Informatika - Matematika 1</span>
													<span class="list-categories__number">3</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D3 Teknik Informatika - Konsep Pemrograman</span>
													<span class="list-categories__number">1</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D3 Teknik Informatika - Bahasa Inggris</span>
													<span class="list-categories__number">0</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D4 Teknik Informatika - Pemrograman Web</span>
													<span class="list-categories__number">0</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D4 Teknik Informatika - Agama</span>
													<span class="list-categories__number">0</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D4 Teknik Informatika - Basis Data</span>
													<span class="list-categories__number">0</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D4 Teknik Informatika - Matematika Diskrit</span>
													<span class="list-categories__number">0</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D4 Teknik Informatika - Konsep Jaringan</span>
													<span class="list-categories__number">0</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D3 Teknik Elektro Industri - PKN</span>
													<span class="list-categories__number">0</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D3 Teknik Elektro Industri - Dasar Kelistrikan</span>
													<span class="list-categories__number">0</span>
												</a>
											</li>
											<li class="list-categories__item">
												<a class="list-categories__link" href="javascript:void(0);">
													<span class="list-categories__name">D3 Teknik Elektro Industri - Elektro Digital</span>
													<span class="list-categories__number">0</span>
												</a>
											</li>
										</ul>
									</div><!-- end block_content -->
								</section><!-- end widget -->



								<section class="widget widget-default widget_text">
									<h3 class="widget-title ui-title-inner decor decor_mod-a">ACADEMICA</h3>
									<div class="block_content">
										<p>Karena kami ingin para pelajar di Indonesia mendapatkan pengalaman belajar yang hebat, seru dan menyenangkan sehingga mereka memiliki motivasi belajar mandiri yang didasari oleh rasa penasaran terhadap ilmu pengetahuan.</p>
									</div><!-- end block_content -->
								</section><!-- end widget_text -->

							</aside><!-- end sidebar -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->


			