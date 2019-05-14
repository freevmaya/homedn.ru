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
use app\models\Page;
use app\helpers\PageProperty;

/**
 * Description of PortfolioElementNavigationWidget
 *
 * @author stepanov
 * 
 * @property integer $pageId 
 * @property Page $current 
 * @property Page $prev 
 * @property Page $next 
 */
class PortfolioElementRelativeWidget extends Widget
{

    public $pageId;
    protected $current;
    protected $prev;
    protected $next;

    const TYPE_ELEMENT = 'portfolio-element';

    public function init ()
    {
        if ($this->pageId) {
            $this->current = Page::find()->where([ 'id' => $this->pageId ])->one();
            $this->prev    = Page::find()
                    ->alias('p')
                    ->joinWith('pageType pt', false, 'INNER JOIN')
                    ->where([ 'pt.code' => self::TYPE_ELEMENT ])
                    ->andWhere([ 'not', [ 'p.id' => $this->pageId ] ])
                    ->andWhere([ '<', 'p.sort', $this->current->sort ])
                    ->andWhere([ 'page_id' => $this->current->page_id ])
                    ->orderBy([ 'sort' => SORT_DESC ])
                    ->all();
            $this->next    = Page::find()
                    ->alias('p')
                    ->joinWith('pageType pt', false, 'INNER JOIN')
                    ->where([ 'pt.code' => self::TYPE_ELEMENT ])
                    ->andWhere([ 'not', [ 'p.id' => $this->pageId ] ])
                    ->andWhere([ '>', 'p.sort', $this->current->sort ])
                    ->andWhere([ 'page_id' => $this->current->page_id ])
                    ->orderBy([ 'sort' => SORT_ASC ])
                    ->all();
        }
    }

    public function run ()
    {
        if ($this->current && ($this->prev || $this->next)) {
            echo Html::beginTag('div', [ 'class' => 'section-element-list' ]);
            $ul = [];
            foreach ($this->prev as $element) {
                if (PageProperty::getValue($element->id, 'image5')) {
                    $ul[] = Html::tag('span', ($element->portfolioReviews ? Html::tag('span', 'Отзыв', [ 'class' => 'review' ]) : '')
                                    . Html::tag('span', Html::tag('span', nl2br(PageProperty::getValue($element->id, 'header26')), [ 'class' => 'header-1' ])
                                            . Html::tag('span', '', [ 'class' => 'line' ])
                                            . Html::tag('span', nl2br(PageProperty::getValue($element->id, 'header27')), [ 'class' => 'header-2' ]), [ 'class' => 'info' ]), [ 'class' => 'image', 'data-back' => PageProperty::getValue($element->id, 'image5') ])
                            . Html::tag('span', nl2br(PageProperty::getValue($element->id, 'text2desc')), [ 'class' => 'desc' ])
                            . Html::tag('span', Html::a('Смотреть объект', [ 'site/frontend', 'id' => $element->id ]), [ 'class' => 'cta' ]);
                    break;
                }
            }
            foreach ($this->next as $element) {
                if (PageProperty::getValue($element->id, 'image5')) {
                    $ul[] = Html::tag('span', ($element->portfolioReviews ? Html::tag('span', 'Отзыв', [ 'class' => 'review' ]) : '')
                                    . Html::tag('span', Html::tag('span', nl2br(PageProperty::getValue($element->id, 'header26')), [ 'class' => 'header-1' ])
                                            . Html::tag('span', '', [ 'class' => 'line' ])
                                            . Html::tag('span', nl2br(PageProperty::getValue($element->id, 'header27')), [ 'class' => 'header-2' ]), [ 'class' => 'info' ]), [ 'class' => 'image', 'data-back' => PageProperty::getValue($element->id, 'image5') ])
                            . Html::tag('span', nl2br(PageProperty::getValue($element->id, 'text2desc')), [ 'class' => 'desc' ])
                            . Html::tag('span', Html::a('Смотреть объект', [ 'site/frontend', 'id' => $element->id ]), [ 'class' => 'cta' ]);
                    break;
                }
            }
            echo Html::ul($ul, [ 'encode' => false ]);
            echo Html::endTag('div');
        }
    }

}
