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
use app\models\ProgressGallery;

/**
 * Description of ProgressGalleryWidget
 *
 * @author stepanov
 * 
 * @property ProgressGallery[] $items 
 */
class ProgressGalleryWidget extends Widget
{

    protected $items;

    public function init ()
    {
        $this->items = ProgressGallery::find()->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->items) {
            echo Html::beginTag('div', [ 'class' => 'progress-gallery-set' ]);
            foreach ($this->items as $item) {
                echo Html::beginTag('div', [ 'class' => 'progress-element' ]);
                echo Html::beginTag('div', [ 'class' => 'wrapper' ]);
                echo Html::tag('div', Html::tag('span', '', [ 'class' => 'back' ]) . Html::tag('span', $item->year, [ 'class' => 'text' ]) . Html::tag('span', '', [ 'class' => 'over' ]), [ 'class' => 'year' ]);
                echo Html::tag('div', nl2br($item->header), [ 'class' => 'header' ]);
                echo Html::tag('div', $item->content, [ 'class' => 'content' ]);
                if ($item->media) {
                    $photos = explode(',', trim($item->media));
                    $videos = explode(',', trim($item->video));
                    echo Html::beginTag('div', [ 'class' => 'media' ]);
                    $ul     = [];
                    foreach ($photos as $k => $photo) {
                        $ul[] = Html::a(Html::img(Yii::$app->imageresize->getUrl(Yii::getAlias('@webroot' . trim($photo)), 302, 201)), isset($videos[$k]) && trim($videos[$k]) ? trim($videos[$k]) : trim($photo), [ 'class' => isset($videos[$k]) && trim($videos[$k]) ? 'mfp-iframe' : 'mfp-image' ]);
                    }
                    echo Html::ul($ul, [ 'encode' => false, 'class' => 'progress-media-gallery-' . $item->id ]);
                    echo Html::endTag('div');
                }
                echo Html::endTag('div');
                echo Html::endTag('div');
                echo MagnificPopup::widget([
                    'target'  => '.progress-media-gallery-' . $item->id,
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
            echo Html::endTag('div');
        }
    }

}
