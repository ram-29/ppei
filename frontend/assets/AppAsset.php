<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 *  
 */

/** 
 * Removed Stylesheets & Scripts
 * 'css/site.css'
 * 
 * $depends:
 *  'yii\web\YiiAsset',
 *  'yii\bootstrap\BootstrapAsset',
 */

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css',
        'css/main.css'
    ];
    public $js = [
        'https://code.jquery.com/jquery-3.2.1.slim.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js',
        'js/main.js'
    ];
    public $depends = [

    ];
}
