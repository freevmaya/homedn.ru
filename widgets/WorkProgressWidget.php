<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\WorkProgress;
use yii\helpers\Html;

/**
 * Description of WorkProgressWidget
 *
 * @author stepanov
 */
class WorkProgressWidget extends Widget
{

    protected $workList;

    public function init ()
    {
        $this->workList = WorkProgress::find()->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->workList) {
            echo Html::beginTag('div', [ 'class' => 'work-progress' ]);

            $ul = [];
            foreach ($this->workList as $element) {
                $ul[] = Html::tag('span', Html::img($element->image), [ 'class' => 'image' ])
                        . Html::tag('span', $element->name, [ 'class' => 'name' ])
                        . Html::tag('span', $element->text, [ 'class' => 'text' ])
                        . ($element->url ? Html::tag('span', Html::a($element->link ?: $element->url, $element->url, [ 'target' => '_blank' ]), [ 'class' => 'link' ]) : '')
                        . Html::tag('span', '', [ 'class' => 'line' ]);
            }
            echo Html::ul($ul, [ 'encode' => false ]);
            echo Html::endTag('div');
        }
    }

}
