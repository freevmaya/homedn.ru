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
use app\helpers\SiteProperty;
use yii\helpers\Html;

/**
 * Description of ArticleSectionListWidget
 *
 * @author stepanov
 */
class ArticleSectionListWidget extends Widget
{

    public $articleId;
    public $sectionId;
    protected $sectionList;

    const PAGE_TYPE_SECTION = 'article-section';

    public function init ()
    {
        $this->sectionList = Page::find()
                ->alias('p')
                ->joinWith('pageType pt', false, 'INNER JOIN')
                ->where([ 'pt.code' => self::PAGE_TYPE_SECTION, 'status' => 1, 'p.page_id' => SiteProperty::getValue('blogpageid') ])
                ->orderBy([ 'p.sort' => SORT_ASC ])
                ->all();
    }

    public static function letUl ($page, $sectionId)
    {
        if ($page->pages) {
            $ul = [];
            foreach ($page->pages as $p) {
                if ($p->pageType->code == self::PAGE_TYPE_SECTION)
                    $ul[] = Html::a($p->name, $p->id == $sectionId ? null : [ 'site/frontend', 'id' => $p->id ], [ 'class' => $p->id == $sectionId ? 'active' : '' ]) . self::letUl($p, $sectionId);
            }
            return $ul ? Html::ul($ul, [ 'encode' => false ]) : '';
        }
        return '';
    }

    public function run ()
    {
        if ($this->sectionList) {
            echo Html::beginTag('div', [ 'class' => 'section-list' ]);
            echo Html::tag('div', 'Выберите раздел', [ 'class' => 'h' ]);
            $ul = [];
            foreach ($this->sectionList as $s) {
                $ul[] = Html::a($s->name, $s->id == $this->sectionId ? null : [ 'site/frontend', 'id' => $s->id ], [ 'class' => $s->id == $this->sectionId ? 'active' : '' ]) . self::letUl($s, $this->sectionId);
            }
            echo Html::ul($ul, [ 'encode' => false ]);
            echo Html::endTag('div');
        }
    }

}
