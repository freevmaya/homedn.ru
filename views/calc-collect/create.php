<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcCollect */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Готовые наборы', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-collect-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
