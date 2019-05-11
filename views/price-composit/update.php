<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PriceComposit */

$this->title = 'Update Price Composit: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Price Composits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="price-composit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
