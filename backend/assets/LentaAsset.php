<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LentaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/lenta/lenta.css',
    ];
    public $js = [
        'js/lenta.js'
    ];
    public $depends = [
        '\backend\assets\AppAsset',
    ];
}
