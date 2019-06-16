<?php

namespace app\widgets;

use app\models\Page;
use yii\base\Widget;
use yii\helpers\Html;

class SitemapWidget extends Widget
{

    public $pageList;

    public function init ()
    {
        $this->pageList = Page::find()
                ->alias('p')
                ->joinWith('pageType pt', false, 'INNER JOIN')
                ->joinWith('pageSeo ps', false, 'INNER JOIN')
                ->where([ 'status' => 1, 'ps.noindex' => 0, 'p.page_id' => null ])
                ->orderBy([ 'pt.name' => SORT_ASC, 'p.name' => SORT_ASC, 'p.sort' => SORT_ASC ])
                ->all();
    }

    /**
     * 
     * @param Page $page
     */
    protected static function letUl ($page)
    {
        if ($page->pages) {
            $ul = [];
            foreach ($page->pages as $p) {
                $ul[] = Html::a($p->name, [ 'site/frontend', 'id' => $p->id ]) . self::letUl($p);
            }
            return Html::ul($ul, [ 'encode' => false ]);
        }
        return '';
    }

    public function run ()
    {
        if ($this->pageList) {
            $items = [];
            foreach ($this->pageList as $p) {
                $items[] = Html::a($p->name, [ 'site/frontend', 'id' => $p->id ]) . self::letUl($p);
            }
            $items[] = Html::a('sitemap.xml', '/sitemap.xml');
            echo Html::ul($items, [ 'encode' => false ]);
        }
    }

}
