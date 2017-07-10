<?php

namespace app\web\theme\module\assets;
use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
    public $basePath = '@webroot/theme';
    public $baseUrl = '@web/theme';
    public $css = [
        // your css files will be here
       //"css/styles/main.css",
       "css/navbar.css",
        "css/variaties.css",
        "css/default-theme.css",
    ];
    public $js = [
        // your js files will be here
        "js/main.js",
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
