<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\LendingList;
use yii\helpers\Html;

/**
 * Description of LendingListWidget
 *
 * @author stepanov
 */
class LendingListWidget extends Widget
{

    public $pageId;
    public $listNumber;
    protected $lendingList;

    public function init ()
    {
        $this->lendingList = LendingList::find()->where([ 'page_id' => $this->pageId, 'list_number' => $this->listNumber ])->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->lendingList) {
            $ul    = [];
            $popup = '';
            foreach ($this->lendingList as $element) {
                $ul[]  = Html::tag('span', Html::img($element->image), [ 'class' => 'image' ])
                        . Html::tag('span', $element->name, [ 'class' => 'name' ])
                        . Html::tag('span', $element->desc, [ 'class' => 'desc' ])
                        . Html::tag('span', Html::a('Подробнее', $element->desclink ?: '#lending-list-' . $element->id, [ 'class' => $element->desclink ? '' : 'popup-inline' ]), [ 'class' => 'link' ]);
                if (!$element->desclink)
                    $popup .= Html::tag('div', Html::tag('div', $element->text), [ 'class' => 'mfp-hide popup-window wrapper', 'id' => 'lending-list-' . $element->id ]);
            }
            echo Html::ul($ul, [ 'encode' => false, 'class' => 'lending-list' ]);
            echo $popup;
        }
    }

}
