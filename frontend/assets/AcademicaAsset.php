<?php
namespace frontend\assets;

use yii\base\Exception;
use yii\web\AssetBundle;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class AcademicaAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/academica/dist';
    public $css = [
        'css/master.css',
        'plugins/switcher/css/switcher.css',
        'plugins/switcher/css/color1.css',
        'plugins/switcher/css/color2.css',
        'plugins/switcher/css/color3.css',
        'plugins/switcher/css/color4.css',
        'plugins/switcher/css/color5.css',
    ];
    public $js = [
        'plugins/bootstrap/js/bootstrap.min.js',
        'assets/js/modernizr.custom.js',
        'js/waypoints.min.js',
        'plugins/jquery/jquery-1.11.3.min.js',
        'plugins/sliderpro/js/jquery.sliderPro.min.js',
        'plugins/owl-carousel/owl.carousel.min.js',
        'plugins/isotope/jquery.isotope.min.js',
        'plugins/prettyphoto/js/jquery.prettyPhoto.js',
        'plugins/datetimepicker/jquery.datetimepicker.js',
        'plugins/jelect/jquery.jelect.js',
        'plugins/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js',
        'js/cssua.min.js',
        'js/wow.min.js',
        'js/custom.min.js',
        'plugins/switcher/js/bootstrap-select.js',
        'plugins/switcher/js/dmss.js',
        
    ];
    public $depends = [
        'app\assets\FontawesomeAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
?>