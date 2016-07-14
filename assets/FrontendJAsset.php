<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class FrontendJAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'css/reset.css',
        'css/main.css',
        'css/font.css',
        'css/slider.css',
        'css/feature-carousel.css',
        'css/jquery.lightbox.css',
    ];
    public $js = [
        //'js/jquery-1.6.1.min.js',
        //'js/jquery.js',
        //'js/waypoints.min.js',
        //'js/navbar2.js',
        'js/dynamic.js',
        //'js/script.js',
        //'js/jquery.featureCarousel.min.js',
        //'js/jquery.lightbox.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => View::POS_END,
    ];
}
