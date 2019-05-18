<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcComponentElement */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Элементы калькулятора', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-component-element-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model'               => $model,
        'calcComponentGroups' => $calcComponentGroups,
    ])
    ?>

</div>
