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
class BackAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'theme/assets/bootstrap.css',
        'css/site.css',
        'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700',
        'theme/assets/vendor/nucleo/css/nucleo.css',
        'theme/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css',
        'theme/assets/css/argon.css?v=1.2.0',
        'css/mystyle.css',

    ];
    public $js = [
//        'front-theme/assets/js/bootstrap.min.js',
//        'theme/assets/vendor/jquery/dist/jquery.min.js',
        'theme/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
        'theme/assets/vendor/js-cookie/js.cookie.js',
        'theme/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js',
        'theme/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js',
        'theme/assets/vendor/chart.js/dist/Chart.min.js',
        'theme/assets/vendor/chart.js/dist/Chart.extension.js',
        'theme/assets/js/argon.js?v=1.2.0',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
