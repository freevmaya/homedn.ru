<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\helpers\SiteProperty;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Calc Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Calc Request', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [ 'class' => 'yii\grid\SerialColumn' ],
//            'id',
            'name',
            'phone',
            'created_at:datetime',
//            'updated_at',
            [
                'label'  => 'Ссылка на расчет',
                'format' => 'raw',
                'value'  => function($data)
                {
                    return Html::a($data->calckey, [ 'site/frontend', 'id' => SiteProperty::getValue('calcpageid'), 'k' => $data->calckey ], [ 'target' => '_blank' ]);
                },
            ],
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]);
    ?>
</div>
