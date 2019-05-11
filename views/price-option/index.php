<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $priceCaption app\models\PriceCaption */

$this->title                   = 'Пакеты цен';
$this->params['breadcrumbs'][] = [ 'label' => 'Разделы цен', 'url' => [ '/price-caption/index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Раздел ' . $priceCaption->name, 'url' => [ '/price-caption/update', 'id' => $priceCaption->id ] ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-option-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', [ 'create', 'price_caption_id' => $priceCaption->id ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
//            'id',
            'name',
//            'price_caption_id',
            'min_price',
//            'sort',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
