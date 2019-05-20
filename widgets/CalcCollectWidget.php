<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\CalcCollect;

/**
 * Description of CalcCollectWidget
 *
 * @author stepanov
 */
class CalcCollectWidget extends Widget
{

    public $calcKey;
    protected $calcCollectList;

    public function init ()
    {
        $this->calcCollectList = CalcCollect::find()->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->calcCollectList) {
            echo Html::beginTag('div', [ 'class' => 'calc-collect-list' ]);
            echo Html::ul($this->calcCollectList, [
                'id'   => 'calc-collect',
                'item' => function($item, $index)
                {
                    return Html::tag('li', Html::tag('span', $item->name, [ 'class' => 'name' ])
                                    . Html::tag('span', '', [ 'class' => 'price', 'id' => 'collect-price-' . $item->id ])
                                    . Html::tag('span', Html::img($item->image), [ 'class' => 'image' ]), [
                                'data' => [
                                    'collect' => $item->inputdata,
                                ],
                    ]);
                },
            ]);
            echo Html::endTag('div');
        }
    }

}
