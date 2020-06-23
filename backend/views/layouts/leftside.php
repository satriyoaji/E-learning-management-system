<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
<?= Html::img('@web/img/user2-160x160.png', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 
                            'url' => '?r=site/', 'active' => $this->context->route == 'site/index'
                        ],
                        [
                            'label' => 'User',
                            'icon' => 'fa fa-database',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => 'Mahasiswa',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=murid/',
				                    'active' => $this->context->route == 'murid/index'
                                ],
                                [
                                    'label' => 'Dosen',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=dosen/',
				                    'active' => $this->context->route == 'dosen/index'
                                ],
                            ]
                        ],
                        ['label' => 'Artikel', 'icon' => 'fa fa-users', 'url' => '?r=artikel/', 'active' => $this->context->route == 'artikel/index'],

                    ],
                ]
        )
        ?>
        
    </section>
    <!-- /.sidebar -->
</aside>
