<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class IndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'MDB-Free_4.19.0/css/bootstrap.css',
//        "MDB-Free_4.19.0/css/bootstrap.min.css",
        "MDB-Free_4.19.0/css/mdb.min.css",
        "MDB-Free_4.19.0/css/style.css",
        "MDB-Free_4.19.0/css/mapp.css",
    ];
    public $js = [
        'MDB-Free_4.19.0/js/bootstrap.js',
        "MDB-Free_4.19.0/js/jquery-3.4.1.min.js",
        "MDB-Free_4.19.0/js/popper.min.js",
//        "MDB-Free_4.19.0/js/bootstrap.min.js",
        "MDB-Free_4.19.0/js/mdb.min.js",
        "MDB-Free_4.19.0/js/chartt.js",
        "MDB-Free_4.19.0/js/chartt2.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
