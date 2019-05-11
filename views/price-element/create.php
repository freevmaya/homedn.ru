<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PriceElement */
/* @var $priceCaption app\models\PriceCaption */

$this->title                   = 'Добавить';
$this->params['breadcrumbs'][] = [ 'label' => 'Разделы цен', 'url' => [ '/price-caption/index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Раздел ' . $priceCaption->name, 'url' => [ '/price-caption/update', 'id' => $priceCaption->id ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Состав пакетов', 'url' => [ 'index', 'price_caption_id' => $model->price_caption_id ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-element-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
