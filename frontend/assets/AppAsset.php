<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $css = [
        'statics/css/site.css',
        'statics/css/bootstrap-select.css',

//        'statics/css/nifty.css',

    ];
    public $js = [
        'statics/js/bootstrap-select.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'backend\assets\FontAwesomeAsset'
    ];
}
