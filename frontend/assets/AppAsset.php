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
        'statics/css/bootstrap-select.css',   //下拉选择框
        'statics/css/bootstrapValidator.css', //表单自动验证

//        'statics/css/nifty.css',
        'statics/css/layui.css',

    ];
    public $js = [
        'statics/js/bootstrap-select.js',  //下拉选择框
        'statics/js/bootstrapValidator.js',//表单自动验证
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'backend\assets\FontAwesomeAsset',
        'frontend\assets\FileInput',
    ];
}
