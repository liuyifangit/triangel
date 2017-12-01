<?php
/**
 * Created by PhpStorm.
 * User: liuyifan
 * Date: 01/12/17
 * Time: 上午 10:55
 */

namespace app\assets;


use yii\web\AssetBundle;

class LayuiAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'layui/css/layui.css',
        'css/site.css'
    ];
    public $js = [
        'layui/layui.js',
    ];
}