<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\YoutubeVideo;
use yii\helpers\Html;

/**
 * Description of YoutubeVideoWidget
 *
 * @author stepanov
 */
class YoutubeVideoWidget extends Widget
{

    protected $videoList;

    public function init ()
    {
        $this->videoList = YoutubeVideo::find()->orderBy([ 'sort' => SORT_ASC ])->all();
    }

    public function run ()
    {
        if ($this->videoList) {
            $ul = [];
            foreach ($this->videoList as $k => $video) {
                $ul[] = Html::a(Html::img(Yii::$app->imageresize->getUrl('@webroot' . $video->cover, $k == 0 ? 635 : 302, $k == 0 ? 357 : 170)), $video->link, [
                            'class' => 'popup-video' ]);
            }
            echo Html::ul($ul, [ 'encode' => false, 'class' => 'youtube-video-list' ]);
        }
    }

}
