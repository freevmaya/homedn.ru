<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Page;
use yii\helpers\Html;
use app\helpers\PageProperty;

/**
 * Description of ArticleElementRelativeWidget
 *
 * @author stepanov
 */
class ArticleElementRelativeWidget extends Widget
{

    public $elementId;
    protected $currentElement;
    protected $elementList;

    const PAGETYPE_ARTICLE_ELEMENT = 'article-element';

    public function init ()
    {
        $this->currentElement = Page::find()->where([ 'id' => $this->elementId ])->one();
        $this->elementList    = Page::find()
                ->alias('p')
                ->joinWith('pageType pt', false, 'INNER JOIN')
                ->where([ 'status' => 1, 'pt.code' => self::PAGETYPE_ARTICLE_ELEMENT, 'page_id' => $this->currentElement->page_id ])
                ->andWhere([ '>', 'p.sort', $this->currentElement->sort ])
                ->andWhere([ 'not', [ 'p.id' => $this->elementId ] ])
                ->orderBy([ 'p.sort' => SORT_ASC ])
                ->limit(3)
                ->all();
        if (count($this->elementList) < 3) {
            foreach ($set = Page::find()
            ->alias('p')
            ->joinWith('pageType pt', false, 'INNER JOIN')
            ->where([ 'status' => 1, 'pt.code' => self::PAGETYPE_ARTICLE_ELEMENT, 'page_id' => $this->currentElement->page_id ])
            ->andWhere([ '<', 'p.sort', $this->currentElement->sort ])
            ->andWhere([ 'not', [ 'p.id' => $this->elementId ] ])
            ->orderBy([ 'p.sort' => SORT_ASC ])
            ->limit(3 - count($this->elementList))
            ->all() as $p) {
                $this->elementList[] = $p;
            }
        }
    }

    public function run ()
    {
        if ($this->elementList) {
            echo Html::beginTag('div', [ 'class' => 'relative-list' ]);
            $ul = [];
            foreach ($this->elementList as $p) {
                $ul[]  = Html::tag('span', Html::img(PageProperty::getValue($p->id, 'image12'))
                                . Html::tag('span', Html::img(Yii::$app->params['image_dir_url']
                                                . (PageProperty::getValue($p->id, 'video8') ? 'ae1.png' : 'ae2.png')), [ 'class' => 'content-icon' ])
                                . (($count = PageProperty::getValue($p->id, 'count1')) && $count > 0 ? Html::tag('span', Html::img(Yii::$app->params['image_dir_url']
                                                . 'ae3.png')
                                        . Html::tag('span', $count), [ 'class' => 'view-icon' ]) : ''), [ 'class' => 'image' ])
                        . Html::tag('span', Html::a(PageProperty::getValue($p->id, 'header58'), [ 'site/frontend', 'id' => $p->id ]), [ 'class' => 'name' ]);
            }
            echo Html::ul($ul, [ 'encode' => false, 'class' => 'list' ]);
            echo Html::endTag('div');
        }
    }

}
