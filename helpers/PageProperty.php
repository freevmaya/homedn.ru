<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\helpers;

use app\models\PageOptionValue;
use app\models\PageOption;

/**
 * Description of PageProperty
 *
 * @author stepanov
 */
class PageProperty
{

    public static function getValue ($pageId, $code)
    {
        if ($property = PageOptionValue::find()->joinWith('pageOption po', true, 'INNER JOIN')->where([ 'po.code' => $code, 'page_id' => $pageId ])->one()) {
            return $property->value ?: (($property = PageOption::find()->where([ 'code' => $code ])->one()) ? $property->default_value : '');
        }
        $property = PageOption::find()->where([ 'code' => $code ])->one();
        return $property ? $property->default_value : '';
    }

}
