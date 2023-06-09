<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Employee;

/**
 * Description of EmployeeListWidget
 *
 * @author stepanov
 */
class EmployeeListWidget extends Widget
{

    public $designer;
    protected $employeeList;

    public function init ()
    {
        $this->employeeList = Employee::find()
                ->where([ 'not', [ 'photo1' => '' ] ]);
        if ($this->designer) {
            $this->employeeList->andWhere([ 'designer' => 1 ]);
        }
        $this->employeeList = $this->employeeList->orderBy([ 'sort' => SORT_ASC ])
                ->all();
    }

    public function run ()
    {
        if ($this->employeeList) {
            $items = [];
            echo Html::beginTag('div', [ 'class' => 'employee-list' ]);
            foreach ($this->employeeList as $emp) {
                if ($emp->photo1) {
                    $items[] = Html::tag('span', Html::tag('span', '', [ 'class' => 'shadow' ])
                                    . ($emp->video ? Html::tag('span', Html::a(Html::img(\Yii::$app->params['image_dir_url'] . 'video6.png')
                                                    . Html::tag('span', 'Посмотреть видео'), $emp->video, [ 'class' => 'popup-video' ]), [ 'class' => 'video' ]) : ''), [ 'class' => 'image', 'data-back' => $emp->photo1 ])
                            . Html::tag('span', $emp->fio, [ 'class' => 'fio' ])
                            . Html::tag('span', $emp->place, [ 'class' => 'place' ]);
                }
            }
            echo Html::ul($items, [ 'encode' => false ]);
            echo Html::endTag('div');
        }
    }

}
