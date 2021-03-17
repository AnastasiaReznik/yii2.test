<?php

namespace app\assets;

use yii\web\AssetBundle;

class TestAsset extends AssetBundle
{
    //путь к директории. где лежат ресурсы? если это не веб достпная директория
    // public $sourcePath = '@app/components';

    //если файлы в веб доступной директории, то относильно папки web указать путь
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    //уазываем все файлы css кот надо поубликовать (использовать)
    public $css = [
        'css/styles.css',
    ];
    public $js = [
        'js/scripts.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}