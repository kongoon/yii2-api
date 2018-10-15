<?php
/**
 * Created by HanumanIT Co.,Ltd.
 * User: kongoon
 * Date: 14/10/18
 * Time: 13:59
 */

namespace frontend\themes\mytheme;
use yii\web\AssetBundle;

class MyThemeAsset extends AssetBundle
{
    public $sourcePath = '@frontend/themes/mytheme/assets';

    public $css = [
        'vendor/font-awesome/css/font-awesome.min.css',
        'css/grayscale.min.css',
        'css/style.css'
    ];

    public $js = [
        'js/grayscale.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}