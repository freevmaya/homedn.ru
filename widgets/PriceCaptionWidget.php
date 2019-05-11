<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\PriceCaption;
use rmrevin\yii\fontawesome\FAS;

/**
 * Description of PriceCaptionWidget
 *
 * @author stepanov
 */
class PriceCaptionWidget extends Widget
{

    public $underPrice;
    public $buttonText;
    protected $priceCaption;

    public function init ()
    {
        $this->priceCaption = PriceCaption::find()->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->priceCaption) {
            echo Html::beginTag('div', [ 'class' => 'price-caption-line' ]);
            $content            = [];
            $ul                 = [];
            $elementDescription = [];
            foreach ($this->priceCaption as $k => $caption) {
                $ul[] = Html::a($caption->name, '#caption-' . $caption->id, [ 'class' => 'caption-switch' . ($k == 0 ? ' active' : '') ]);
                $html = Html::beginTag('div', [ 'class' => 'caption-content' . ($k == 0 ? ' active' : ''), 'id' => 'caption-' . $caption->id ]);
                $html .= Html::beginTag('div', [ 'class' => 'col-1' ]);
                $html .= Html::tag('div', Html::tag('div', 'Цены', [ 'class' => 'header' ]) . Html::tag('div', $caption->description, [ 'class' => 'description' ]), [
                            'class' => 'thead' ]);

                foreach ($caption->priceElements as $element) {
                    $html                 .= Html::tag('div', Html::tag('span', nl2br($element->name) . ($element->description ? Html::a('?', '#element-description-' . $element->id, [
                                                'class' => 'popup-inline' ]) : ''), [ 'class' => 'name' ]), [ 'class' => 'r' ]);
                    $elementDescription[] = Html::tag('div', $element->description, [ 'class' => 'mfp-hide popup-window wrapper', 'id' => 'element-description-' . $element->id ]);
                }

                $html .= Html::endTag('div');

                $composit = [];
                foreach ($caption->priceComposits as $comp) {
                    if (isset($composit[$comp->price_option_id])) {
                        $composit[$comp->price_option_id][$comp->price_element_id] = 1;
                    } else {
                        $composit[$comp->price_option_id] = [ $comp->price_element_id => 1 ];
                    }
                }

                $options = [];
                foreach ($caption->priceOptions as $option) {
                    $part = Html::beginTag('div', [ 'class' => 'col-option' ]);
                    $part .= Html::tag('div', Html::tag('div', nl2br($option->name), [ 'class' => 'name' ])
                                    . Html::tag('div', 'от ' . $option->min_price . ' руб', [ 'class' => 'price' ])
                                    . Html::tag('div', $this->underPrice, [ 'class' => 'remark' ])
                                    . Html::tag('div', Html::a($this->buttonText, '#foz-measure', [ 'class' => 'popup-inline' ]), [ 'class' => 'cta' ])
                                    . Html::tag('div', '', [ 'class' => 'line' ]), [ 'class' => 'thead' ]);
                    foreach ($caption->priceElements as $element) {
                        $part .= Html::tag('div', isset($composit[$option->id]) && isset($composit[$option->id][$element->id]) ? Html::tag('span', FAS::i('check'), [
                                            'class' => 'check' ]) : Html::tag('span', FAS::i('times'), [ 'class' => 'times' ]), [ 'class' => 'r' ]);
                    }
                    $part      .= Html::endTag('div');
                    $options[] = $part;
                }
                $html      .= implode('', $options);
                $html      .= Html::endTag('div');
                $content[] = $html;
            }
            $ul[] = Html::tag('span', '');
            echo Html::ul($ul, [ 'encode' => false ]);
            echo Html::endTag('div');
            echo Html::tag('div', implode(' ', $content), [ 'class' => 'price-caption-contents' ]);
            echo implode(' ', $elementDescription);
        }
    }

}
