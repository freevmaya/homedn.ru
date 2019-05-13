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
use app\helpers\PageProperty;
use app\models\Page;

/**
 * Description of PortfolioElementListWidget
 *
 * @author stepanov
 * 
 * @property integer $pageId 
 * @property Page[] portfolioElementList 
 * @property Page $portfolioSection 
 */
class PortfolioElementListWidget extends Widget
{

    public $pageId;
    protected $portfolioElementList;
    protected $portfolioSection;

    const TYPE_SECTION = 'portfolio-section';
    const TYPE_ELEMENT = 'portfolio-element';

    public function init ()
    {
        if ($this->pageId) {
            $this->portfolioElementList = Page::find()
                    ->joinWith('pageType pt', false, 'INNER JOIN')
                    ->where([ 'pt.code' => self::TYPE_ELEMENT ])
                    ->andWhere([ 'page_id' => $this->pageId ])
                    ->orderBy([ 'sort' => SORT_ASC ])
                    ->all();
            $this->portfolioSection     = Page::find()
                    ->alias('p')
                    ->joinWith('pageType pt', false, 'INNER JOIN')
                    ->where([ 'p.id' => $this->pageId, 'pt.code' => self::TYPE_SECTION ])
                    ->one();
        }
    }

    public function run ()
    {
        if ($this->portfolioElementList && $this->portfolioSection) {
            echo Html::beginTag('div', [ 'class' => 'section-list' ]);
            echo Html::beginTag('div', [ 'class' => 'section' ]);
            echo Html::tag('div', Html::tag('div', PageProperty::getValue($this->portfolioSection->id, 'header24'), [ 'class' => 'header-1' ])
                    . Html::tag('div', '', [ 'class' => 'line' ])
                    . Html::tag('div', PageProperty::getValue($this->portfolioSection->id, 'header25'), [ 'class' => 'header-2' ])
                    /* . Html::tag('div', Html::a(PageProperty::getValue($this->portfolioSection->id, 'cta9text'), [ 'site/frontend', 'id' => $this->portfolioSection->id ]), [ 'class' => 'cta' ]) */, [ 'class' => 'head', 'data-back' => PageProperty::getValue($this->portfolioSection->id, 'image4') ]);
            if ($this->portfolioSection->pages) {
                echo Html::beginTag('div', [ 'class' => 'section-element-list' ]);
                $ul = [];
                foreach ($this->portfolioSection->pages as $element) {
                    if (PageProperty::getValue($element->id, 'image5')) {
                        $ul[] = Html::tag('span', ($element->portfolioReviews ? Html::tag('span', 'Отзыв', [ 'class' => 'review' ]) : '')
                                        . Html::tag('span', Html::tag('span', nl2br(PageProperty::getValue($element->id, 'header26')), [ 'class' => 'header-1' ])
                                                . Html::tag('span', '', [ 'class' => 'line' ])
                                                . Html::tag('span', nl2br(PageProperty::getValue($element->id, 'header27')), [ 'class' => 'header-2' ]), [ 'class' => 'info' ]), [ 'class' => 'image', 'data-back' => PageProperty::getValue($element->id, 'image5') ])
                                . Html::tag('span', nl2br(PageProperty::getValue($element->id, 'text2desc')), [ 'class' => 'desc' ])
                                . Html::tag('span', Html::a('Смотреть объект', [ 'site/frontend', 'id' => $element->id ]), [ 'class' => 'cta' ]);
                    }
                }
                echo Html::ul($ul, [ 'encode' => false ]);
                echo Html::endTag('div');
            }
            echo Html::endTag('div');
            echo Html::endTag('div');
        }
    }

}
