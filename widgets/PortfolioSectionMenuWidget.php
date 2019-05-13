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
 * Description of PortfolioSectionMenuWidget
 *
 * @author stepanov
 * 
 * @property integer $pageId 
 */
class PortfolioSectionMenuWidget extends Widget
{

    public $pageId;
    protected $sectionList;

    const TYPE_SECTION = 'portfolio-section';

    public function init ()
    {
        $this->sectionList = Page::find()
                ->joinWith('pageType pt', false, 'INNER JOIN')
                ->where([ 'pt.code' => self::TYPE_SECTION ])
                ->orderBy([ 'sort' => SORT_ASC ])
                ->all();
    }

    public function run ()
    {
        if ($this->sectionList) {
            $ul = [];
            echo Html::beginTag('div', [ 'class' => 'section-menu' ]);
            foreach ($this->sectionList as $section) {
                $ul[] = $section->id == $this->pageId ?
                        Html::tag('span', PageProperty::getValue($section->id, 'header29')) :
                        Html::a(Html::tag('span', PageProperty::getValue($section->id, 'header29')), [ 'site/frontend', 'id' => $section->id ]);
            }
            echo str_replace('<li><span', '<li class="active"><span', Html::ul($ul, [ 'encode' => false ]));
            echo Html::endTag('div');
        }
    }

}
