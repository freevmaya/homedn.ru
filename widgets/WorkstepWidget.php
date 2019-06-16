<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Workstep;
use app\models\LendingGallery;
use app\helpers\PageProperty;
use yii\helpers\Html;
use valekstepanov\flexslider\FlexSlider;

/**
 * Description of WorkstepWidget
 *
 * @author stepanov
 */
class WorkstepWidget extends Widget
{

    public $pageId;
    public $galleryLink;
    protected $workstepList;
    protected $sortGallery;
    protected $pageGallery;

    public function init ()
    {
        $this->workstepList = Workstep::find()->where([ 'page_id' => $this->pageId ])->orderBy([ 'sort' => SORT_ASC ])->all();
        $this->sortGallery  = PageProperty::getValue($this->pageId, 'sort1');
        $this->pageGallery  = LendingGallery::find()->where([ 'page_id' => $this->pageId ])->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->workstepList) {
            foreach ($this->workstepList as $workstep) {
                if ($this->pageGallery && $this->sortGallery && $this->sortGallery < $workstep->sort) {
                    echo Html::beginTag('div', [ 'class' => 'lending-gallery' ]);
                    $ul1 = [];
                    $ul2 = [];
                    foreach ($this->pageGallery as $image) {
                        $ul1[] = Html::img(\Yii::$app->imageresize->getUrl('@webroot' . $image->image, 734, 489));
                        $ul2[] = Html::img(\Yii::$app->imageresize->getUrl('@webroot' . $image->image, 159, 106));
                    }
                    echo FlexSlider::widget([
                        'items'         => $ul1,
                        'pluginOptions' => [
                            'animation'          => 'slide',
                            'controlNav'         => false,
                            'animationLoop'      => true,
                            'slideshow'          => false,
                            'sync'               => '#lending-gallery-carousel',
                            'customDirectionNav' => "$('#lending-gallery-direction-nav a')",
                        ],
                        'options'       => [
                            'id' => 'lending-gallery-slider',
                        ],
                    ]);
                    echo FlexSlider::widget([
                        'items'         => $ul2,
                        'pluginOptions' => [
                            'animation'     => 'slide',
                            'controlNav'    => false,
                            'animationLoop' => true,
                            'slideshow'     => false,
                            'itemWidth'     => 159,
                            'itemMargin'    => 17,
                            'asNavFor'      => '#lending-gallery-slider',
                            'directionNav'  => false,
                        ],
                        'options'       => [
                            'id' => 'lending-gallery-carousel',
                        ],
                    ]);
                    echo Html::tag('div', Html::a('', '#', [ 'class' => 'flex-prev' ]) . Html::a('' . Html::tag('span', '9+'), '#', [ 'class' => 'flex-next' ]), [ 'class' => 'direction-nav', 'id' => 'lending-gallery-direction-nav' ]);
                    echo Html::endTag('div');
                    if ($this->galleryLink) {
                        echo Html::tag('div', Html::a($this->galleryLink['label'], $this->galleryLink['url'], [ 'target' => '_blank' ]), [ 'class' => 'cta' ]);
                    }
                    $this->sortGallery = false;
                }
                echo Html::beginTag('div', [ 'class' => 'workstep-element' . ($workstep->image ? ' with-image' : '') ]);
                if ($workstep->image) {
                    echo Html::tag('div', Html::img($workstep->image), [ 'class' => 'image' ]);
                }
                echo Html::beginTag('div', [ 'class' => 'workstep-content' ]);
                echo Html::tag('div', $workstep->name, [ 'class' => 'name' ]);
                echo Html::tag('div', $workstep->description, [ 'class' => 'desc' ]);
                echo Html::endTag('div');
                echo Html::endTag('div');
            }
        }
    }

}
