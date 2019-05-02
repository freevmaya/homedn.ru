<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\helpers;

use app\models\SiteOption;

/**
 * Description of PageProperty
 *
 * @author stepanov
 */
class SiteProperty
{

    public static function getValue ($code)
    {
        if ($property = SiteOption::find()->where([ 'code' => $code ])->one()) {
            return $property->value;
        }
        return '';
    }

}
