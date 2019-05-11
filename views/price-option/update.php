<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PriceOption */
/* @var $priceCaption app\models\PriceCaption */

$this->title                   = 'Изменить ' . $model->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Разделы цен', 'url' => [ '/price-caption/index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Раздел ' . $model->priceCaption->name, 'url' => [ '/price-caption/update', 'id' => $model->price_caption_id ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Пакеты цен', 'url' => [ 'index', 'price_caption_id' => $model->price_caption_id ] ];
$this->params['breadcrumbs'][] = [ 'label' => $model->name, 'url' => [ 'view', 'id' => $model->id ] ];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="price-option-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
