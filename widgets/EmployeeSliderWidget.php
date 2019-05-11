<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;
use valekstepanov\flexslider\FlexSlider;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FAS;
use rmrevin\yii\fontawesome\CdnFreeAssetBundle;
use app\models\Employee;

/**
 * Description of EmployeeSliderWidget
 *
 * @author stepanov
 */
class EmployeeSliderWidget extends Widget
{

    protected $employeeList;

    public function init ()
    {
        $this->employeeList = Employee::find()
//                ->where([ 'not', [ 'photo2' => '' ] ])
//                ->andWhere([ 'not', [ '>', 'sort_slide', 0 ] ])
                ->orderBy([ 'sort_slide' => SORT_ASC ])
                ->all();
    }

    public function run ()
    {
        if ($this->employeeList) {
            CdnFreeAssetBundle::register($this->view);
            $items = [];
            echo Html::beginTag('div', [ 'class' => 'employee-slider' ]);
            foreach ($this->employeeList as $emp) {
                if ($emp->photo2) {
                    $content = Html::beginTag('span', [ 'class' => 'element' ]);
                    $content .= Html::tag('span', Html::img($emp->photo2), [ 'class' => 'image' ]);
                    $content .= Html::tag('span', '', [ 'class' => 'bc' ]);
                    if ($emp->video) {
                        $content .= Html::tag('span', Html::a(Html::img(\Yii::$app->params['image_dir_url'] . 'video2.png') . Html::tag('span', 'Посмотреть видео', [
                                                    'class' => 'text' ]), $emp->video, [ 'class' => 'popup-video' ]), [ 'class' => 'video' ]);
                    }
                    $content .= Html::tag('span', $emp->fio, [ 'class' => 'fio' ]) . Html::tag('span', $emp->place, [ 'class' => 'place' ]);
                    $content .= Html::endTag('span');
                    $items[] = [
                        'content' => $content,
                    ];
                }
            }
            if ($items) {
                echo FlexSlider::widget([
                    'items'         => $items,
                    'pluginOptions' => [
                        'slideshow'          => false,
                        'customDirectionNav' => "$('#employee-slider-navigation-nav a')",
                        'animation'          => 'slide',
                        'itemWidth'          => 275,
                        'itemMargin'         => 0,
                        'controlNav'         => false,
                        'move'               => 1,
                    ],
                ]);
                echo Html::tag('div', Html::a(FAS::i('angle-left'), '#', [ 'class' => 'flex-prev' ]) . Html::a(FAS::i('angle-right'), '#', [ 'class' => 'flex-next' ]), [
                    'class' => 'direction-nav', 'id'    => 'employee-slider-navigation-nav' ]);
            }
            echo Html::endTag('div');
        }
    }

}
