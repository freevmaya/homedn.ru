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
use app\helpers\PageProperty;
use app\helpers\SiteProperty;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use rmrevin\yii\fontawesome\FAS;
use rmrevin\yii\fontawesome\CdnFreeAssetBundle;

/**
 * Description of ArticleElementList
 *
 * @author stepanov
 */
class ArticleElementList extends Widget
{

    public $sectionId;
    protected $elementList;
    protected $pages;

    const PAGETYPE_ARTICLE_ELEMENT = 'article-element';

    public function init ()
    {
        $this->elementList = Page::find()
                ->alias('p')
                ->joinWith('pageType pt', false, 'INNER JOIN')
                ->where([ 'status' => 1, 'pt.code' => self::PAGETYPE_ARTICLE_ELEMENT ]);
        if ($this->sectionId) {
            $this->elementList->andWhere([ 'page_id' => $this->sectionId ]);
        }
        $countQuery        = clone $this->elementList;
        $this->pages       = new Pagination([ 'totalCount' => $countQuery->count(), 'pageSize' => isset(Yii::$app->request->get()['per-page']) ? Yii::$app->request->get()['per-page'] : 20 ]);
        $this->elementList = $this->elementList
                ->offset($this->pages->offset)
                ->orderBy([ 'p.sort' => SORT_ASC ])
                ->limit($this->pages->limit)
                ->all();
    }

    public function run ()
    {
        if ($this->elementList) {
            CdnFreeAssetBundle::register($this->view);
            echo Html::beginTag('div', [ 'class' => 'article-list' ]);
            $ul = [];
            foreach ($this->elementList as $p) {
                $ul[]  = Html::a(Html::tag('span', Html::img(PageProperty::getValue($p->id, 'image12'))
                                . Html::tag('span', Html::img(Yii::$app->params['image_dir_url']
                                                . (PageProperty::getValue($p->id, 'video8') ? 'ae1.png' : 'ae2.png')), [ 'class' => 'content-icon' ])
                                . (($count = PageProperty::getValue($p->id, 'count1')) && $count > 0 ? Html::tag('span', Html::img(Yii::$app->params['image_dir_url']
                                                . 'ae3.png')
                                        . Html::tag('span', $count), [ 'class' => 'view-icon' ]) : ''), [ 'class' => 'image' ])
                        . Html::tag('span', PageProperty::getValue($p->id, 'header58'), [ 'class' => 'name' ]), [ 'site/frontend', 'id' => $p->id ]);
            }
            echo Html::ul($ul, [ 'encode' => false, 'class' => 'list' ]);
            if (!isset(Yii::$app->request->get()['per-page']) && $this->pages->limit < $this->pages->totalCount)
                echo Html::tag('div', Html::a('Показать все статьи', $this->sectionId ? [ 'site/frontend', 'id' => $this->sectionId, 'per-page' => $this->pages->totalCount ] : [ 'site/frontend', 'id' => SiteProperty::getValue('blogpageid'), 'per-page' => $this->pages->totalCount ]), [ 'class' => 'all' ]);
            echo LinkPager::widget([
                'pagination'               => $this->pages,
                'nextPageLabel'            => 'Следующие ' . FAS::i('angle-right'),
                'prevPageLabel'            => FAS::i('angle-left') . ' Предыдущие',
                'disableCurrentPageButton' => true,
            ]);
            echo Html::endTag('div');
        }
    }

}
