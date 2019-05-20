<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcCollect */

$this->title                   = 'Изменить ' . $model->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Готовые наборы', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="calc-collect-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
