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
class PortfolioElementNavigationWidget extends Widget
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
            if (!($this->prev    = Page::find()
                    ->alias('p')
                    ->joinWith('pageType pt', false, 'INNER JOIN')
                    ->where([ 'pt.code' => self::TYPE_ELEMENT ])
                    ->andWhere([ 'not', [ 'p.id' => $this->pageId ] ])
                    ->andWhere([ '<', 'p.sort', $this->current->sort ])
                    ->andWhere([ 'page_id' => $this->current->page_id ])
                    ->orderBy([ 'sort' => SORT_DESC ])
                    ->one())) {
                $this->prev = Page::find()
                        ->alias('p')
                        ->joinWith('pageType pt', false, 'INNER JOIN')
                        ->where([ 'pt.code' => self::TYPE_ELEMENT ])
                        ->andWhere([ 'not', [ 'p.id' => $this->pageId ] ])
                        ->andWhere([ 'page_id' => $this->current->page_id ])
                        ->orderBy([ 'sort' => SORT_DESC ])
                        ->one();
            }
            if (!($this->next = Page::find()
                    ->alias('p')
                    ->joinWith('pageType pt', false, 'INNER JOIN')
                    ->where([ 'pt.code' => self::TYPE_ELEMENT ])
                    ->andWhere([ 'not', [ 'p.id' => $this->pageId ] ])
                    ->andWhere([ '>', 'p.sort', $this->current->sort ])
                    ->andWhere([ 'page_id' => $this->current->page_id ])
                    ->orderBy([ 'sort' => SORT_ASC ])
                    ->one())) {
                $this->next = Page::find()
                        ->alias('p')
                        ->joinWith('pageType pt', false, 'INNER JOIN')
                        ->where([ 'pt.code' => self::TYPE_ELEMENT ])
                        ->andWhere([ 'not', [ 'p.id' => $this->pageId ] ])
                        ->andWhere([ 'page_id' => $this->current->page_id ])
                        ->orderBy([ 'sort' => SORT_ASC ])
                        ->one();
            }
        }
    }

    public function run ()
    {
        if ($this->current && ($this->prev || $this->next)) {
            $ul = [];
            if ($this->prev) {
                $ul[] = Html::a(Html::tag('span', 'Предыдущий объект'), [ 'site/frontend', 'id' => $this->prev->id ], [ 'class' => 'prev' . ($this->next ? ' has-next' : '') ]);
            }
            if ($this->next) {
                $ul[] = Html::a(Html::tag('span', 'Следующий объект'), [ 'site/frontend', 'id' => $this->next->id ], [ 'class' => 'next' . ($this->prev ? ' has-prev' : '') ]);
            }
            echo Html::ul($ul, [ 'class' => 'element-nav', 'encode' => false, 'separator' => '' ]);
        }
    }

}
