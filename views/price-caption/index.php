<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Разделы цен';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-caption-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
//            'id',
            'name',
//            'description',
            'sort',
            [
                'label'  => '',
                'format' => 'html',
                'value'  => function($data)
                {
                    return Html::a('Пакеты', [ '/price-option/index', 'price_caption_id' => $data->id ]);
                },
            ],
            [
                'label'  => '',
                'format' => 'html',
                'value'  => function($data)
                {
                    return Html::a('Состав', [ '/price-element/index', 'price_caption_id' => $data->id ]);
                },
            ],
            [
                'label'  => '',
                'format' => 'html',
                'value'  => function($data)
                {
                    return Html::a('Структура пакетов', [ '/price-composit/index', 'price_caption_id' => $data->id ]);
                },
            ],
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
