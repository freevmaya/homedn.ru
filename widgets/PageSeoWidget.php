<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\PageSeo;
use yii\helpers\Html;

/**
 * Description of PageSeoWidget
 *
 * @author stepanov
 * 
 * @property integer $pageId 
 * @property PageSeo $pageSeo 
 * @property \yii\web\View $pageView 
 * 
 */
class PageSeoWidget extends Widget
{

    public $pageId;
    public $pageSeo;
    public $pageView;

    public function init ()
    {
        if (!$this->pageSeo) {
            $this->pageSeo = PageSeo::find()->where([ 'page_id' => $this->pageId ])->one();
        }
        if ($this->pageSeo && $this->pageView) {
            $this->pageView->title = $this->pageSeo->title;
            $this->pageView->registerMetaTag([ 'name' => 'keywords', 'content' => $this->pageSeo->keywords ]);
            $this->pageView->registerMetaTag([ 'name' => 'description', 'content' => $this->pageSeo->description ]);
        }
    }

    public function run ()
    {
        if ($this->pageSeo && ($this->pageSeo->h1 || $this->pageSeo->content)) {
            echo Html::beginTag('section', [ 'class' => 'section-content' ]);
            echo Html::beginTag('div', [ 'class' => 'wrapper' ]);
            if ($this->pageSeo->h1) {
                echo Html::tag('h1', $this->pageSeo->h1);
            }
            if ($this->pageSeo->content) {
                echo Html::tag('div', $this->pageSeo->content, [ 'class' => 'page-content' ]);
            }
            echo Html::endTag('div');
            echo Html::endTag('section');
        }
    }

}
