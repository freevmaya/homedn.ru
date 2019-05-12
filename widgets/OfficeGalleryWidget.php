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
use porcelanosa\magnificPopup\MagnificPopup;
use app\models\OfficeGallery;

/**
 * Description of OfficeGalleryWidget
 *
 * @author stepanov
 * 
 * @property OfficeGallery[] $items
 */
class OfficeGalleryWidget extends Widget
{

    protected $items;

    public function init ()
    {
        $this->items = OfficeGallery::find()->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->items) {
            $ul = [];
            foreach ($this->items as $k => $item) {
                $ul[] = Html::a($item->inwidget ? Html::img(Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . $item->image), $k < 2 ? 475 : 232, $k < 2 ? 317 : 155)) : '', $item->image, [ 'class' => 'gallery-item' . (!$item->inwidget ? ' hide' : '') ]);
            }
            echo Html::tag('div', Html::ul($ul, [ 'encode' => false ]), [ 'class' => 'office-gallery' ]);
            echo MagnificPopup::widget([
                'target'  => '.office-gallery',
                'options' => [
                    'delegate' => 'a',
                    'type'     => 'image',
                    'gallery'  => [
                        'enabled'  => true,
                        'tCounter' => '<span class="mfp-counter">%curr% из %total%</span>'
                    ]
                ]
            ]);
        }
    }

}
