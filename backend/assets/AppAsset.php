<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'statics/css/nifty.css',

    ];
    public $js = [


    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
        'backend\assets\FontAwesomeAsset'
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,
    ];
}
