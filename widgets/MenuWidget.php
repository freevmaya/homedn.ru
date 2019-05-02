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
use yii\widgets\Menu;
use app\models\MenuContent;

/**
 * Description of MainMenuWidget
 *
 * @author stepanov
 */
class MenuWidget extends Widget
{

    public $linkOptions = [];
    public $menuPosition;
    protected $menuList;

    public function init ()
    {
        $this->menuList = MenuContent::find()
                ->joinWith('menu m', false, 'INNER JOIN')
                ->where([ 'm.position' => $this->menuPosition, 'menu_content_id' => null ])
                ->orderBy([ 'sort' => SORT_ASC ])
                ->all();
    }

    public function run ()
    {
        if ($this->menuList) {
            $ul = [];
            foreach ($this->menuList as $item) {
                $active = $item->url == Yii::$app->request->getUrl() ?: ($item->url == '/' && Yii::$app->request->getUrl() == '' ?: false);
                $items  = [];
                if ($item->menuContents) {
                    foreach ($item->menuContents as $i) {
                        $items[] = [
                            'label'   => $i->name,
                            'url'     => $i->url,
                            'options' => $this->linkOptions,
                        ];
                    }
                }
                $ul[] = [
                    'label'   => $item->name,
                    'url'     => $item->url,
                    'options' => $this->linkOptions,
                    'active'  => $active,
                    'items'   => $items,
                ];
            }
            echo Menu::widget([
                'items' => $ul,
            ]);
        }
    }

}
