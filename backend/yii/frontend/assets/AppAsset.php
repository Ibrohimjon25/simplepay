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
    public $css = [
        //'css/site.css',
        "css/style.css",
        "https://use.fontawesome.com/releases/v5.8.2/css/all.css",
        "css/font-family.css",
        "css/bootstrap.min.css",
        "css/mdb.min.css",
    ];
    public $js = [
        "js/jquery.min.js",
        "js/popper.min.js",
        "js/bootstrap.min.js",
        "js/mdb.min.js",
        "js/script.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
