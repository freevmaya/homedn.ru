<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\CalcComplectContent;
use app\models\CalcInputdata;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Description of CalcComplectContentWidget
 *
 * @author stepanov
 */
class CalcComplectContentWidget extends Widget
{

    public $calcKey;
    public $header1;
    public $header2;
    protected $mandatoryList;
    protected $advancedList;
    protected $inputdata;

    public function init ()
    {
        $this->mandatoryList = CalcComplectContent::find()->where([ 'mandatory' => 1 ])->orderBy([ 'sort' => SORT_ASC ])->all();
        $this->advancedList  = CalcComplectContent::find()->where([ 'not', [ 'mandatory' => 1 ] ])->orderBy([ 'sort' => SORT_ASC ])->all();
        $this->inputdata     = ($c                   = CalcInputdata::find()->where([ 'key' => $this->calcKey ])->one()) ? json_decode($c->complect_data, true) : [];
    }

    public function run ()
    {
        if ($this->mandatoryList) {
            echo Html::beginTag('div', [ 'class' => 'complect-content-list' ]);
            echo Html::tag('div', nl2br($this->header1), [ 'class' => 'header' ]);
            $ul = [];
            foreach ($this->mandatoryList as $element) {
                $ul[] = Html::tag('span', Html::img($element->image), [ 'class' => 'image' ])
                        . Html::tag('span', Html::tag('span', $element->name, [ 'class' => 'name' ])
                                . Html::tag('span', nl2br($element->description), [ 'class' => 'desc' ])
                                . Html::tag('span', 'по умочанию', [ 'class' => 'mark' ])
                                . Html::tag('span', Html::img(\Yii::$app->params['image_dir_url'] . 'chb.png'), [ 'class' => 'check' ]), [ 'class' => 'content' ]);
            }
            echo Html::ul($ul, [ 'encode' => false, 'itemOptions' => [ 'class' => 'checked' ] ]);
            echo Html::tag('div', nl2br($this->header2), [ 'class' => 'header' ]);
            echo Html::ul($this->advancedList, [
                'item' => function($element, $index)
                {
                    return Html::tag('li', Html::tag('span', Html::img($element->image), [ 'class' => 'image' ])
                                    . Html::tag('span', Html::tag('span', $element->name, [ 'class' => 'name' ])
                                            . Html::tag('span', nl2br($element->description), [ 'class' => 'desc' ])
                                            . ($element->countable ? Html::tag('span', Html::button('-', [ 'class' => 'minus', 'onclick' => "if($('input[name=\"advanced-element-" . $element->id . "\"]').val()!=1) $('input[name=\"advanced-element-" . $element->id . "\"]').val(+$('input[name=\"advanced-element-" . $element->id . "\"]').val() - 1).change()" ])
                                                    . Html::textInput('advanced-element-' . $element->id, $this->inputdata && in_array($element->id, ArrayHelper::getColumn($this->inputdata, 'id')) ? ArrayHelper::map($this->inputdata, 'id', 'count')[$element->id] : 1)
                                                    . Html::button('+', [ 'class' => 'plus', 'onclick' => "if(+$('input[name=\"advanced-element-" . $element->id . "\"]').val()<999)  $('input[name=\"advanced-element-" . $element->id . "\"]').val(+$('input[name=\"advanced-element-" . $element->id . "\"]').val() + 1).change()", ]), [ 'class' => 'countable' ]) : '')
                                            . Html::tag('span', number_format($element->price * ($this->inputdata && in_array($element->id, ArrayHelper::getColumn($this->inputdata, 'id')) ? ArrayHelper::map($this->inputdata, 'id', 'count')[$element->id] : 1), 0, ',', ' ') . ' руб.', [ 'class' => 'price' ])
                                            . Html::tag('span', Html::img(\Yii::$app->params['image_dir_url'] . 'chb.png'), [ 'class' => 'check' ]), [ 'class' => 'content' ]), [
                                'data'  => [
                                    'id'        => $element->id,
                                    'price'     => $element->price,
                                    'countable' => $element->countable ? 1 : 0,
                                    'count'     => $this->inputdata && in_array($element->id, ArrayHelper::getColumn($this->inputdata, 'id')) ? ArrayHelper::map($this->inputdata, 'id', 'count')[$element->id] : 1,
                                ],
                                'class' => $this->inputdata && in_array($element->id, ArrayHelper::getColumn($this->inputdata, 'id')) ? 'checked' : '',
                    ]);
                },
            ]);
            echo Html::endTag('div');
        }
    }

}
