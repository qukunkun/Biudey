<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class FileInput extends AssetBundle
{
    // 下面这些资源文件并不在 web 目录下，浏览器无法直接访问。所以我们需要
    // 指定 sourcePath 属性。注意 @vendor 这个 alias，表示 vender 目录
    public $sourcePath = '@vendor/kartik-v/bootstrap-fileinput';
    public $css = [
        'css/fileinput.css',
    ];
    public $js = [
        'js/fileinput.js',
        'js/locales/zh.js',
        'themes/fa/theme.js',
    ];
}
