<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{

//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
    public $sourcePath = '@app/assets';
    public $css        = [
        'css/style.css',
    ];
    public $js         = [
        'js/script.js',
    ];
    public $depends    = [
//        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
    ];
//
//    public static function register ($view)
//    {
//        $bundle   = parent::register($view);
//        $template = pathinfo($view->getViewFile(), PATHINFO_FILENAME);
//        echo $template;
//        if (file_exists(\Yii::getAlias('@app/assets/css/' . basename($template) . '.css'))) {
//            $bundle->css[] = 'css/' . basename($template) . '.css';
//        }
//        if (file_exists(\Yii::getAlias('@app/assets/js/' . $template . '.js'))) {
//            $bundle->js[] = 'js/' . $template . '.js';
//        }
//        return $bundle;
//    }

}
