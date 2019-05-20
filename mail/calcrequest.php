<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use app\helpers\SiteProperty;

/* @var $model app\models\CalcRequestForm */
?>


<p>Имя: <?= $model->name ?></p>

<p>Телефон: <?= $model->phone ?></p>

<p><?= Html::a('Ссылка на калькулятор', [ 'site/frontend', 'id' => SiteProperty::getValue('calcpageid'), 'k' => $model->calckey ]) ?></p>

