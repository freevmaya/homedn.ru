<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\helpers;

use app\models\PageOptionValue;

/**
 * Description of ArticleElementViewCount
 *
 * @author stepanov
 */
class ArticleElementViewCount
{

    public static function count ($elementId)
    {
        $pageView        = PageOptionValue::find()->joinWith('pageOption po', false, 'INNER JOIN')->where([ 'po.code' => 'count1', 'page_id' => $elementId ])->one();
        $pageView->value = $pageView->value ? $pageView->value + 1 : 1;
        $pageView->save();
    }

}
