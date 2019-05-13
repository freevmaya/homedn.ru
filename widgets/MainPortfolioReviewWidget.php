<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\PortfolioReview;
use yii\helpers\Html;

/**
 * Description of MainPortfolioReviewWidget
 *
 * @author stepanov
 */
class MainPortfolioReviewWidget extends Widget
{

    public $countCommonReview;
    public $countVisibleReview;
    public $buttonText;
    protected $reviewList;

    public function init ()
    {
        $this->reviewList = PortfolioReview::find()->orderBy([ 'sort' => SORT_ASC ]);
        if ($this->countCommonReview) {
            $this->reviewList->limit($this->countCommonReview);
        }
        $this->reviewList = $this->reviewList->all();
    }

    public function run ()
    {
        if ($this->reviewList) {
            echo Html::beginTag('div', [ 'class' => 'portfolio-review-widget' ]);
            $ul1 = [];
            $ul2 = [];
            foreach ($this->reviewList as $k => $review) {
                $html = Html::tag('span', Html::a(Html::img($review->cover, [ 'class' => 'cover' ]), $review->video, [ 'class' => 'video-impulse popup-video' ]), [
                            'class' => 'video' ])
                        . Html::tag('span', nl2br($review->header), [ 'class' => 'name' ])
                        . Html::tag('span', Html::a('Смотреть объект', [ '/site/frontend', 'id' => $review->page_id ]), [ 'class' => 'link' ]);
                if ($this->countVisibleReview && $k < $this->countVisibleReview) {
                    $ul1[] = $html;
                } else {
                    $ul2[] = $html;
                }
            }
            echo Html::ul($ul1, [ 'encode' => false, 'class' => 'review-list opened' ]);
            if ($ul2) {
                echo Html::tag('div', Html::a($this->buttonText, '#', [ 'class' => 'more-review' ]), [ 'class' => 'more' ]);
                echo Html::ul($ul2, [ 'encode' => false, 'class' => 'review-list closed' ]);
            }
            echo Html::endTag('div');
        }
    }

}
