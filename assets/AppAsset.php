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
//        'css/site.css',
        'front-theme/css/bootstrap.css',
        'front-theme/css/style.css',
        'front-theme/css/font-awesome.css',
        '//fonts.googleapis.com/css?family=Montserrat:400,700',
        '//fonts.googleapis.com/css?family=Noto+Sans:400,700',

    ];
    public $js = [
        'front-theme/js/jquery-1.11.1.min.js',
        'front-theme/js/move-top.js',
        'front-theme/js/easing.js',
        'front-theme/js/bootstrap.js',
        'front-theme/js/jquery.mycart.js',
        'front-theme/js/lords.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
