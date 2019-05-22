<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\StyleList;
use app\widgets\FormViewWidget;
use app\models\StyleProjectForm;

/**
 * Description of StyleListWidget
 *
 * @author stepanov
 */
class StyleListWidget extends Widget
{

    public $pageId;
    protected $styleList;

    public function init ()
    {
        $this->styleList = StyleList::find()->where([ 'page_id' => $this->pageId ])->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->styleList) {
            echo Html::beginTag('div', [ 'class' => 'style-list' ]);
            foreach ($this->styleList as $style) {
                echo Html::beginTag('div', [ 'class' => 'style-element', 'data' => [ 'id' => $style->id ] ]);
                echo Html::tag('span', Html::img($style->image), [ 'class' => 'image' ]);
                echo Html::tag('div', $style->name, [ 'class' => 'name' ]);
                echo Html::tag('div', nl2br($style->desc), [ 'class' => 'desc' ]);
                $ul = [];
                foreach ([ 1, 2, 3 ] as $i) {
                    if ($style->{'color' . $i}) {
                        $ul[] = Html::tag('span', '', [ 'class' => 'color', 'data' => [ 'color' => $style->{'color' . $i} ] ]);
                    }
                }
                echo Html::ul($ul, [ 'encode' => false, 'class' => 'color-line' ]);
                echo Html::tag('div', Html::a('Узнать стоимость проекта', '#foz-projectcost', [ 'class' => 'popup-inline' ]), [ 'class' => 'cta' ]);
                echo Html::endTag('div');
            }
            echo Html::endTag('div');
            echo Html::beginTag('div', [ 'class' => 'mfp-hide popup-window wrapper', 'id' => 'foz-projectcost' ]);
            echo FormViewWidget::widget([
                'formClass'     => StyleProjectForm::class,
                'submitMessage' => 'Узнать стоимость',
                'header'        => 'Заполните форму',
                'subheader'     => 'и узнайте точную стоимость ремонта квартиры',
            ]);
            echo Html::endTag('div');
        }
    }

}
