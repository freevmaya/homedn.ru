<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use valekstepanov\flexslider\FlexSlider;
use app\models\LendingGallery;

/**
 * Description of LendingGalleryWidget
 *
 * @author stepanov
 */
class LendingGalleryWidget extends Widget
{

    public $pageId;
    public $galleryLink;
    protected $pageGallery;

    public function init ()
    {
        $this->pageGallery = LendingGallery::find()->where([ 'page_id' => $this->pageId ])->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->pageGallery) {
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
            echo Html::tag('div', Html::a('&#12296;', '#', [ 'class' => 'flex-prev' ]) . Html::a('&#12297;' . Html::tag('span', '9+'), '#', [ 'class' => 'flex-next' ]), [ 'class' => 'direction-nav', 'id' => 'lending-gallery-direction-nav' ]);
            echo Html::endTag('div');
            if ($this->galleryLink) {
                echo Html::tag('div', Html::a($this->galleryLink['label'], $this->galleryLink['url'], [ 'target' => '_blank' ]), [ 'class' => 'cta' ]);
            }
        }
    }

}
