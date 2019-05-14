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
 * Description of PriceSectionListWidget
 *
 * @author stepanov
 * 
 * @property integer $pageId 
 * @property Page[] $pageList 
 */
class PriceSectionListWidget extends Widget
{

    public $pageId;
    protected $pageList;

    public function init ()
    {
        $this->pageList = Page::find()->where([ 'page_id' => $this->pageId, 'status' => 1 ])->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->pageList) {
            $ul = [];
            foreach ($this->pageList as $page) {
                $ul[] = Html::a(Html::tag('span', Html::img(PageProperty::getValue($page->id, 'image8'), [ 'data-hover' => PageProperty::getValue($page->id, 'image9') ]), [ 'class' => 'image' ])
                                . Html::tag('span', PageProperty::getValue($page->id, 'header42'), [ 'class' => 'name' ]), [ 'site/frontend', 'id' => $page->id ]);
            }
            echo Html::ul($ul, [ 'encode' => false, 'class' => 'price-section-list' ]);
        }
    }

}
