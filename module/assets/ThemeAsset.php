<?php

namespace app\web\theme\module\assets;
use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
    public $basePath = '@webroot/theme/dist';
    public $baseUrl = '@web/theme/dist';
    public $css = [
        // your css files will be here
        "styles/main.css",
    ];
    public $js = [
        // your js files will be here
        "scripts/main.min.js",
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
