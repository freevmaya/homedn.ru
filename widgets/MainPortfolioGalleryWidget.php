<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\MainPortfolioGallery;
use yii\helpers\Html;
use valekstepanov\flexslider\FlexSlider;

/**
 * Description of MainPortfolioGalleryWidget
 *
 * @author stepanov
 */
class MainPortfolioGalleryWidget extends Widget
{

    protected $gallery;

    public function init ()
    {
        $this->gallery = MainPortfolioGallery::find()->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->gallery) {
            $ul1 = [];
            $ul2 = [];
            $ul3 = [];
            foreach ($this->gallery as $image) {
                $ul1[] = Html::img(\Yii::$app->imageresize->getUrl('@webroot' . $image->image, 734, 489));
                $ul2[] = Html::img(\Yii::$app->imageresize->getUrl('@webroot' . $image->image, 159, 106));
                $ul3[] = Html::img(\Yii::$app->imageresize->getUrl('@webroot' . $image->image, 1600, 817, 'inset'));
            }
            echo FlexSlider::widget([
                'items'         => $ul3,
                'pluginOptions' => [
                    'animation'     => 'fade',
                    'controlNav'    => false,
                    'animationLoop' => true,
                    'slideshow'     => false,
                    'sync'          => '#main-portfolio-gallery-carousel',
                    'directionNav'  => false,
                ],
                'options'       => [
                    'id' => 'main-portfolio-gallery-back',
                ],
            ]);
            echo Html::beginTag('div', [ 'class' => 'main-portfolio-gallery' ]);
            echo Html::beginTag('div', [ 'class' => 'wrapper' ]);
            echo FlexSlider::widget([
                'items'         => $ul1,
                'pluginOptions' => [
                    'animation'          => 'slide',
                    'controlNav'         => false,
                    'animationLoop'      => true,
                    'slideshow'          => false,
                    'sync'               => '#main-portfolio-gallery-carousel',
                    'customDirectionNav' => "$('#main-portfolio-gallery-direction-nav a')",
                ],
                'options'       => [
                    'id' => 'main-portfolio-gallery-slider',
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
                    'asNavFor'      => '#main-portfolio-gallery-slider, #main-portfolio-gallery-back',
                    'directionNav'  => false,
                ],
                'options'       => [
                    'id' => 'main-portfolio-gallery-carousel',
                ],
            ]);
            echo Html::tag('div', Html::a('', '#', [ 'class' => 'flex-prev' ]) . Html::a('' . Html::tag('span', '9+'), '#', [
                        'class' => 'flex-next' ]), [ 'class' => 'direction-nav', 'id' => 'main-portfolio-gallery-direction-nav' ]);
            echo Html::endTag('div');
            echo Html::endTag('div');
        }
    }

}
