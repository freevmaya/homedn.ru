<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\helpers;

use app\helpers\SiteProperty;
use app\helpers\PageProperty;
use app\models\CalcInputdata;

/**
 * Description of CalcHelper
 *
 * @author stepanov
 */
class CalcHelper
{

    const K         = [
        'calckroom'    => 'roomcount',
        'calcksquare'  => 'square',
        'calckdoor'    => 'doorcount',
        'calcktoilet'  => 'toiletcount',
        'calckdestroy' => 'second',
        'calckwall'    => 'wall',
    ];
    const BASEPRICE = 'calcstartprice';
    const CALCPAGE  = 'calcpageid';

    public static function getSum ($key)
    {
        if ($key) {
            $calcPageId = SiteProperty::getValue(self::CALCPAGE);
            $arK        = [];
            $userData   = json_decode(CalcInputdata::find()->where([ 'key' => $key ])->one()->user_data, true);
            $userValue  = [];
            foreach (self::K as $kName => $kValue) {
                $arK[$kName]       = PageProperty::getValue($calcPageId, $kName);
                $userValue[$kName] = $userData[$kValue];
            }
            $basePrice = 0;//PageProperty::getValue($calcPageId, self::BASEPRICE);
            $sum       = $basePrice;
            $sumP      = 1;
            foreach ($arK as $kName => $kValue) {
                $kValue = str_replace(',', '.', $kValue);
                if (count($f      = explode('+', $kValue)) > 1) {
                    $sum += $userValue[$kName] ? $f[1] * $userValue[$kName] : 0;
                } elseif (count($f = explode('*', $kValue)) > 1) {
                    $sumP += $userValue[$kName] ? $f[1] * $userValue[$kName] : 1;
                }
            }
            $sum *= $sumP;

            /**
             * @todo Добавить сложение выбранных элементов
             */
            return $sum;
        }
        return 0;
    }

}
