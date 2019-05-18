<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\CalcInputdata;
use app\models\CalcRoom;
use app\models\CalcBasePrice;
use app\models\CalcComponentGroup;
use yii\helpers\Html;
use app\helpers\SiteProperty;
use app\helpers\PageProperty;
use rmrevin\yii\fontawesome\FAS;
use rmrevin\yii\fontawesome\CdnFreeAssetBundle;

/**
 * Description of CalcRoomShowWidget
 *
 * @author stepanov
 */
class CalcRoomShowWidget extends Widget
{

    public $calcKey;
    public $calcInputdata;
    public $calcRooms;
    public $basePrice;

    public function init ()
    {
        $this->calcInputdata = ($c                   = CalcInputdata::find()->where([ 'key' => $this->calcKey ])->one()) ? json_decode($c->user_data, true) : false;
        $this->calcRooms     = CalcRoom::find()->orderBy([ 'sort' => SORT_ASC ])->all();
        $basePrice           = CalcBasePrice::find()->all();
        $this->basePrice     = 0;
        foreach ($basePrice as $base) {
            $this->basePrice += $base->getCost($this->calcInputdata);
        }
    }

    public function run ()
    {
        if ($this->calcInputdata) {
            CdnFreeAssetBundle::register($this->view);
            echo Html::beginTag('div', [ 'class' => 'tab-nav' ]);
            foreach ($this->calcRooms as $k => $room) {
                echo Html::tag('div', Html::a($room->name, '#room-' . $room->id, [ 'class' => 'room-select' . ($k == 0 ? ' active' : '') ]), [ 'class' => 'tab-element' ]);
            }
            echo Html::endTag('div');

            echo Html::beginTag('div', [ 'class' => 'tab-container' ]);
            foreach ($this->calcRooms as $k => $room) {

                echo Html::beginTag('div', [ 'class' => 'tab-content' . ($k == 0 ? ' active' : ''), 'id' => 'room-' . $room->id ]);
                if ($room->baseimage) {
                    echo Html::beginTag('div', [ 'class' => 'baseimage' ]);
                    echo Html::img($room->baseimage);
                    echo Html::endTag('div');
                }
                echo Html::beginTag('div', [ 'class' => 'element-group-list' ]);
                foreach ($room->calcComponentGroups as $group) {
                    echo Html::beginTag('div', [ 'class' => 'element-group' . (count($room->calcComponentGroups) == 1 ? ' simple' : '') ]);
                    if (count($room->calcComponentGroups) == 1) {
                        echo Html::tag('div', $group->name, [ 'class' => 'group-name' ]);
                    } else {
                        echo Html::tag('div', Html::a(FAS::i('angle-down') . Html::tag('span', $group->name), '#', [ 'class' => 'group-name-toggle' ]), [ 'class' => 'name' ]);
                    }

                    echo Html::beginTag('div', [ 'class' => 'element-list', 'id' => 'element-list-' . $group->id ]);
                    $localGroup = [];
                    foreach ($group->calcComponentElements as $element) {
                        $html = Html::tag('label', Html::tag('span', Html::img($element->icon), [ 'class' => 'icon' ])
                                        . Html::tag('span', $element->name, [ 'class' => 'name' ])
                                        . Html::tag('span', $element->desc, [ 'class' => 'desc' ])
                                        . ($element->countable ? Html::tag('span', Html::button('-', [ 'class' => 'minus', 'onclick' => "if($('input[name=\"countable-element-" . $element->id . "\"]').val()!=1) $('input[name=\"countable-element-" . $element->id . "\"]').val(+$('input[name=\"countable-element-" . $element->id . "\"]').val() - 1).change()" ])
                                                . Html::textInput('countable-element-' . $element->id, 1)
                                                . Html::button('+', [ 'class' => 'plus', 'onclick' => "if(+$('input[name=\"countable-element-" . $element->id . "\"]').val()<999)  $('input[name=\"countable-element-" . $element->id . "\"]').val(+$('input[name=\"countable-element-" . $element->id . "\"]').val() + 1).change()", ]), [ 'class' => 'countable' ]) : '')
                                        . Html::tag('span', $element->getCost($this->calcInputdata) . ' руб.', [ 'class' => 'price' ]), [
                                    'id'    => 'element-' . $element->id,
                                    'class' => ($element->default ? 'checked ' : '') . ($group->size_element ? 'big' : ''),
                                    'data'  => [
                                        'image'     => $element->image,
                                        'price'     => $element->getCost($this->calcInputdata),
                                        'count'     => 1,
                                        'group'     => $element->local_group ?: $group->id,
                                        'checked'   => $element->default ? 1 : 0,
                                        'countable' => $element->countable ? 1 : 0,
                                    ],
                        ]);

                        if ($element->local_group) {
                            if (isset($localGroup[$element->local_group])) {
                                $localGroup[$element->local_group][] = $html;
                            } else {
                                $localGroup[$element->local_group] = [ $html ];
                            }
                        } else {
                            echo $html;
                        }
                    }
                    foreach ($localGroup as $k => $g) {
                        echo Html::tag('div', $k, [ 'class' => 'local-group-name' ]);
                        echo implode('', $g);
                    }
                    echo Html::endTag('div');

                    echo Html::endTag('div');
                }
                echo Html::endTag('div');
                echo Html::endTag('div');
            }
            echo Html::endTag('div');
            $js = <<<JS
    calcData.basePrice = $this->basePrice;
JS;
        }
    }

}
