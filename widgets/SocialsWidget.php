<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Social;

/**
 * Description of SocialsWidget
 *
 * @author stepanov
 */
class SocialsWidget extends Widget
{

    public $position;
    protected $socialList;

    public function init ()
    {
        if (!$this->position)
            $this->position   = 'top';
        $this->socialList = Social::find()
                ->where([ 'not', [ 'icon_' . $this->position => null ] ])
                ->andWhere([ 'not', [ 'icon_' . $this->position => '' ] ])
                ->orderBy([ 'sort' => SORT_ASC ])
                ->all();
    }

    public function run ()
    {
        if ($this->socialList) {
            $ul = [];
            foreach ($this->socialList as $item) {
                $ul[] = Html::a(Html::img($item->{'icon_' . $this->position}), $item->url, [ 'target' => '_blank', 'rel' => 'nofollow' ]);
            }
            echo Html::ul($ul, [ 'encode' => false ]);
        }
    }

}
