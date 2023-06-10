<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\CalcInputdata;
use yii\helpers\Html;
use app\helpers\SiteProperty;
use app\helpers\CalcHelper;

/**
 * Description of CalcInputdataShowWidget
 *
 * @author stepanov
 */
class CalcInputdataShowWidget extends Widget
{

    public $calcKey;
    public $calcInputdata;
    protected $startPrice;

    public function init ()
    {
        $this->calcInputdata = ($c                   = CalcInputdata::find()->where([ 'key' => $this->calcKey ])->one()) ? json_decode($c->user_data, true) : false;
    }

    public function run ()
    {
        if ($this->calcInputdata) {
            echo Html::beginTag('div', [ 'class' => 'inputdata-container' ]);
            echo Html::tag('div', strlen($this->calcInputdata['address_name']) > strlen($this->calcInputdata['address']) ? $this->calcInputdata['address_name'] : $this->calcInputdata['address'], [ 'class' => 'address' ]);
            echo Html::a('Изменить', [ 'site/frontend', 'id' => SiteProperty::getValue('calcpageid') ], [ 'class' => 'change' ]);
            echo Html::beginTag('div', [ 'class' => 'content' ]);
            echo Html::tag('p', $this->calcInputdata['roomcount'] . '-комнатная квартира площадью: ' . Html::tag('span', $this->calcInputdata['square'] . ' кв. м', [ 'class' => 'val' ]));
            echo Html::tag('p', 'Количество санузлов: ' . Html::tag('span', $this->calcInputdata['toiletcount'], [ 'class' => 'val' ]));
            echo Html::tag('p', 'Количество дверей: ' . Html::tag('span', $this->calcInputdata['doorcount'], [ 'class' => 'val' ]));
            echo Html::tag('p', 'Демонтаж: ' . Html::tag('span', $this->calcInputdata['second'] ? 'нужен' : 'не нужен', [ 'class' => 'val' ]));
            echo Html::tag('p', 'Возведение стен: ' . Html::tag('span', $this->calcInputdata['wall'] ? 'нужно' : 'не нужно', [ 'class' => 'val' ]));
            echo Html::tag('p', 'Стоимость ремонта: ' . Html::tag('span', Html::tag('span', number_format(CalcHelper::getSum($this->calcKey), 0, ',', ' '), [ 'id' => 'sum-top' ]), [ 'class' => 'val' ]));
            echo Html::endTag('div');
            echo Html::endTag('div');
        }
    }

}
