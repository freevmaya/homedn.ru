<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Style Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="style-project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Style Project', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
            'id',
            'name',
            'phone',
            'style_list.name:text:Стиль',
            [
                'attribute' => 'color',
                'value'     => function($data)
                {
                    return Html::tag('span', '', [ 'style' => 'background: ' . $data->color . '; display: inline-block; vertical-align: middle; width: 16px; height: 16px;' ]);
                },
            ],
            'created_at:datetime',
            //'updated_at',
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]);
    ?>
</div>
