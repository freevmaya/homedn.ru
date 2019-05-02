<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\helpers;

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
        if ($property = PageOption::find()->joinWith('pageOptionValues pov', true, 'INNER JOIN')->where([ 'code' => $code, 'pov.page_id' => $pageId ])->one()) {
            return $property->pageOptionValues[0]->value;
        }
        return '';
    }

}
