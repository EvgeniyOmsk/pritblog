<?php
namespace main\modules\frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/web/public';
    public $css = [
        'css/plugin.css',
        'css/style.css'
    ];
    public $js = [
        'js/plugin.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
