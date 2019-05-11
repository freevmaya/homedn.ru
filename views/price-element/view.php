<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PriceElement */
/* @var $priceCaption app\models\PriceCaption */

$this->title                   = $model->name;
$this->params['breadcrumbs'][] = [ 'label' => 'Разделы цен', 'url' => [ '/price-caption/index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Раздел ' . $model->priceCaption->name, 'url' => [ '/price-caption/update', 'id' => $model->priceCaption->id ] ];
$this->params['breadcrumbs'][] = [ 'label' => 'Состав пакетов', 'url' => [ 'index', 'price_caption_id' => $model->price_caption_id ] ];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="price-element-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', [ 'update', 'id' => $model->id ], [ 'class' => 'btn btn-primary' ]) ?>
        <?=
        Html::a('Удалить', [ 'delete', 'id' => $model->id ], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Удалить?',
                'method'  => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'name',
            'priceCaption.name:text:Раздел',
            'description:html',
            'sort',
        ],
    ])
    ?>

</div>
