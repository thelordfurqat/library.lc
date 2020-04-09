<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'front-theme/assets/css/bootstrap.min.css',
        'front-theme/assets/css/main.css',
        'front-theme/assets/css/blue.css',
        'front-theme/assets/css/owl.carousel.css',
        'front-theme/assets/css/owl.transitions.css',
        'front-theme/assets/css/animate.min.css',
        'front-theme/assets/css/rateit.css',
        'front-theme/assets/css/bootstrap-select.min.css',
        'front-theme/assets/css/font-awesome.css',
        'https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800',
        'http://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
        'https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800',
        'https://fonts.googleapis.com/css?family=Montserrat:400,700',
    ];
    public $js = [
        'front-theme/assets/js/jquery-1.11.1.min.js',
        'front-theme/assets/js/bootstrap.min.js',
        'front-theme/assets/js/bootstrap-hover-dropdown.min.js',
        'front-theme/assets/js/owl.carousel.min.js',
        'front-theme/assets/js/echo.min.js',
        'front-theme/assets/js/jquery.easing-1.3.min.js',
        'front-theme/assets/js/bootstrap-slider.min.js',
        'front-theme/assets/js/jquery.rateit.min.js',
        'front-theme/assets/js/lightbox.min.js',
        'front-theme/assets/js/bootstrap-select.min.js',
        'front-theme/assets/js/wow.min.js',
        'front-theme/assets/js/scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
