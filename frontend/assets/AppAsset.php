<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 *  
 */

class AppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'assets/components-font-awesome/css/font-awesome.min.css',
		'assets/twbs/bootstrap/dist/css/bootstrap.min.css',
		'css/style.min.css'
	];
	public $js = [
		'assets/jQuery/dist/jquery.slim.min.js',
		'assets/popper.js/dist/umd/popper.min.js',
		'assets/twbs/bootstrap/dist/js/bootstrap.min.js',
		'assets/moment/min/moment.min.js',
		'assets/underscore/underscore-min.js',
		'assets/clndr/clndr.min.js',
		'js/main.min.js'
	];
	public $depends = [
			
	];
}
