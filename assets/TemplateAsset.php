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
class TemplateAsset extends AssetBundle
{

    public $sourcePath = '@app/assets';
    public $css        = [
    ];
    public $depends    = [
        'app\assets\AppAsset',
    ];

    public static function register ($view)
    {
        $bundle   = parent::register($view);
        $template = pathinfo($view->getViewFile(), PATHINFO_FILENAME);
        if (file_exists(\Yii::getAlias('@app/assets/css/' . basename($template) . '.css'))) {
            $bundle->css[] = 'css/' . basename($template) . '.css';
        }
        if (file_exists(\Yii::getAlias('@app/assets/js/' . basename($template) . '.js'))) {
            $bundle->js[] = 'js/' . basename($template) . '.js';
        }
        return $bundle;
    }

}
