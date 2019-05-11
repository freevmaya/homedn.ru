<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PriceComposit */

$this->title = 'Create Price Composit';
$this->params['breadcrumbs'][] = ['label' => 'Price Composits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-composit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
