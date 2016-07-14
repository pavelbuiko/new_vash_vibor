<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700|Roboto:100,300,400,700',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css',
        'css/components.css',
        'css/style.css',



    ];
    public $js = [
        'js/components.js',
        'js/script.js',
        'http://api-maps.yandex.ru/2.1/?lang=ru_RU',



    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => View::POS_END,
    ];
}
