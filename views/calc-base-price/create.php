<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CalcBasePrice */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Базовые параметры', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-base-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model'         => $model,
        'calcInputdata' => $calcInputdata,
    ])
    ?>

</div>
