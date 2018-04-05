<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CrmAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/crm.css',
        '/plugins/datepicker/dist/css/datepicker.min.css'
    ];
    public $js = [
        '/plugins/select/jquery.dependent-selects.js',
        'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js',
        '//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js',
        '/plugins/datepicker/dist/js/datepicker.min.js',
        'js/jquery.cookie.js',
        'js/crm.js',

    ];
    public $depends = [
        '\backend\assets\AppAsset',
    ];
}
