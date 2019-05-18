<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Элементы калькулятора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calc-component-element-index">

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
//            'desc',
            'sort',
            'default',
            //'group_id',
            //'local_group',
            'price',
            //'icon',
            //'image',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);
    ?>
</div>
